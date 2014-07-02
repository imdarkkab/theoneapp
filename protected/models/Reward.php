<?php

/**
 * This is the model class for table "reward".
 *
 * The followings are the available columns in table 'reward':
 * @property integer $reward_id
 * @property integer $customer_id
 * @property integer $item_id
 * @property integer $is_claimed
 * @property string $created_at
 * @property string $expire_at
 * @property integer $created_by
 *
 * The followings are the available model relations:
 * @property Item $item
 */
class Reward extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('customer_id, item_id, is_claimed, created_at', 'required'),
			array('customer_id, item_id, is_claimed, created_by', 'numerical', 'integerOnly'=>true),
			array('expire_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('reward_id, customer_id, item_id, is_claimed, created_at, expire_at, created_by', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'reward_id' => 'Reward',
			'customer_id' => 'Customer',
			'item_id' => 'Item',
			'is_claimed' => 'Is Claimed',
			'created_at' => 'Created At',
			'expire_at' => 'Expire At',
			'created_by' => 'Created By',
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
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('is_claimed',$this->is_claimed);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('expire_at',$this->expire_at,true);
		$criteria->compare('created_by',$this->created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reward the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
