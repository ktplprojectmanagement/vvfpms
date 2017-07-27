<?php

/**
 * This is the model class for table "promotion_form_data".
 *
 * The followings are the available columns in table 'promotion_form_data':
 * @property string $field1
 * @property string $field2
 * @property string $field3
 * @property string $field4
 * @property string $field5
 * @property string $field6
 * @property string $field7
 * @property string $field8
 */
class PromotionForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promotion_form_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('field1, field2, field3, field4, field5, field6, field7, field8', 'required'),
			//array('field1, field2, field3, field4, field5, field6, field7, field8', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('field1, field2, field3, field4, field5, field6, field7, field8', 'safe', 'on'=>'search'),
		);
	}

        function getdata()
	{
		$connection=Yii::app()->db;
		$sql = "select * from promotion_form_data where update_flag != '2'";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		return $rows;
	}

	function get_employee_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `promotion_form_data`".' '.$where;
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
			'field1' => 'Field1',
			'field2' => 'Field2',
			'field3' => 'Field3',
			'field4' => 'Field4',
			'field5' => 'Field5',
			'field6' => 'Field6',
			'field7' => 'Field7',
			'field8' => 'Field8',
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

		$criteria->compare('field1',$this->field1,true);
		$criteria->compare('field2',$this->field2,true);
		$criteria->compare('field3',$this->field3,true);
		$criteria->compare('field4',$this->field4,true);
		$criteria->compare('field5',$this->field5,true);
		$criteria->compare('field6',$this->field6,true);
		$criteria->compare('field7',$this->field7,true);
		$criteria->compare('field8',$this->field8,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PromotionFormData the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
