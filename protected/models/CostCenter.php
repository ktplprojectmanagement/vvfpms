 <?php

/**
 * This is the model class for table "cost_center".
 *
 * The followings are the available columns in table 'cost_center':
 * @property integer $id
 * @property string $cost_center
 * @property string $cost_center_description
 */
class CostCenter extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'cost_center';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cost_center, cost_center_description', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, cost_center, cost_center_description', 'safe', 'on'=>'search'),
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
            'cost_center' => 'Cost Center',
            'cost_center_description' => 'Cost Center Description',
        );
    }
    function getCodes()
    {
        $connection=Yii::app()->db;
        $sql = "select distinct `cost_center` from cost_center";
        $command=$connection->createCommand($sql);
        $rows=$command->queryAll();
        return $rows;
    }

    function get_costCenter_data($where,$data,$list)
    {       
        $connection=Yii::app()->db;
        $sql = "select * from `cost_center` ".' '.$where;
               
        //print_r($sql);die();
        $command=$connection->createCommand($sql);
        for ($i=0; $i < count($list); $i++) { 
            $command->bindValue(":".$list[$i],$data[$i]);
        }
        $rows=$command->queryAll();     
        return $rows;
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
        $criteria->compare('cost_center',$this->cost_center,true);
        $criteria->compare('cost_center_description',$this->cost_center_description,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CostCenter the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}