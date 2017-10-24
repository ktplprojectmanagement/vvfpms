<?php

/**
 * This is the model class for table "yearend_reviewb".
 *
 * The followings are the available columns in table 'yearend_reviewb':
 * @property string $Employee_id
 * @property string $Reporting_officer1_id
 * @property string $appraiser_review
 * @property string $employee_review1
 * @property string $employee_review2
 * @property string $review1_example1
 * @property string $review1_example2
 * @property string $review2_example1
 * @property string $review2_example2
 * @property string $review_date
 */
class Yearend_reviewbForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yearend_reviewb';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Employee_id, Reporting_officer1_id, appraiser_review, employee_review1, employee_review2, review1_example1, review1_example2, review2_example1, review2_example2, review_date', 'required'),
			array('Employee_id, Reporting_officer1_id', 'length', 'max'=>70),
			array('appraiser_review, employee_review1, employee_review2', 'length', 'max'=>300),
			array('review1_example1, review1_example2, review2_example1, review2_example2', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Employee_id, Reporting_officer1_id, appraiser_review, employee_review1, employee_review2, review1_example1, review1_example2, review2_example1, review2_example2, review_date', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Employee_id' => 'Employee',
			'Reporting_officer1_id' => 'Reporting Officer1',
			'appraiser_review' => 'Appraiser Review',
			'employee_review1' => 'Employee Review1',
			'employee_review2' => 'Employee Review2',
			'review1_example1' => 'Review1 Example1',
			'review1_example2' => 'Review1 Example2',
			'review2_example1' => 'Review2 Example1',
			'review2_example2' => 'Review2 Example2',
			'review_date' => 'Review Date',
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

		$criteria->compare('Employee_id',$this->Employee_id,true);
		$criteria->compare('Reporting_officer1_id',$this->Reporting_officer1_id,true);
		$criteria->compare('appraiser_review',$this->appraiser_review,true);
		$criteria->compare('employee_review1',$this->employee_review1,true);
		$criteria->compare('employee_review2',$this->employee_review2,true);
		$criteria->compare('review1_example1',$this->review1_example1,true);
		$criteria->compare('review1_example2',$this->review1_example2,true);
		$criteria->compare('review2_example1',$this->review2_example1,true);
		$criteria->compare('review2_example2',$this->review2_example2,true);
		$criteria->compare('review_date',$this->review_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	function get_all_data()
	{
		$connection=Yii::app()->db;
		$sql = "select * from `yearend_reviewb` ";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_employee_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `yearend_reviewb`  ".' '.$where;
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
		$sql = "select * from yearend_reviewb  ".' '.$where;
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();
		//print_r($rows);die();
		return $rows;
	}

function get_yearEnd_submitted_team($array,$year1){
		//print_r($array);die();
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `Employee_id` FROM yearend_reviewb WHERE (`Employee_id` IN (SELECT s.`Employee_id` FROM yearend_reviewb as s WHERE `year_end_reviewb_status` = '1')) AND (`Employee_id` IN (".$array.") AND (`goal_set_year`='$year1'))";
		//$sql="SELECT DISTINCT `Employee_id` FROM yearend_reviewb WHERE (`Employee_id` IN (SELECT s.`Employee_id` FROM yearend_reviewb as s WHERE `year_end_reviewb_status` = '1')) AND (`Employee_id` IN ('vvf57e264fd8d3e') AND (`goal_set_year`='2016-2017'))";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
	function get_pending_yearEnd_team($array,$year1)
	{
		//echo $year1;die();
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id` from `yearend_reviewb` WHERE (`Employee_id` IN (SELECT s.`Employee_id` FROM yearend_reviewb as s WHERE (`year_end_reviewb_status` = '1') AND (`year_end_b_appr_status` ='0' OR `year_end_b_appr_status` =' ') )) AND (`Employee_id` IN (".$array.") AND (`goal_set_year`='$year1'))";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}
	function get_Approved_yearEnd_team($array,$year1)
	{
		//echo $year1;die();
		$connection=Yii::app()->db;
		$sql ="SELECT DISTINCT `Employee_id` from `yearend_reviewb` WHERE (`Employee_id` IN (SELECT s.`Employee_id` FROM yearend_reviewb as s WHERE (`year_end_reviewb_status` = '1') AND (`year_end_b_appr_status` ='1') )) AND (`Employee_id` IN (".$array.") AND (`goal_set_year`='$year1'))";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return YearendReviewb the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
