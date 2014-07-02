<?php

/**
 * This is the model class for table "inbox_item".
 *
 * The followings are the available columns in table 'inbox_item':
 * @property integer $inbox_item_id
 * @property integer $inbox_id
 * @property integer $item_id
 * @property integer $is_received
 * @property string $received_at
 * @property string $created_at
 * @property integer $qty
 * @property integer $is_delete
 *
 * The followings are the available model relations:
 * @property Inbox $inbox
 * @property Item $item
 */
class InboxItem extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'inbox_item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('inbox_id, item_id, is_received, qty, is_delete', 'numerical', 'integerOnly'=>true),
			array('received_at, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('inbox_item_id, inbox_id, item_id, is_received, received_at, created_at, qty, is_delete', 'safe', 'on'=>'search'),
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
			'inbox' => array(self::BELONGS_TO, 'Inbox', 'inbox_id'),
			'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'inbox_item_id' => 'Inbox Item',
			'inbox_id' => 'Inbox',
			'item_id' => 'Item',
			'is_received' => 'Is Received',
			'received_at' => 'Received At',
			'created_at' => 'Created At',
			'qty' => 'Qty',
			'is_delete' => 'Is Delete',
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

		$criteria->compare('inbox_item_id',$this->inbox_item_id);
		$criteria->compare('inbox_id',$this->inbox_id);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('is_received',$this->is_received);
		$criteria->compare('received_at',$this->received_at,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('qty',$this->qty);
		$criteria->compare('is_delete',$this->is_delete);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return InboxItem the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
