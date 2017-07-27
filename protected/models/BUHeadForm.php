<?php

/**
 * This is the model class for table "BU_head".
 *
 * The followings are the available columns in table 'BU_head':
 * @property integer $id
 * @property string $name
 * @property string $email_id
 * @property string $BU
 */
class BUHeadForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'BU_head';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name, email_id, BU', 'required'),
			array('name, email_id', 'length', 'max'=>100),
			array('BU', 'length', 'max'=>300),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email_id, BU', 'safe', 'on'=>'search'),
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

        function get_bu_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `BU_head`".' '.$where;
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();		
		return $rows;
	}
	 function get_bu_data_column($where,$data,$list,$column)
	{		
		$connection=Yii::app()->db;
		$sql = "select DISTINCT `".$column."` from `BU_head`".' '.$where;
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();		
		return $rows;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'email_id' => 'Email',
			'BU' => 'Bu',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email_id',$this->email_id,true);
		$criteria->compare('BU',$this->BU,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BUHead the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
