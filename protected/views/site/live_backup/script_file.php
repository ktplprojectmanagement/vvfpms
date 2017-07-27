<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/form-wizard.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/layout5/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-notific8.min.js" type="text/javascript"></script>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
<script>
                    $(function(){
                        $('.mainmenu1').mouseout(function(){
                            var id = $(this).attr('id');
                            var parent_id = $("li.mainmenu1 a").attr('id');
                            $("#"+parent_id).css("color", "white");
                            $("#"+parent_id).css("background-color", "#009dc7");
                        });
                        $('.mainmenu2').mouseout(function(){
                            var id = $(this).attr('id');
                            var parent_id = $("li.mainmenu2 a").attr('id');
                            $("#"+parent_id).css("color", "white");
                            $("#"+parent_id).css("background-color", "#009dc7");
                        });
                        $('.mainmenu3').mouseout(function(){
                            var id = $(this).attr('id');
                            var parent_id = $("li.mainmenu3 a").attr('id');
                            $("#"+parent_id).css("color", "white");
                            $("#"+parent_id).css("background-color", "#009dc7");
                        });
                    });

                    $(document).ready(function(){                       
                        $("#first").mouseover(function(){                            
                            $("#first").css({"background-color": "#009dc7", "color": "white"});
                            $("#second").css({"background-color": "#E4E5E6", "color": "#009dc7"});
                            $("#third").css({"background-color": "#E4E5E6", "color": "#009dc7"});
                          });
                       $("#first").mouseout(function(){
                            $("#first").css("color", "#009dc7");
                             $("#first").css("background-color", "#E4E5E6");
                        });
                    });

                    $(document).ready(function(){
                        $("#second").mouseover(function(){                            
                            $("#second").css({"background-color": "#009dc7", "color": "white"});
                            $("#first").css({"background-color": "#E4E5E6", "color": "#009dc7"});
                            $("#third").css({"background-color": "#E4E5E6", "color": "#009dc7"});
                          });
                       $("#second").mouseout(function(){
                            $("#second").css("color", "009dc7");
                             $("#second").css("background-color","#E4E5E6");
                             // $("#first").css("color", "white");
                             // $("#first").css("background-color", "#009dc7");
                             $("#third").css("color", "009dc7");
                             $("#third").css("background-color", "#E4E5E6");
                        });
                    });

                    $(document).ready(function(){
                        $("#third").mouseover(function(){                              
                            $("#third").css({"background-color": "#009dc7", "color": "white"});
                            $("#first").css({"background-color": "#E4E5E6", "color": "#009dc7"});
                            $("#second").css({"background-color": "#E4E5E6", "color": "#009dc7"});
                          });
                       $("#third").mouseout(function(){
                            // $("#first").css("color", "white");
                            //  $("#first").css("background-color", "#009dc7");
                            $("#third").css("color", "009dc7");
                             $("#third").css("background-color", '#E4E5E6');
                             $("#second").css("color", "009dc7");
                             $("#second").css("background-color", "#E4E5E6");
                        });
                    });
                    </script>
