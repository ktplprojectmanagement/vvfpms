
            <div class="container-fluid">
                <div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">                        
                        <!-- Sidebar Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".page-sidebar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                        </button>
                        <!-- Sidebar Toggle Button -->
                    </div>
                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">                            
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                               <!--  <div class="note note-info">
                                    <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
                                </div> -->
                                <div>
                                         <?php 
                                            $form=$this->beginWidget('CActiveForm', array(
                                           'id'=>'user-form',
                                            'enableClientValidation'=>true,
                                            'clientOptions'=>array('validateOnSubmit'=>true, 'validateOnType'=>true),
                                            //'action' => $this->createUrl('Setgoals/save_kpi'),                                        
                                        ));
                                        ?>
                                         <div class="portlet box " style='border:1px solid #337ab7'>
                                            <div class="portlet-title" style="background-color: rgb(51, 122, 183);">
                                                <div class="caption">
                                                    Basic Bootstrap 3.0 Responsive Table </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                </div>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-responsive">
                                                    <table class="table" style="border:none">
                                                        <thead>
                                                            <tr>
                                                                <th class="col-md-4"> <label >Sort By Cluster</label>
                                                                <select  class="form-control">
                                                                <option value="Sales">Sales</option>
                                                                <option value="Purchase">Purchase</option>
                                                                </select>
                                                                 </th>
                                                            
                                                                <th> <label >Sort By Department</label>
                                                                <select  class="form-control">
                                                                <option value="Sales">Sales</option>
                                                                <option value="Purchase">Purchase</option>
                                                                </select>
                                                                 </th>
                                                               
                                                                <th> <label >KRA Type</label>
                                                                <select  class="form-control">
                                                                <option value="Sales">Sales</option>
                                                                <option value="Purchase">Purchase</option>
                                                                </select>
                                                                 </th>
                                                                
                                                            </tr>
                                                        </table>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Employee Name </th>
                                                                <th>Cluster Name  </th>
                                                                <th>Designation  </th>
                                                                <th>Action </th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td> xyz </td>
                                                                <td> xyz </td>
                                                                <td>Developer</td>
                                                                <td><input value="1" name="test" type="checkbox"></td>
                                                             </tr>
                                                             <tr>
                                                                <td> xyz </td>
                                                                <td> xyz </td>
                                                                <td>Developer</td>
                                                                <td><input value="1" name="test" type="checkbox"></td>
                                                             </tr>
                                                            <tr>
                                                                <td> xyz </td>
                                                                <td> xyz </td>
                                                                <td>Developer</td>
                                                                <td><input value="1" name="test" type="checkbox"></td>
                                                             </tr>
                                                            <tr>
                                                                <td> xyz </td>
                                                                <td> xyz </td>
                                                                <td>Developer</td>
                                                                <td><input value="1" name="test" type="checkbox"></td>
                                                             </tr>
                                                            <tr>
                                                                <td> xyz </td>
                                                                <td> xyz </td>
                                                                <td>Developer</td>
                                                                <td><input value="1" name="test" type="checkbox"></td>
                                                             </tr>
                                                            <tr>
                                                                <td> xyz </td>
                                                                <td> xyz </td>
                                                                <td>Developer</td>
                                                                <td><input value="1" name="test" type="checkbox"></td>
                                                             </tr>
                                                            <tr>
                                                                <td> xyz </td>
                                                                <td> xyz </td>
                                                                <td>Developer</td>
                                                                <td><input value="1" name="test" type="checkbox"></td>
                                                             </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-offset-4 col-md-8">
                                            
                                            <?php echo CHtml::button('Update',array('class'=>'btn  btn-primary ','id'=>'update_yer')); ?>
                        
                                            <?php echo CHtml::button('Submit',array('class'=>'btn btn-primary ','id'=>'posting1')); ?>
                                            <?php echo CHtml::button('Reset',array('class'=>'btn btn-primary ','id'=>'posting1','type'=>'reset','value'=>'Reset')); ?>
                                        </div>



 <?php $this->endWidget(); ?>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>
                </div>