<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/pages/scripts/ui-notific8.min.js" type="text/javascript"></script>
 <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />                                                                              
                                                   
                                    <script type="text/javascript">
                                        $(function(){
                                            var settings = {
                                                theme: 'teal',
                                                horizontalEdge: 'top',
                                                verticalEdge: 'right'
                                            },
                                            $button = $(this);
                                        
                                        if ($.trim($('#notific8_heading').val()) != '') {
                                            settings.heading = $.trim($('#notific8_heading').val());
                                        }
                                        
                                        if (!settings.sticky) {
                                            settings.life = '10000';
                                        }

                                        $.notific8('zindex', 11500);
                                        $.notific8($.trim('Registration Completed Successfully!!!'), settings);
                                        
                                        $button.attr('disabled', 'disabled');
                                        
                                        setTimeout(function() {
                                            $button.removeAttr('disabled');
                                        }, 1000);

                                        });
                                    </script>
                                                    
                                        
        
