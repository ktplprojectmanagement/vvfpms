<!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <div class="note note-info" style="margin-top: 30px;">
                        <p> <?php if(isset($window_msg)) { echo $window_msg; } ?> </p>
                    </div>
                </div>
                <!-- END SIDEBAR -->
            </div>            
        </div>
         <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
         <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <!-- END CONTAINER -->