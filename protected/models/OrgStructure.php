<?php

/**
 * This is the model class for table "org_structure".
 *
 * The followings are the available columns in table 'org_structure':
 * @property string $Cadre
 * @property string $Designation
 * @property string $Name
 * @property string $Sub_designation_id
 * @property string $Designation_id
 * @property string $Sub_designation_name
 * @property string $Department
 */
class OrgStructure extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'org_structure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Cadre, Designation, Name, Designation_id, Department', 'required'),
			array('Cadre', 'length', 'max'=>25),
			array('Designation', 'length', 'max'=>50),
			array('Name, Sub_designation_id, Designation_id, Sub_designation_name, Department', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Cadre, Designation, Name, Sub_designation_id, Designation_id, Sub_designation_name, Department', 'safe', 'on'=>'search'),
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
			'Cadre' => 'Cadre',
			'Designation' => 'Designation',
			'Name' => 'Name',
			'Sub_designation_id' => 'Sub Designation',
			'Designation_id' => 'Designation',
			'Sub_designation_name' => 'Sub Designation Name',
			'Department' => 'Department',
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

		$criteria->compare('Cadre',$this->Cadre,true);
		$criteria->compare('Designation',$this->Designation,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Sub_designation_id',$this->Sub_designation_id,true);
		$criteria->compare('Designation_id',$this->Designation_id,true);
		$criteria->compare('Sub_designation_name',$this->Sub_designation_name,true);
		$criteria->compare('Department',$this->Department,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrgStructure the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
