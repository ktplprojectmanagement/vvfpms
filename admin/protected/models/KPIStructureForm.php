<?php

/**
 * This is the model class for table "KPI_structure".
 *
 * The followings are the available columns in table 'KPI_structure':
 * @property integer $KPI_id
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
 * @property string $KRA_date
 * @property string $KRA_status
 * @property string $appraisal_id1
 * @property string $appraisal_id2
 * @property string $Employee_id
 */
class KPIStructureForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'KPI_structure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KPI_id, KRA_description, kpi_list, target, target_unit, target_value1, KRA_category, KRA_date, KRA_status, appraisal_id1, Employee_id', 'required'),
			// array('KPI_id', 'numerical', 'integerOnly'=>true),
			array('KRA_description, kpi_list', 'length', 'max'=>200),
			array('target, target_unit, target_value1, target_value2, target_value3, target_value4, target_value5, KRA_category, appraisal_id1, appraisal_id2, Employee_id', 'length', 'max'=>100),
			array('KRA_date, KRA_status', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KPI_id, KRA_description, kpi_list, target, target_unit, target_value1, target_value2, target_value3, target_value4, target_value5, KRA_category, KRA_date, KRA_status, appraisal_id1, appraisal_id2, Employee_id', 'safe', 'on'=>'search'),
		);
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

	function getdata()
	{
		$connection=Yii::app()->db;
		$sql = "select * from KPI_structure";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	function get_emp_list()
	{
		$connection=Yii::app()->db;
		$sql = "select distinct `Employee_id` from `KPI_structure` where KRA_status_flag ='2'";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_kpi_list($where,$data,$list)
	{
		$connection=Yii::app()->db;
		$sql = "select * from KPI_structure".' '.$where;
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();
		//print_r($rows);die();
		return $rows;
	}

	function get_distinct_list($list,$where)
	{
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `".$list."` FROM `KPI_structure`".$where."";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_set_kpi1()
	{
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id`,`KRA_status` FROM `KPI_structure` ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_pending_goal()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id` from `KPI_structure` WHERE `KRA_status`='Pending' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_midrev_data()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`mid_KRA_status` FROM `KPI_structure` WHERE `mid_KRA_status`!= '' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_midrev_data_pend()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`mid_KRA_status` from `KPI_structure` WHERE `mid_KRA_status`='Pending' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_yearA_data()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`kra_complete_flag` FROM `KPI_structure` WHERE `kra_complete_flag`>= '2' ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	function get_yearA_data_appr()
	{
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id`,`kra_complete_flag` FROM `KPI_structure` WHERE `kra_complete_flag` = '2' ";
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
			'KRA_date' => 'Kra Date',
			'KRA_status' => 'Kra Status',
			'appraisal_id1' => 'Appraisal Id1',
			'appraisal_id2' => 'Appraisal Id2',
			'Employee_id' => 'Employee',
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

		$criteria->compare('KPI_id',$this->KPI_id);
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
		$criteria->compare('KRA_date',$this->KRA_date,true);
		$criteria->compare('KRA_status',$this->KRA_status,true);
		$criteria->compare('appraisal_id1',$this->appraisal_id1,true);
		$criteria->compare('appraisal_id2',$this->appraisal_id2,true);
		$criteria->compare('Employee_id',$this->Employee_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KPIStructure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
