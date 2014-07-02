<?php

/**
 * This is the model class for table "leaderboard".
 *
 * The followings are the available columns in table 'leaderboard':
 * @property integer $leaderboard_id
 * @property string $leaderboard_name
 * @property string $description
 * @property string $created_at
 * @property integer $highest_is_winner
 * @property integer $calculate_total_point
 * @property string $publish_up
 * @property string $publish_down
 * @property integer $is_active
 * @property string $leaderboard_key
 * @property string $description_url
 * @property integer $leaderboard_type
 */
class Leaderboard extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'leaderboard';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('leaderboard_name, created_at', 'required'),
			array('highest_is_winner, calculate_total_point, is_active, leaderboard_type', 'numerical', 'integerOnly'=>true),
			array('leaderboard_name', 'length', 'max'=>128),
			array('description, leaderboard_key, description_url', 'length', 'max'=>512),
			array('publish_up, publish_down', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('leaderboard_id, leaderboard_name, description, created_at, highest_is_winner, calculate_total_point, publish_up, publish_down, is_active, leaderboard_key, description_url, leaderboard_type', 'safe', 'on'=>'search'),
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
			'leaderboard_id' => 'Leaderboard',
			'leaderboard_name' => 'Leaderboard Name',
			'description' => 'Description',
			'created_at' => 'Created At',
			'highest_is_winner' => 'Highest Is Winner',
			'calculate_total_point' => 'Calculate Total Point',
			'publish_up' => 'Publish Up',
			'publish_down' => 'Publish Down',
			'is_active' => 'Is Active',
			'leaderboard_key' => 'Leaderboard Key',
			'description_url' => 'Description Url',
			'leaderboard_type' => 'Leaderboard Type',
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

		$criteria->compare('leaderboard_id',$this->leaderboard_id);
		$criteria->compare('leaderboard_name',$this->leaderboard_name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('highest_is_winner',$this->highest_is_winner);
		$criteria->compare('calculate_total_point',$this->calculate_total_point);
		$criteria->compare('publish_up',$this->publish_up,true);
		$criteria->compare('publish_down',$this->publish_down,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('leaderboard_key',$this->leaderboard_key,true);
		$criteria->compare('description_url',$this->description_url,true);
		$criteria->compare('leaderboard_type',$this->leaderboard_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Leaderboard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
