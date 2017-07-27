<?php

class Create_programController extends Controller
{
	public function actionIndex()
	{
		if(Yii::app()->user->getState("Employee_id")!='')
        {
			$model=new KRAStructureForm;
			$employee = new EmployeeForm;
			$cluster_name = new ClusterForm;
			$normalize_rating =new NormalizeRatingForm;		
	

			$selected_option = 'Create_program';
			$this->render('//site/script_file');
			$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
			$this->render('//site/new_program_view',array('model'=>$model));
			$this->render('//site/admin_footer_view');
        }
        else
        {
            $this->redirect(array('Adminlogin/Index'));
        }		
		
	}

	function actionsave()
	{
		//print_r($_POST['program_name']);die();
		$model=new NewProgramForm();
		if (isset($_FILES['employee_csv']['name'])) {
			$model->document=CUploadedFile::getInstanceByName('employee_csv');
			$filenamekey = md5(uniqid($_FILES['employee_csv']['name'], true)); 
			$Fileext = pathinfo($_FILES['employee_csv']['name'], PATHINFO_EXTENSION);
			$model->document=$filenamekey.'.'.$Fileext;	
			$imagename = $filenamekey.'.'.$Fileext;	
			$image_data = CUploadedFile::getInstanceByName('employee_csv');
    		$image_data->saveAs(Yii::getPathOfAlias('webroot').'/program_data/'.$model->document);
    		$model->document=$filenamekey.'.'.$Fileext;

    		$model->program_name = $_POST['program_name'];
    		$model->save();
		}
	}

	function actionsave_test()
	{
		//print_r($_POST['ans1']);die();
		$model=new TestDataForm();
		$model->question=$_POST['question'];
		$model->ans1=$_POST['ans1'];
		$model->ans2=$_POST['ans2'];
		$model->ans3=$_POST['ans3'];
		$model->ans4=$_POST['ans4'];
		$model->save();
	}

	function actionfeedback_form()
	{
		//print_r($_POST['ans1']);die();
		$model=new KRAStructureForm;
		$employee = new EmployeeForm;
		$cluster_name = new ClusterForm;
		$normalize_rating =new NormalizeRatingForm;		


		$selected_option = 'Create_program';
		$this->render('//site/script_file');
		$this->render('//site/admin_header_view',array('selected_option'=>$selected_option));
		$this->render('//site/new_program_view',array('model'=>$model));
		$this->render('//site/admin_footer_view');
	}

		
}