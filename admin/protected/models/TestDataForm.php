<?php

/**
 * This is the model class for table "test_data".
 *
 * The followings are the available columns in table 'test_data':
 * @property integer $question
 * @property integer $ans1
 * @property integer $ans2
 * @property integer $ans3
 * @property integer $ans4
 * @property integer $cader
 * @property integer $department
 */
class TestDataForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'test_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question, ans1, ans2, ans3, ans4', 'required'),
			//array('question, ans1, ans2, ans3, ans4, cader, department', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('question, ans1, ans2, ans3, ans4, cader, department', 'safe', 'on'=>'search'),
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
		$sql = "select * from test_data";
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
			'question' => 'Question',
			'ans1' => 'Ans1',
			'ans2' => 'Ans2',
			'ans3' => 'Ans3',
			'ans4' => 'Ans4',
			'cader' => 'Cader',
			'department' => 'Department',
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

		$criteria->compare('question',$this->question);
		$criteria->compare('ans1',$this->ans1);
		$criteria->compare('ans2',$this->ans2);
		$criteria->compare('ans3',$this->ans3);
		$criteria->compare('ans4',$this->ans4);
		$criteria->compare('cader',$this->cader);
		$criteria->compare('department',$this->department);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TestData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
