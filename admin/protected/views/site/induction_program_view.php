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
                            <h1>Induction Program </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                </div>
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->
                <script type="text/javascript">
                    $(function(){
                        $('.collapse').on('shown.bs.collapse', function(){
                        $(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
                        }).on('hidden.bs.collapse', function(){
                        $(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
                        });
                    });
                </script>
                <div class="page-content">
                    <div class="container">
                        <div class="container">
<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color: rgba(21, 69, 147, 0.59);">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <span class="glyphicon glyphicon-minus"></span>
          Intoduction
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
      <embed src="http://pro.ispringcloud.com/acc/0VIQYEk3NTMw/view/7530-JH6A5-tErfV-CAT16/embedded?from=embed&amp;fit=1">
        <!-- <iframe style="border: medium none; background-color: transparent; width: 50%; height: 50%;" allowfullscreen="1" allowtransparency="true" scrolling="auto" border="0" src="http://pro.ispringcloud.com/acc/0VIQYEk3NTMw/view/7530-JH6A5-tErfV-CAT16/embedded?from=embed&amp;fit=1" frameborder="0"></iframe> -->
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color: rgba(21, 69, 147, 0.59);">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          <span class="glyphicon glyphicon-plus"></span>
          Test
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <?php 
            $test_data = new TestDataForm();   
            $records = $test_data->getdata();                                        
            //echo CHtml::activeRadioButton($test_data,'ans1',array('value'=>'Indian','class'=>'nationality','uncheckValue'=>null)).'Indian';
         ?>
         <label id="total_questions"><?php echo count($records); ?></label>
         <table class="table table-bordered">
             <thead>
                <th>Sr.No</th>
                <th>Questions</th>
                <th>Answer</th>
             </thead>
             <tbody>
                 <?php
                 //print_r($records);die();
                 $cnt = 1;
                 for ($i=0; $i < count($records); $i++) { 
                ?>
                <tr>
                    <td><?php echo $cnt; ?></td>
                    <td id="question-<?php echo $i; ?>"><?php echo $records[$i]['question']; ?></td>
                    <td>
                    <table class='table'>
                        <tr>
                            <td>
                               <?php
                                     echo CHtml::activeRadioButton($test_data,'ans'.$cnt,array('value'=>$records[$i]['ans1'],'class'=>'ans-'.$i,'uncheckValue'=>null)).$records[$i]['ans1'];
                               ?> 
                            </td>
                             <td>
                               <?php
                                    echo CHtml::activeRadioButton($test_data,'ans'.$cnt,array('value'=>$records[$i]['ans2'],'class'=>'ans-'.$i,'uncheckValue'=>null)).$records[$i]['ans2'];
                               ?> 
                            </td>
                             <td>
                               <?php
                                    echo CHtml::activeRadioButton($test_data,'ans'.$cnt,array('value'=>$records[$i]['ans3'],'class'=>'ans-'.$i,'uncheckValue'=>null)).$records[$i]['ans3'];
                               ?> 
                            </td>
                             <td>
                               <?php
                                     echo CHtml::activeRadioButton($test_data,'ans'.$cnt,array('value'=>$records[$i]['ans4'],'class'=>'ans-'.$i,'uncheckValue'=>null)).$records[$i]['ans4'];
                               ?> 
                            </td>
                        </tr>
                    </table>
                    </td>
                </tr>
                <?php     # code...
                 $cnt++;
                 }
                 ?>
                 <tr>
                     <td colspan="3">
                        <?php
                            echo CHtml::button('save',array('class'=>'btn green submit_test','style'=>'float:right;background-color: rgb(51, 122, 183);float:right','id'=>'submit_test'));
                        ?> 
                     </td>
                 </tr>
             </tbody>
         </table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading"  style="background-color: rgba(21, 69, 147, 0.59);">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          <span class="glyphicon glyphicon-plus"></span>
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
</div>
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->

        </div>
        <!-- END CONTAINER -->
                 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script type="text/javascript">
             $(function(){                
                     $("body").on('click','.submit_test',function(){
                        var test_data = '';
                        for (var i = 0; i < $("#total_questions").text(); i++) {
                            if (test_data == '') 
                            {
                                test_data = $("#question-"+i).text()+'test_que'+$(".ans-"+i+":checked").attr('value');
                            }
                            else
                            {
                                test_data = test_data+'test_que1'+$("#question-"+i).text()+'test_que'+$(".ans-"+i+":checked").attr('value');
                            }
                        }
                        var data = {
                            'Employee_id' : '111',
                            'test_data' : test_data,
                            'test_result' : '100',
                        };
                        var base_url = window.location.origin;
                        $.ajax({
                        'type' : 'post',
                        'datatype' : 'html',
                        'data' : data,
                        'url' : base_url+'/pmsuser/index.php?r=Induction/save',
                        success : function(data)
                        {
                            alert(data);                        
                        }
                     });
                 });
             });
         </script>
              