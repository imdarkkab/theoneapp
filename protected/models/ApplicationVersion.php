<?php

/**
 * This is the model class for table "application_version".
 *
 * The followings are the available columns in table 'application_version':
 * @property integer $application_version_id
 * @property integer $application_id
 * @property integer $version_code
 * @property string $version_name
 * @property string $description
 * @property string $download_url
 * @property string $term_of_use
 * @property string $created_at
 * @property integer $is_critical_update
 *
 * The followings are the available model relations:
 * @property Application $application
 */
class ApplicationVersion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'application_version';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('application_id, version_code, is_critical_update', 'numerical', 'integerOnly'=>true),
			array('version_name', 'length', 'max'=>40),
			array('description, download_url', 'length', 'max'=>512),
			array('term_of_use', 'length', 'max'=>4096),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('application_version_id, application_id, version_code, version_name, description, download_url, term_of_use, created_at, is_critical_update', 'safe', 'on'=>'search'),
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
			'application' => array(self::BELONGS_TO, 'Application', 'application_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'application_version_id' => 'Application Version',
			'application_id' => 'Application',
			'version_code' => 'Version Code',
			'version_name' => 'Version Name',
			'description' => 'Description',
			'download_url' => 'Download Url',
			'term_of_use' => 'Term Of Use',
			'created_at' => 'Created At',
			'is_critical_update' => 'Is Critical Update',
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

		$criteria->compare('application_version_id',$this->application_version_id);
		$criteria->compare('application_id',$this->application_id);
		$criteria->compare('version_code',$this->version_code);
		$criteria->compare('version_name',$this->version_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('download_url',$this->download_url,true);
		$criteria->compare('term_of_use',$this->term_of_use,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('is_critical_update',$this->is_critical_update);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ApplicationVersion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
