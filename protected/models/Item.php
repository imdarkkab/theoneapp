<?php

/**
 * This is the model class for table "item".
 *
 * The followings are the available columns in table 'item':
 * @property integer $item_id
 * @property integer $item_type_id
 * @property string $name
 * @property string $description
 * @property string $picture
 * @property integer $is_active
 * @property string $publish_up
 * @property string $publish_down
 * @property string $created_at
 * @property integer $created_by
 * @property string $key
 * @property integer $cost
 *
 * The followings are the available model relations:
 * @property InboxItem[] $inboxItems
 * @property ItemType $itemType
 * @property Reward[] $rewards
 */
class Item extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'item';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_type_id, is_active, created_by, cost', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('description, picture', 'length', 'max'=>512),
			array('key', 'length', 'max'=>64),
			array('publish_up, publish_down, created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('item_id, item_type_id, name, description, picture, is_active, publish_up, publish_down, created_at, created_by, key, cost', 'safe', 'on'=>'search'),
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
			'inboxItems' => array(self::HAS_MANY, 'InboxItem', 'item_id'),
			'itemType' => array(self::BELONGS_TO, 'ItemType', 'item_type_id'),
			'rewards' => array(self::HAS_MANY, 'Reward', 'item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'item_id' => 'Item',
			'item_type_id' => 'Item Type',
			'name' => 'Name',
			'description' => 'Description',
			'picture' => 'Picture',
			'is_active' => 'Is Active',
			'publish_up' => 'Publish Up',
			'publish_down' => 'Publish Down',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'key' => 'Key',
			'cost' => 'Cost',
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

		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('item_type_id',$this->item_type_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('publish_up',$this->publish_up,true);
		$criteria->compare('publish_down',$this->publish_down,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('cost',$this->cost);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Item the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
