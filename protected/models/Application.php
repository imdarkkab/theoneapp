<?php

/**
 * This is the model class for table "application".
 *
 * The followings are the available columns in table 'application':
 * @property integer $application_id
 * @property string $application_name
 * @property string $description
 * @property string $api_key
 * @property string $api_salt
 * @property string $created_at
 * @property integer $user_id
 * @property integer $is_active
 * @property string $terms
 * @property string $push_exec_class
 *
 * The followings are the available model relations:
 * @property ApplicationVersion[] $applicationVersions
 */
class Application extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, is_active', 'numerical', 'integerOnly'=>true),
			array('application_name', 'length', 'max'=>64),
			array('description, api_key, api_salt, terms, push_exec_class', 'length', 'max'=>512),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('application_id, application_name, description, api_key, api_salt, created_at, user_id, is_active, terms, push_exec_class', 'safe', 'on'=>'search'),
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
			'applicationVersions' => array(self::HAS_MANY, 'ApplicationVersion', 'application_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'application_id' => 'Application',
			'application_name' => 'Application Name',
			'description' => 'Description',
			'api_key' => 'Api Key',
			'api_salt' => 'Api Salt',
			'created_at' => 'Created At',
			'user_id' => 'User',
			'is_active' => 'Is Active',
			'terms' => 'Terms',
			'push_exec_class' => 'Push Exec Class',
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

		$criteria->compare('application_id',$this->application_id);
		$criteria->compare('application_name',$this->application_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('api_key',$this->api_key,true);
		$criteria->compare('api_salt',$this->api_salt,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('terms',$this->terms,true);
		$criteria->compare('push_exec_class',$this->push_exec_class,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Application the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
