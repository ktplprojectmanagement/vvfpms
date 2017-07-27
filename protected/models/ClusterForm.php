<?php

/**
 * This is the model class for table "cluster".
 *
 * The followings are the available columns in table 'cluster':
 * @property integer $id
 * @property string $cluster_name
 * @property string $department
 * @property string $grade
 * @property string $cluster_appraiser
 */
class ClusterForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cluster';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cluster_name, department, grade, cluster_appraiser', 'required'),
			array('cluster_name, department, grade', 'length', 'max'=>100),
			array('cluster_appraiser', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cluster_name, department, grade, cluster_appraiser', 'safe', 'on'=>'search'),
		);
	}

	function get_list($list)
	{
		$connection=Yii::app()->db;
		$sql = "select distinct ".$list." from `cluster`";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_cluster_data($where,$data,$list,$distinct)
	{		
		$connection=Yii::app()->db;
		$sql = "select distinct ".$distinct." from `cluster`".' '.$where;
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_distinct_list($list,$where)
	{
		$connection=Yii::app()->db;
		$sql = "SELECT DISTINCT `".$list."` FROM `cluster`".$where."";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}
       
       function get_department_list()
	{
		$connection=Yii::app()->db;
		$sql = "select distinct `department` from `cluster` where department != ''";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_designation_list()
	{
		$connection=Yii::app()->db;
		$sql = "select distinct `designation` from `cluster` where designation != ''";
		$command=$connection->createCommand($sql);
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_employee_data($where,$data,$list)
	{		
		$connection=Yii::app()->db;
		$sql = "select * from `cluster`".' '.$where;
		//print_r($sql);die();
		$command=$connection->createCommand($sql);
		for ($i=0; $i < count($list); $i++) { 
			$command->bindValue(":".$list[$i],$data[$i]);
		}
		$rows=$command->queryAll();		
		return $rows;
	}

	function get_employee_data1()
	{		
		$connection=Yii::app()->db;
		$sql = "select * from cluster";
		$command=$connection->createCommand($sql);
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
			'cluster_name' => 'Cluster Name',
			'department' => 'Department',
			'grade' => 'Grade',
			'cluster_appraiser' => 'Cluster Appraiser',
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
		$criteria->compare('cluster_name',$this->cluster_name,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('grade',$this->grade,true);
		$criteria->compare('cluster_appraiser',$this->cluster_appraiser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cluster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
