
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.jOrgChart.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/custom.css"/>
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/prettify.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/prettify.js"></script>
    
    <!-- jQuery includes -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jOrgChart.js"></script>

    <script>
    jQuery(document).ready(function() {
        $("#org").jOrgChart();
    });
    </script>

  </head>

  <body onload="prettyPrint();">
  <style type="text/css">
  div.node
  {
    width: 145px;
    padding-top: 7px;
    padding-bottom: 24px;
    height: 115px;

  }
  </style>
    <div class="topbar">
    <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=Organization_flow"><?php echo CHtml::button('Back',array('class'=>'btn border-blue-soft','style'=>'float: right;margin-top: 13px;margin-right: 13px;color: black;')); ?></a><br><br>
    <ul id="org" style="display:none"> 
      <li>VVF
      <ul>
       <?php
          if (isset($diff_cluster)) {
            for ($i=0; $i < count($diff_cluster); $i++) { 
              $cluster_array = '';
                if (isset($diff_cluster[$i]['cluster_name'])) {
                  ?>
                  <li><?php echo $diff_cluster[$i]['cluster_name']; ?>
                  <ul>
                  <li><?php if(isset($department_head_data[$i]['0']['Emp_fname'])) { echo $department_head_data[$i]['0']['Emp_fname']." ".$department_head_data[$i]['0']['Emp_lname']; } ?>
                  <ul>
                   <?php
                        for ($j=0; $j < count($dep_head_data[$i]); $j++) { 
                          $cluster_array = '';
                            if (isset($dep_head_data[$i][$j]['department'])) {
                              ?>
                              <li><?php echo $dep_head_data[$i][$j]['department']; ?>
                              <ul id="close_now">
                               <?php
				$img_name = '';
                                    for ($e=0; $e < count($dep_emp_data[$i][$j]); $e++) {
                                        if (isset($dep_emp_data[$i][$j][$e]['Emp_fname'])) {
					if ($dep_emp_data[$i][$j][$e]['Image'] == '') {
                                            $img_name = 'user_profile.png';
                                          }
                                          else
                                          {
                                            $img_name = $dep_emp_data[$i][$j][$e]['Image'];
                                          }
                                          ?>
                                          <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/<?php echo $img_name; ?>" alt="Raspberry" style="width: 36px;height: 36px"/><?php echo "<br>"; echo $dep_emp_data[$i][$j][$e]['Emp_fname']." ".$dep_emp_data[$i][$j][$e]['Emp_lname'];echo "<br>";echo $dep_emp_data[$i][$j][$e]['Designation']; ?>
                                          </li>                 
                                         <?php }
                                      }
                                 ?>
                              </ul>
                              </li>                 
                             <?php }
                          }
                     ?>
                  </ul>
                  </li> 
                  </ul>
                  </li>                
                 <?php }
              }
          }
         ?>
      </ul>
      </li>
   </ul>            
    
    <div id="chart" class="orgChart"></div>
    
    <script>
        jQuery(document).ready(function() {
            $('div.node').css('width','145px');
            /* Custom jQuery for the example */
            $("#show-list").click(function(e){
                e.preventDefault();
                
                $('#list-html').toggle('fast', function(){
                    if($(this).is(':visible')){
                        $('#show-list').text('Hide underlying list.');
                        $(".topbar").fadeTo('fast',0.9);
                    }else{
                        $('#show-list').text('Show underlying list.');
                        $(".topbar").fadeTo('fast',1);                  
                    }
                });
            });
            
            $('#list-html').text($('#org').html());
            
            $("#org").bind("DOMSubtreeModified", function() {
                $('#list-html').text('');
                
                $('#list-html').text($('#org').html());
                
                prettyPrint();                
            });
        });
    </script>
<script type="text/javascript">
      $(function(){
        $(".node-cells").nextAll("tr").hide();
        $(".node-cells").click(function(){
        var id = $(this).nextAll("tr");   
        //alert(id);       
         id.fadeToggle('slow');
        });
      });
    </script>
