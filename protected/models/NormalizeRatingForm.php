<?php

/**
 * This is the model class for table "normalize_rating".
 *
 * The followings are the available columns in table 'normalize_rating':
 * @property integer $id
 * @property string $Employee_id
 * @property string $Reporting_officer1_id
 * @property string $KRA_id
 * @property string $KRA_score
 * @property string $Score_comment
 * @property double $Tota_score
 * @property double $performance_rating
 */
class NormalizeRatingForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'normalize_rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('Employee_id, Reporting_officer1_id', 'required'),
			//array('Tota_score, performance_rating', 'numerical'),
			array('Employee_id, Reporting_officer1_id, KRA_id, KRA_score', 'length', 'max'=>100),
			array('Score_comment', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Employee_id, Reporting_officer1_id, KRA_id, KRA_score, Score_comment, Tota_score, performance_rating', 'safe', 'on'=>'search'),
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

	function get_setting_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `normalize_rating`".' '.$where;
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
			'Employee_id' => 'Employee',
			'Reporting_officer1_id' => 'Reporting Officer1',
			'KRA_id' => 'Kra',
			'KRA_score' => 'Kra Score',
			'Score_comment' => 'Score Comment',
			'Tota_score' => 'Tota Score',
			'performance_rating' => 'Performance Rating',
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
		$criteria->compare('Employee_id',$this->Employee_id,true);
		$criteria->compare('Reporting_officer1_id',$this->Reporting_officer1_id,true);
		$criteria->compare('KRA_id',$this->KRA_id,true);
		$criteria->compare('KRA_score',$this->KRA_score,true);
		$criteria->compare('Score_comment',$this->Score_comment,true);
		$criteria->compare('Tota_score',$this->Tota_score);
		$criteria->compare('performance_rating',$this->performance_rating);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NormalizeRating the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
