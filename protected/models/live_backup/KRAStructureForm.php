<?php

/**
 * This is the model class for table "KRA_structure".
 *
 * The followings are the available columns in table 'KRA_structure':
 * @property string $KRA_id
 * @property integer $No_of_KPI
 * @property double $Weightage
 * @property string $KRP_wt_format
 * @property string $applicable_to
 * @property string $KRA_creation_date
 * @property string $KRA_hide_date
 * @property string $KRA_category
 * @property integer $id
 */
class KRAStructureForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'KRA_structure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('KRA_id, No_of_KPI, KRA_creation_date, KRA_category', 'required'),
			array('No_of_KPI', 'numerical', 'integerOnly'=>true),
			array('Weightage', 'numerical'),
			array('KRA_id, applicable_to, KRA_category', 'length', 'max'=>100),
			array('KRP_wt_format, KRA_creation_date, KRA_hide_date', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KRA_id, No_of_KPI, Weightage, KRP_wt_format, applicable_to, KRA_creation_date, KRA_hide_date, KRA_category, id', 'safe', 'on'=>'search'),
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

	function get_list()
	{
		$connection=Yii::app()->db;
		$sql = "select distinct `KRA_category` from `KRA_structure`";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();
		// $sql = "select * from `kpi_list` where `kpi_description` like :kpi_description".'%';
		// $command=$connection->createCommand($sql);
		// $command->bindValue(":kpi_description",$chk_value);
		// $rows=$command->queryAll();
		//$post = Yii::$app->db->createCommand('SELECT * FROM fruits WHERE name LIKE :name')->bindValue(':name', '%apple%')->queryOne();
		return $rows;
	}

	function get_all_kra()
	{
		$connection=Yii::app()->db;
		$sql = "select * from `KRA_structure`  where KRA_category != '--Select--'";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_kra_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `KRA_structure`".' '.$where;
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();
		// $sql = "select * from `kpi_list` where `kpi_description` like :kpi_description".'%';
		// $command=$connection->createCommand($sql);
		// $command->bindValue(":kpi_description",$chk_value);
		// $rows=$command->queryAll();
		//$post = Yii::$app->db->createCommand('SELECT * FROM fruits WHERE name LIKE :name')->bindValue(':name', '%apple%')->queryOne();
		return $rows;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KRA_id' => 'Kra',
			'No_of_KPI' => 'No Of Kpi',
			'Weightage' => 'Weightage',
			'KRP_wt_format' => 'Krp Wt Format',
			'applicable_to' => 'Applicable To',
			'KRA_creation_date' => 'Kra Creation Date',
			'KRA_hide_date' => 'Kra Hide Date',
			'KRA_category' => 'Kra Category',
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

		$criteria->compare('KRA_id',$this->KRA_id,true);
		$criteria->compare('No_of_KPI',$this->No_of_KPI);
		$criteria->compare('Weightage',$this->Weightage);
		$criteria->compare('KRP_wt_format',$this->KRP_wt_format,true);
		$criteria->compare('applicable_to',$this->applicable_to,true);
		$criteria->compare('KRA_creation_date',$this->KRA_creation_date,true);
		$criteria->compare('KRA_hide_date',$this->KRA_hide_date,true);
		$criteria->compare('KRA_category',$this->KRA_category,true);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return KRAStructure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
