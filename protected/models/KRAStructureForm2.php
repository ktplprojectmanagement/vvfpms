<?php

/**
 * This is the model class for table "KRA_structure".
 *
 * The followings are the available columns in table 'KRA_structure':
 * @property string $KRA_category
 * @property double $Weightage
 * @property string $KRP_wt_format
 * @property integer $No_of_KPI
 * @property string $applicable_to
 * @property string $KRA_creation_date
 * @property string $KRA_hide_date
 * @property string $KRA_id
 *
 * The followings are the available model relations:
 * @property KPIStructure $kPIStructure
 * @property Employee $kRA
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
			//array('KRA_category, Weightage, KRA_id', 'required'),
			array('No_of_KPI', 'numerical', 'integerOnly'=>true),
			array('Weightage', 'numerical'),
			array('KRA_category', 'length', 'max'=>50),
			array('KRP_wt_format', 'length', 'max'=>200),
			array('applicable_to', 'length', 'max'=>100),
			array('KRA_id', 'length', 'max'=>45),
			array('KRA_creation_date, KRA_hide_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('KRA_category, Weightage, KRP_wt_format, No_of_KPI, applicable_to, KRA_creation_date, KRA_hide_date, KRA_id', 'safe', 'on'=>'search'),
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
			'kPIStructure' => array(self::HAS_ONE, 'KPIStructure', 'KRA_id'),
			'kRA' => array(self::BELONGS_TO, 'Employee', 'KRA_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'KRA_category' => 'Kra Category',
			'Weightage' => 'Weightage',
			'KRP_wt_format' => 'Krp Wt Format',
			'No_of_KPI' => 'No Of Kpi',
			'applicable_to' => 'Applicable To',
			'KRA_creation_date' => 'Kra Creation Date',
			'KRA_hide_date' => 'Kra Hide Date',
			'KRA_id' => 'Kra',
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

		$criteria->compare('KRA_category',$this->KRA_category,true);
		$criteria->compare('Weightage',$this->Weightage);
		$criteria->compare('KRP_wt_format',$this->KRP_wt_format,true);
		$criteria->compare('No_of_KPI',$this->No_of_KPI);
		$criteria->compare('applicable_to',$this->applicable_to,true);
		$criteria->compare('KRA_creation_date',$this->KRA_creation_date,true);
		$criteria->compare('KRA_hide_date',$this->KRA_hide_date,true);
		$criteria->compare('KRA_id',$this->KRA_id,true);

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
