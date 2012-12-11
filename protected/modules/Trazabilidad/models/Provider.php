<?php

/**
 * This is the model class for table "Provider".
 *
 * The followings are the available columns in table 'Provider':
 * @property integer $ID
 * @property integer $UserID
 * @property string $Name
 * @property string $Address
 * @property string $Phone
 * @property string $Contact
 * @property integer $Nrgseaa
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Provider extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Provider the static model class
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
		return 'Provider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserID, Name', 'required'),
			array('UserID, Nrgseaa', 'numerical', 'integerOnly'=>true),
			array('Name, Address', 'length', 'max'=>200),
			array('Phone', 'length', 'max'=>10),
			array('Contact', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, UserID, Name, Address, Phone, Contact, Nrgseaa', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'UserID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'UserID' => 'User',
			'Name' => 'Nombre: ',
			'Address' => 'Direccion: ',
			'Phone' => 'Telefono: ',
			'Contact' => 'Persona contacto: ',
			'Nrgseaa' => 'NRGSEAA: ',
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
		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Address',$this->Address,true);
		$criteria->compare('Phone',$this->Phone,true);
		$criteria->compare('Contact',$this->Contact,true);
		$criteria->compare('Nrgseaa',$this->Nrgseaa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
            	'pageSize'=>Yii::app()->params['defaultPageSize'],              
            ),
		));
	}
}