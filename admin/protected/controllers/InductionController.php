<?php

class InductionController extends Controller
{
	public function actionIndex()
	{
		// if(Yii::app()->user->getState("Employee_id")!='')
  //       {
			$model=new KRAStructureForm;
			$employee = new EmployeeForm;
			$cluster_name = new ClusterForm;
			$normalize_rating =new NormalizeRatingForm;		
	

			$selected_option = 'Create_program';
			$this->render('//site/script_file');
			$this->render('//site/header_view_layout',array('selected_option'=>$selected_option));
			$this->render('//site/induction_program_view',array('model'=>$model));
			$this->render('//site/footer_view_layout');
        // }
        // else
        // {
        //     $this->redirect(array('Adminlogin/Index'));
        // }		
		
	}

	function actionsave()
	{
		//print_r($_POST['program_name']);die();
		$model=new InductionResultForm();
		$model->Employee_id	 = $_POST['Employee_id'];
		$model->test_data	 = $_POST['test_data'];
		$model->test_result	 = $_POST['test_result'];
    	$model->save();
	}

		
}