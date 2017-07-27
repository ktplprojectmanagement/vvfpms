       <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <div class="page-head">
                    <div class="container">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Year End Review(A)</h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <div class="page-content">
                    <div class="container">
                       
            <div class="container-fluid">
                <div class="page-content">                    
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->                           
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->                                
                                <div>                                               
                                   <!-- </div>
                                </div> -->
                                <?php
                                    if (isset($kpi_data) && count($kpi_data)>0) {
                                ?>
                                <div class="portlet box bg-blue-soft border-blue-soft">
                                    <div class="portlet-title">
                                        <div class="caption">
                                           Review</div>
                                        <div class="tools">
                                            <a href="javascript:;" class="collapse"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body tabs-below">
                                        <div class="tab-content">
                                <?php    
                                for ($k=0; $k < count($kpi_data); $k++) { 
                                ?>
                                    <label id="kra_count" style="display: none"><?php echo count($kpi_data); ?></label>
                                    <table class="table table-bordered" cellspacing="0" border="0">
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Description</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_description'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>KRA Category</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdval="0" sdnum="16393;"><?php echo $kpi_data[$k]['KRA_category'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="59" align="left" valign=middle><b><font face="Calibri" size=3>Weightage</font></b></td>
                                                <td colspan=7 align="center" valign=middle sdnum="16393;0;0"><?php echo $kpi_data[$k]['target'];?></td>
                                                </tr>
                                            <tr>
                                                <td height="134" align="left" valign=middle><b><font face="Calibri" size=3>Key Performance Indicators (KPI) Description</font></b></td>
                                                <td align="left" valign=middle >Unit</td>
                                                <td align="left" valign=middle >Value</td>
                                                <td align="left" valign=middle><b><font face="Calibri" size=3>Actual achievement of year end</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraisee comment on actual achievement</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraiser Comment on actual achievement</font></b></td>
                                                <td align="left" valign=middle ><b><font face="Calibri" size=3>Appraiser Rating</font></b></td>
                                               <!--  <td align="left" valign=middle ><b><font face="Calibri" size=3>Average rating for KRA</font></b></td> -->
                                            </tr>
                                            <?php 
                                                $form=$this->beginWidget('CActiveForm', array(
                                               'id'=>'user-form',
                                                'enableClientValidation'=>true,
                                                'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                                //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
                                            ));
                                            ?>
                                                <?php
                                                        $kpi_list = explode(';',$kpi_data[$k]['kpi_list']);
                                                        $kpi_unit = explode(';',$kpi_data[$k]['target_unit']);
                                                        $kpi_value = explode(';',$kpi_data[$k]['target_value1']);
                                                        if ($kpi_data[$k]['year_end_achieve'] != '') {
                                                           $year_end_achieve = explode(';',$kpi_data[$k]['year_end_achieve']);
                                                        }
                                                        else
                                                        {
                                                            $year_end_achieve = '';
                                                        }
                                                        if ($kpi_data[$k]['year_end_reviewa'] != '') {
                                                           $year_end_reviewa = explode(';',$kpi_data[$k]['year_end_reviewa']);
                                                        }
                                                        else
                                                        {
                                                            $year_end_reviewa = '';
                                                        }
                                                        if ($kpi_data[$k]['appraiser_end_review'] != '') {
                                                           $apr_comment_values = explode(';',$kpi_data[$k]['appraiser_end_review']);
                                                        }
                                                        else
                                                        {
                                                            $apr_comment_values = '';
                                                        }
                                                        if ($kpi_data[$k]['appraiser_end_rating'] != '') {
                                                           $appraiser_end_rating = explode(';',$kpi_data[$k]['appraiser_end_rating']);
                                                        }
                                                        else
                                                        {
                                                            $appraiser_end_rating = '';
                                                        }
                                                        //print_r($year_end_achieve['0']);die();
                                                        
                                                ?>
                                                 <label id='kpi_count_list-<?php echo $kpi_data['0']['KPI_id']; ?>' style="display: none"><?php echo count($kpi_list); ?></label>
                                                <?php
                                                   for ($i=0; $i < count($kpi_list); $i++) {
                                                    if ($kpi_unit[$i] != 'Select') {
                                                ?>
                                                <tr>

                                                    <td><?php echo $kpi_list[$i]; ?></td>
                                                    <?php
                                                        $emp_id = Yii::app()->user->getState("role_id");          
                                                    ?>
                                                     <td><?php echo $kpi_unit[$i]; ?></td>
                                                      <td><?php echo $kpi_value[$i]; ?></td>
                                                            <td>
                                                            <?php 
                                                            if ($year_end_achieve != '' && count($year_end_achieve)>0) {
                                                               echo CHtml::textArea('emp_actual_achieve',$year_end_achieve[$i],array('class'=>'form-control','id'=>'emp_actual_achieve-'.$i.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textArea('appraiser_comment','',array('class'=>'form-control','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            ?></td>
                                                            <td>
                                                            <?php 
                                                            if ($year_end_reviewa != '' && count($year_end_reviewa)>0) {
                                                               echo CHtml::textArea('appraisee_comment',$year_end_reviewa[$i],array('class'=>'form-control','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            else
                                                            {
                                                                echo CHtml::textArea('appraisee_comment','',array('class'=>'form-control','id'=>'appraisee_comment'.$i.$kpi_data[$k]['KPI_id']));
                                                            }
                                                            ?>
                                                            <?php  ?></td>
                                                            <td><?php 
                                                            if ($apr_comment_values != '' && count($apr_comment_values)>0) {
                                                                echo CHtml::textArea('appraiser_comment',$apr_comment_values[$i],array('class'=>'form-control','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textArea('appraiser_comment','',array('class'=>'form-control','id'=>'appraiser_comment-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            ?></td> 
                                                            <td><?php 
                                                            if ($appraiser_end_rating !='' && count($appraiser_end_rating)>0) {
                                                                 echo CHtml::textField('appraiser_raiting',$appraiser_end_rating[$i],array('class'=>'form-control','id'=>'appraiser_raiting-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            else
                                                            {
                                                                 echo CHtml::textField('appraiser_raiting','',array('class'=>'form-control','id'=>'appraiser_raiting-'.$i.$kpi_data[$k]['KPI_id'],'disabled'=> "true"));
                                                            }
                                                            ?></td>  
                                                            <td></td>
                                                    <?php 
                                                            
                                                        } ?>   
                                                        </div>
                                                    <?php    }
                                                    ?>
                                                </tr>
                                                <tr>
                                                <td colspan=8><b><font face="Calibri" size=3>
                                                <div class='col-md-4'>Average rating for KRA : <?php 
                                                if ($kpi_data[$k]['appraiser_avrage_end']) {
                                                    $avg_rating = $kpi_data[$k]['appraiser_avrage_end'];
                                                }
                                                else
                                                {
                                                    $avg_rating = '';
                                                }
                                                echo CHtml::textField('average_rating',$avg_rating,array('class'=>'form-control','id'=>'average_rating-'.$kpi_data[$k]['KPI_id'],'disabled'=> "true")); 
                                                ?></div>
                                                <?php 
                                                    echo CHtml::button('Submit',array('id'=>$kpi_data[$k]['KPI_id'],'class'=>'btn border-blue-soft year_end_rew','style'=>'float: right;'));
                                                ?></td>
                                                </tr>
                                            <?php $this->endWidget(); ?>   
                                    </table>                                   
                                    <?php
                                        } ?>
                                         </div>
                                         </div> 
                                     <?php   }
                                        else
                                        { ?>
                                            <div class="note note-info">
                                                <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
                                            </div>
                                    <?php    }
                                    ?>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        var j = jQuery.noConflict();
                        function get_notify(e)
                        {                    
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

                            j.notific8('zindex', 11500);
                            j.notific8($.trim(e), settings);
                            
                            $button.attr('disabled', 'disabled');
                            
                            setTimeout(function() {
                                $button.removeAttr('disabled');
                            }, 1000);
                        }        
                    </script>
                    <script type="text/javascript">
                        $(function(){
                            $(".year_end_rew").click(function(){
                                var id = $(this).attr('id');alert(id);
                                var kpi_total = $("#kpi_count_list-"+id).text();
                                var emp_actual_achieve = '';var year_end_achieve = '';
                                for (var i = 0; i < kpi_total; i++) {
                                    if (emp_actual_achieve == '') 
                                    {
                                        emp_actual_achieve = $('#emp_actual_achieve-'+i+id).val();
                                    }
                                    else
                                    {
                                        emp_actual_achieve = emp_actual_achieve+';'+$('#emp_actual_achieve-'+i+id).val();
                                    }
                                    
                                }
                                for (var i = 0; i < kpi_total; i++) {
                                    if (year_end_achieve == '') 
                                    {
                                        year_end_achieve = $('#appraisee_comment'+i+id).val();
                                    }
                                    else
                                    {
                                        year_end_achieve = year_end_achieve+';'+$('#appraisee_comment'+i+id).val();
                                    }
                                    
                                }
                                var data = {
                                    'KPI_id' : $(this).attr('id'),
                                    'year_end_reviewa' : year_end_achieve,
                                    'year_end_achieve' : emp_actual_achieve,
                                };
                                console.log(data);
                                var base_url = window.location.origin;
                                $.ajax({
                                    type : 'post',
                                        datatype : 'html',
                                        data : data,
                                        url : base_url+'/index.php?r=Year_endreview/updatereview',
                                        success : function(data)
                                        {
                                            get_notify('Year end review updated succesfully');                                   
                                        }
                                });
                            });                        
                        });
                    </script>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <a href="javascript:;" class="page-quick-sidebar-toggler">
                <i class="icon-login"></i>
            </a>
            <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                <span class="badge badge-danger">2</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                <span class="badge badge-success">7</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-bell"></i> Alerts </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-info"></i> Notifications </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-speech"></i> Activities </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                        <i class="icon-settings"></i> Settings </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                            <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                <h3 class="list-heading">Staff</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">8</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Bob Nilson</h4>
                                            <div class="media-heading-sub"> Project Manager </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Nick Larson</h4>
                                            <div class="media-heading-sub"> Art Director </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">3</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Hubert</h4>
                                            <div class="media-heading-sub"> CTO </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ella Wong</h4>
                                            <div class="media-heading-sub"> CEO </div>
                                        </div>
                                    </li>
                                </ul>
                                <h3 class="list-heading">Customers</h3>
                                <ul class="media-list list-items">
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-warning">2</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lara Kunis</h4>
                                            <div class="media-heading-sub"> CEO, Loop Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="label label-sm label-success">new</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Ernie Kyllonen</h4>
                                            <div class="media-heading-sub"> Project Manager,
                                                <br> SmartBizz PTL </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lisa Stone</h4>
                                            <div class="media-heading-sub"> CTO, Keort Inc </div>
                                            <div class="media-heading-small"> Last seen 13:10 PM </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-success">7</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Deon Portalatin</h4>
                                            <div class="media-heading-sub"> CFO, H&D LTD </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Irina Savikova</h4>
                                            <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <div class="media-status">
                                            <span class="badge badge-danger">4</span>
                                        </div>
                                        <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                                        <div class="media-body">
                                            <h4 class="media-heading">Maria Gomez</h4>
                                            <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                            <div class="media-heading-small"> Last seen 03:10 AM </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="page-quick-sidebar-item">
                                <div class="page-quick-sidebar-chat-user">
                                    <div class="page-quick-sidebar-nav">
                                        <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                            <i class="icon-arrow-left"></i>Back</a>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-messages">
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> When could you send me the report ? </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Its almost done. I will be sending it shortly </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:15</span>
                                                <span class="body"> Alright. Thanks! :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:16</span>
                                                <span class="body"> You are most welcome. Sorry for the delay. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> No probs. Just take your time :) </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Alright. I just emailed it to you. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Great! Thanks. Will check it right away. </span>
                                            </div>
                                        </div>
                                        <div class="post in">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Ella Wong</a>
                                                <span class="datetime">20:40</span>
                                                <span class="body"> Please let me know if you have any comment. </span>
                                            </div>
                                        </div>
                                        <div class="post out">
                                            <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                            <div class="message">
                                                <span class="arrow"></span>
                                                <a href="javascript:;" class="name">Bob Nilson</a>
                                                <span class="datetime">20:17</span>
                                                <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="page-quick-sidebar-chat-user-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Type a message here...">
                                            <div class="input-group-btn">
                                                <button type="button" class="btn green">
                                                    <i class="icon-paper-clip"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                            <div class="page-quick-sidebar-alerts-list">
                                <h3 class="list-heading">General</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-success">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-danger">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-warning"> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-default">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <h3 class="list-heading">System</h3>
                                <ul class="feeds list-items">
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 4 pending tasks.
                                                        <span class="label label-sm label-warning "> Take action
                                                            <i class="fa fa-share"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> Just now </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-danger">
                                                            <i class="fa fa-bar-chart-o"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-default">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-info">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> New order received with
                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 30 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-success">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 24 mins </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="col1">
                                            <div class="cont">
                                                <div class="cont-col1">
                                                    <div class="label label-sm label-warning">
                                                        <i class="fa fa-bell-o"></i>
                                                    </div>
                                                </div>
                                                <div class="cont-col2">
                                                    <div class="desc"> Web server hardware needs to be upgraded.
                                                        <span class="label label-sm label-default "> Overdue </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col2">
                                            <div class="date"> 2 hours </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <div class="col1">
                                                <div class="cont">
                                                    <div class="cont-col1">
                                                        <div class="label label-sm label-info">
                                                            <i class="fa fa-briefcase"></i>
                                                        </div>
                                                    </div>
                                                    <div class="cont-col2">
                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col2">
                                                <div class="date"> 20 mins </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                            <div class="page-quick-sidebar-settings-list">
                                <h3 class="list-heading">General Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Enable Notifications
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Allow Tracking
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Log Errors
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Auto Sumbit Issues
                                        <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Enable SMS Alerts
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <h3 class="list-heading">System Settings</h3>
                                <ul class="list-items borderless">
                                    <li> Security Level
                                        <select class="form-control input-inline input-sm input-small">
                                            <option value="1">Normal</option>
                                            <option value="2" selected>Medium</option>
                                            <option value="e">High</option>
                                        </select>
                                    </li>
                                    <li> Failed Email Attempts
                                        <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                                    <li> Secondary SMTP Port
                                        <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                                    <li> Notify On System Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                    <li> Notify On SMTP Error
                                        <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                                </ul>
                                <div class="inner-content">
                                    <button class="btn btn-success">
                                        <i class="icon-settings"></i> Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
              