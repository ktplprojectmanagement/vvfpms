<?php

/**
 * This is the model class for table "login".
 *
 * The followings are the available columns in table 'login':
 * @property integer $id
 * @property string $username
 * @property string $password
 */
class LoginForm extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'login';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password','required'),
			//array('username, password','length','min'=>5),
			array('username, password', 'length','max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
		);
	}

	public function check_login($data)
	{
		//print_r($data);die();
		$connection=Yii::app()->db;
		$sql = "select * from login where username = :username and password = :password";
		$command=$connection->createCommand($sql);
		$command->bindValue(":username",$data['username'],PDO::PARAM_STR);
		$command->bindValue(":password",$data['password'],PDO::PARAM_STR);
		//$result = $command->execute();
		$find_result = $command->queryRow();
		//print_r($find_result);die();
		
		//return $find_result;
		if ($find_result != '') {
			$sql1 = "select * from Employee where Email_id = :Email_id";
			$command=$connection->createCommand($sql1);
			$command->bindValue(":Email_id",$data['username'],PDO::PARAM_STR);
			$result1 = $command->queryRow();	
			//print_r($result1);die();		
			return $result1;
		}
		else
		{
			return $result;
		}
		//print_r($result);die();
		
	}

	public function check_role($data)
	{
		//print_r($data);die();
		$connection=Yii::app()->db;
		$sql = "select * from login where username = :username and password = :password";
		$command=$connection->createCommand($sql);
		$command->bindValue(":username",$data['username'],PDO::PARAM_STR);
		$command->bindValue(":password",$data['password'],PDO::PARAM_STR);
		//$result = $command->execute();
		$find_result = $command->queryRow();
		return $find_result;
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Login the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
