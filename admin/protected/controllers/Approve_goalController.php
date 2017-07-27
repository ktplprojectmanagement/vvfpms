<?php

class Approve_goalController extends Controller
{
	public function actionIndex()
	{		
		$model=new KPIStructureForm;
        $where = 'where appraisal_id1 = :appraisal_id1 and KRA_status = :KRA_status';
        $list = array('appraisal_id1','KRA_status');
        //$data = array(Yii::app()->user->getState('appriaser_1'));
        $data = array('priyankamahadik1994@gmail.com','pending');
        $all_kpi_pending = $model->get_kpi_list($where,$data,$list);
        foreach ($all_kpi_pending as $row) {
            $where1 = 'where Employee_id = :Employee_id';
            $list1 = array('Employee_id');
            $data1 = array($row['Employee_id']);
            $all_kpi_pending = $model->get_kpi_list($where,$data,$list);
        }
        
		//print_r($all_kpi_pending);die();
		$this->render('//site/script_file');
        $this->render('//site/header_view');
		$this->render('//site/goal_list',array('model'=>$model,'all_kpi_pending'=>$all_kpi_pending));
		$this->render('//site/footer');
	}

	// public function actionMyAction()
 //    {       
 //            $model=new EmployeeForm;    
 //            //print_r("dsfds");die();         
 //            //$this->performAjaxValidation($model);  
            
 //            if(isset($_POST['EmployeeForm']))
 //            {
 //                    $model->attributes=$_POST['EmployeeForm'];
 //                    $valid=$model->validate();            
 //                    if($valid){
                                      
 //                       //do anything here
 //                    	//$model->Employee_id = uniqid();
 //                    	if($model->save())
 //                    	{
 //                    		echo CJSON::encode(array(
 //                              'status'=>'success'
	//                          ));
	//                         // Yii::app()->end();
 //                    	}
                         
 //                        }
 //                        else{
 //                            $error = CActiveForm::validate($model);
 //                            if($error!='[]')
 //                                echo $error;
 //                            Yii::app()->end();
 //                        }
 //           }
 
 //    }

    
}