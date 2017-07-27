<?php

/**
 * This is the model class for table "program_data".
 *
 * The followings are the available columns in table 'program_data':
 * @property integer $id
 * @property string $program_name
 * @property string $faculty_type
 * @property double $amount
 * @property string $faculty_email_id
 * @property double $training_days
 */
class ProgramDataForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'program_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('program_name, faculty_type, training_days', 'required'),
			array('amount', 'numerical'),
			array('program_name', 'length', 'max'=>300),
			array('faculty_type, faculty_email_id', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, program_name, faculty_type, amount, faculty_email_id, training_days', 'safe', 'on'=>'search'),
		);
	}

	function get_kpi_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `program_data`".' '.$where.'   order by `need` DESC ';
	//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();		
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'program_name' => 'Program Name',
			'faculty_type' => 'Faculty Type',
			'amount' => 'Amount',
			'faculty_email_id' => 'Faculty Email',
			'training_days' => 'Training Days',
		);
	}

	function get_data()
	{		
		$connection=Yii::app()->db;
		$sql = "select * from program_data";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
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

		$criteria->compare('id',$this->id);
		$criteria->compare('program_name',$this->program_name,true);
		$criteria->compare('faculty_type',$this->faculty_type,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('faculty_email_id',$this->faculty_email_id,true);
		$criteria->compare('training_days',$this->training_days);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProgramData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
