<div ng-include="'menu.html'"></div>
<div ui-view="main" class="container"></div>

<script type="text/ng-template" id="menu.html">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <span class="navbar-brand">Our Menu</span>
            </div>
        </div>
    </nav>
    
</script>

<script type="text/ng-template" id="state1.html">
    <div class="container">
        <div class="wizard small row ng-cloak" ng-cloak>
            <a ng-repeat="state in vm.states" ng-click="vm.setCurrent(state)" ng-class="{ 'current': state.isCurrent }" ng-href="{{state.href}}" ng-if="state.isVisible">
                <div class="badge" style="display:none;">
                    @*<div class="border"></div>
                        <div class="number">{{$index + 1}}</div>*@
                </div>
                {{ state.name }}
            </a>
        </div>

        <div class="wizard row ng-cloak" ng-cloak>
            <a ng-repeat="state in vm.states" ng-click="vm.setCurrent(state)" ng-class="{ 'current': state.isCurrent }" ng-href="{{state.href}}" ng-if="state.isVisible">
                <div class="badge">
                    <div class="border"></div>
                    <div class="number">{{$index + 1}}</div>
                </div>
                {{ state.name }}
            </a>
        </div>

        <div class="wizard left-arrow row ng-cloak" ng-cloak>
            <a ng-repeat="state in vm.states" ng-click="vm.setCurrent(state)" ng-class="{ 'current': state.isCurrent }" ng-href="{{state.href}}" ng-if="state.isVisible">
                <div class="badge" style="display:none;">
                    @*<div class="border"></div>
                <div class="number">{{$index + 1}}</div>*@
                </div>
                {{ state.name }}
            </a>
        </div>

        <div class="wizard small left-arrow row ng-cloak" ng-cloak>
            <a ng-repeat="state in vm.states" ng-click="vm.setCurrent(state)" ng-class="{ 'current': state.isCurrent }" ng-href="{{state.href}}" ng-if="state.isVisible">
                <div class="badge">
                    <div class="border"></div>
                    <div class="number">{{$index + 1}}</div>
                </div>
                {{ state.name }}
            </a>
        </div>
    </div>

    <div class="form-group form-inline" role="form">
        <div class="form-group">
            <label>Enter number of states</label>
            <input name="stateCount" type="number" class="form-control" ng-model="vm.stateCount" ng-change="vm.stateCountChange()" placeholder="Enter a number" />
        </div>
    </div>
    (function () {
    angular.module('myApp.services', ['ngResource', 'ngAnimate']);
    angular.module('myApp.controllers', []);
    angular.module('myApp.directives', []);

    var myApp = angular.module('myApp', [
        'myApp.services',
        'myApp.controllers',
        'myApp.directives',
        'ngSanitize',
        'ui.bootstrap',
        'ui.router',
        'ui']);

    var state1Ctrl = function ($filter) {
        var
            vm = this,
            init = function () {
                vm.states.length = 0;
                for (var i = 0; i < vm.stateCount; i++) {
                    vm.states.push({ name: 'Step ' + (i + 1).toString(), heading: 'Step ' + (i + 1).toString(), isVisible: true });
                }
            };
        vm.stateCountChange = function () {
            vm.stateCount = isNaN(vm.stateCount) ? 2 : vm.stateCount;
            init();
        };
        
        vm.setCurrent = function(state) {
            for (var i=0; i < vm.states.length; i++)
            {
                vm.states[i].isCurrent = false;
            }
            state.isCurrent = true;
        };

        vm.states = [];
        vm.stateCount = 2;
        init();
    };

    state1Ctrl.$inject = ['$filter'];
    angular.module('myApp.controllers')
        .controller('state1Ctrl', state1Ctrl);

    myApp.config(['$locationProvider', '$stateProvider', '$urlRouterProvider',

    function ($locationProvider, $stateProvider, $urlRouterProvider) {

        $locationProvider.html5Mode(false);

        $urlRouterProvider.when('/', '/state1')
            .otherwise("/state1");

        $stateProvider.state('app', {
            abstract: true,
            url: '/',
            views: {
                'main': {
                    template: '<div ui-view>/div>'
                }
            }
        })
        .state('app.state1', {
            url: 'state1',
            templateUrl: 'state1.html',
            controller: 'state1Ctrl',
            controllerAs: 'vm',
            reloadOnSearch: false
        })
    }]);

    myApp.run(['$log', function ($log) {
        $log.log("Start.");
    }]);
})()


</script>
