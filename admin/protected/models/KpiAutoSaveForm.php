<?php

/**
 * This is the model class for table "kpi_auto_save".
 *
 * The followings are the available columns in table 'kpi_auto_save':
 * @property string $KPI_id
 * @property string $KRA_description
 * @property string $kpi_list
 * @property string $target
 * @property string $target_unit
 * @property string $target_value1
 * @property string $target_value2
 * @property string $target_value3
 * @property string $target_value4
 * @property string $target_value5
 * @property string $KRA_category
 * @property string $appraisal_id1
 * @property string $Employee_id
 * @property integer $kra_complete_flag
 * @property integer $id
 */
class KpiAutoSaveForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kpi_auto_save';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KPI_id', 'required'),
			array('kra_complete_flag', 'numerical', 'integerOnly'=>true),
			array('KPI_id', 'length', 'max'=>11),
			array('KRA_description, kpi_list', 'length', 'max'=>200),
			array('target, target_unit, target_value1, target_value2, target_value3, target_value4, target_value5, KRA_category, appraisal_id1, Employee_id', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KPI_id, KRA_description, kpi_list, target, target_unit, target_value1, target_value2, target_value3, target_value4, target_value5, KRA_category, appraisal_id1, Employee_id, kra_complete_flag, id', 'safe', 'on'=>'search'),
		);
	}

	function getdata()
	{
		$connection=Yii::app()->db;
		$sql = "select * from kpi_auto_save";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	function get_emp_list()
	{
		$email = 'monica.sadafule@kritva.com';
		$connection=Yii::app()->db;
		$sql = "select distinct `Employee_id` from `kpi_auto_save` where appraisal_id1 = '".$email."' and KRA_status_flag ='2' or KRA_status_flag ='3'";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_kpi_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `kpi_auto_save`".' '.$where;
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_kpi_list($where,$data,$list)
	{
		$connection=Yii::app()->db;
		$sql = "select * from kpi_auto_save".' '.$where;
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();
		//print_r($rows);die();
		return $rows;
	}

	function get_emp_id_list($where,$data,$list)
	{
		$connection=Yii::app()->db;
		$sql = "select distinct `Employee_id` from kpi_auto_save".' '.$where;
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();
		//print_r($rows);die();
		return $rows;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
	function get_yearA_data()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`kra_complete_flag` FROM `kpi_auto_save` WHERE `kra_complete_flag`>= '2' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	function get_yearA_data_appr()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`kra_complete_flag` FROM `kpi_auto_save` WHERE `kra_complete_flag` = '2' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_set_kpi1()
	{
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id`,`KRA_status` FROM `kpi_auto_save` ";

		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_apr_goal()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id` from `kpi_auto_save` WHERE `KRA_status`='Approved' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_pending_goal($year1)
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id` from `kpi_auto_save` WHERE (`KRA_status`='Pending' OR  `KRA_status`='') AND (`goal_set_year`='$year1')";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_midrev_data()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id` FROM `kpi_auto_save` WHERE `mid_KRA_status`!= '' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_midrev_data_pend()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`mid_KRA_status` from `kpi_auto_save` WHERE `mid_KRA_status`='Pending' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_final_data_pend()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`mid_KRA_status` from `kpi_auto_save` WHERE `final_kra_status`='Pending' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	
	function get_final_data_apr()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`final_kra_status` from `kpi_auto_save` WHERE `final_kra_status`='Approved' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_distinct_list($list,$where)
	{
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `".$list."` FROM `kpi_auto_save`".$where."";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_disinct_kra_appr($year1)
	{
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id` FROM kpi_auto_save WHERE (`Employee_id` NOT IN (SELECT s.`Employee_id` FROM kpi_auto_save as s WHERE KRA_status = 'Pending' OR KRA_status = '')) AND (`goal_set_year`='$year1') ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_mid_review_submitted(){
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id` FROM kpi_auto_save WHERE `Employee_id` NOT IN (SELECT s.`Employee_id` FROM kpi_auto_save as s WHERE `mid_KRA_status` = '')";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_team_members_kra_sub($array,$year1){
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id` FROM `kpi_auto_save` WHERE (`Employee_id` IN (".$array.")) AND (`goal_set_year`='$year1')";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_pending_goal_team($array,$year1)
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id` from `kpi_auto_save` WHERE ((`KRA_status`='Pending' OR  `KRA_status`='') AND (`Employee_id` IN (".$array.")) AND (`goal_set_year`='$year1'))";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_disinct_kra_appr_team($array,$year1)
	{
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id` FROM kpi_auto_save WHERE( `Employee_id` NOT IN (SELECT s.`Employee_id` FROM kpi_auto_save as s WHERE KRA_status = 'Pending' OR KRA_status = '')) AND (`Employee_id` IN (".$array.") AND (`goal_set_year`='$year1'))";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_mid_review_submitted_team($array,$year1){
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id` FROM kpi_auto_save WHERE (`Employee_id` NOT IN (SELECT s.`Employee_id` FROM kpi_auto_save as s WHERE `appraiser_comment` = '')) AND (`Employee_id` IN (".$array.") AND (`goal_set_year`='$year1'))";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KPI_id' => 'Kpi',
			'KRA_description' => 'Kra Description',
			'kpi_list' => 'Kpi List',
			'target' => 'Target',
			'target_unit' => 'Target Unit',
			'target_value1' => 'Target Value1',
			'target_value2' => 'Target Value2',
			'target_value3' => 'Target Value3',
			'target_value4' => 'Target Value4',
			'target_value5' => 'Target Value5',
			'KRA_category' => 'Kra Category',
			'appraisal_id1' => 'Appraisal Id1',
			'Employee_id' => 'Employee',
			'kra_complete_flag' => 'Kra Complete Flag',
			'id' => 'ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('KPI_id',$this->KPI_id,true);
		$criteria->compare('KRA_description',$this->KRA_description,true);
		$criteria->compare('kpi_list',$this->kpi_list,true);
		$criteria->compare('target',$this->target,true);
		$criteria->compare('target_unit',$this->target_unit,true);
		$criteria->compare('target_value1',$this->target_value1,true);
		$criteria->compare('target_value2',$this->target_value2,true);
		$criteria->compare('target_value3',$this->target_value3,true);
		$criteria->compare('target_value4',$this->target_value4,true);
		$criteria->compare('target_value5',$this->target_value5,true);
		$criteria->compare('KRA_category',$this->KRA_category,true);
		$criteria->compare('appraisal_id1',$this->appraisal_id1,true);
		$criteria->compare('Employee_id',$this->Employee_id,true);
		$criteria->compare('kra_complete_flag',$this->kra_complete_flag);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KpiAutoSave the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
