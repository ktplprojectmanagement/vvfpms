<?php

/**
 * This is the model class for table "kpi_list".
 *
 * The followings are the available columns in table 'kpi_list':
 * @property string $kpi_name
 * @property string $kpi_description
 * @property string $department
 */
class KpiListForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kpi_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kpi_name, kpi_description, department', 'required'),
			array('kpi_name', 'length', 'max'=>100),
			array('kpi_description', 'length', 'max'=>300),
			array('department', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kpi_name, kpi_description, department', 'safe', 'on'=>'search'),
		);
	}

	function get_seach($chk_value)
	{
		$connection=Yii::app()->db;
		$sql = "select * from `kpi_list` where `kpi_description` like :kpi_description";
		$command=$connection->createCommand($sql);
		$command->bindValue(":kpi_description",$chk_value.'%');
		$rows=$command->queryAll();
		// $sql = "select * from `kpi_list` where `kpi_description` like :kpi_description".'%';
		// $command=$connection->createCommand($sql);
		// $command->bindValue(":kpi_description",$chk_value);
		// $rows=$command->queryAll();
		//$post = Yii::$app->db->createCommand('SELECT * FROM fruits WHERE name LIKE :name')->bindValue(':name', '%apple%')->queryOne();
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
			'kpi_name' => 'Kpi Name',
			'kpi_description' => 'Kpi Description',
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

		$criteria->compare('kpi_name',$this->kpi_name,true);
		$criteria->compare('kpi_description',$this->kpi_description,true);
		$criteria->compare('department',$this->department,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KpiList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
