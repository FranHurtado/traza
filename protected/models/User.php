<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $ID
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $zipcode
 * @property string $city
 * @property string $phone
 * @property string $role
 * @property integer $active
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, password', 'required'),
			array('active', 'numerical', 'integerOnly'=>true),
			array('name, password', 'length', 'max'=>50),
			array('email, address', 'length', 'max'=>100),
			array('zipcode', 'length', 'max'=>8),
			array('phone', 'length', 'max'=>20),
			array('role', 'length', 'max'=>10),
			array('city', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, name, email, password, address, zipcode, city, phone, role, active', 'safe', 'on'=>'search'),
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
			'ID' => 'ID',
			'name' => 'Name',
			'email' => 'Email',
			'password' => 'Password',
			'address' => 'Address',
			'zipcode' => 'Zipcode',
			'city' => 'City',
			'phone' => 'Phone',
			'role' => 'Role',
			'active' => 'Active',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID',$this->ID);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('zipcode',$this->zipcode,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}