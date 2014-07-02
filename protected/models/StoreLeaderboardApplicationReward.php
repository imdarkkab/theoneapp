<?php

/**
 * This is the model class for table "store_leaderboard_application_reward".
 *
 * The followings are the available columns in table 'store_leaderboard_application_reward':
 * @property integer $reward_id
 * @property integer $store_leaderboard_application_id
 * @property integer $action_id
 * @property integer $unit_id
 * @property double $point
 */
class StoreLeaderboardApplicationReward extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'store_leaderboard_application_reward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('store_leaderboard_application_id, action_id, unit_id', 'required'),
			array('store_leaderboard_application_id, action_id, unit_id', 'numerical', 'integerOnly'=>true),
			array('point', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reward_id, store_leaderboard_application_id, action_id, unit_id, point', 'safe', 'on'=>'search'),
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
			'reward_id' => 'Reward',
			'store_leaderboard_application_id' => 'Store Leaderboard Application',
			'action_id' => 'Action',
			'unit_id' => 'Unit',
			'point' => 'Point',
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

		$criteria->compare('reward_id',$this->reward_id);
		$criteria->compare('store_leaderboard_application_id',$this->store_leaderboard_application_id);
		$criteria->compare('action_id',$this->action_id);
		$criteria->compare('unit_id',$this->unit_id);
		$criteria->compare('point',$this->point);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StoreLeaderboardApplicationReward the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
