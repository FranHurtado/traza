<?php

/**
 * This is the model class for table "Product".
 *
 * The followings are the available columns in table 'Product':
 * @property integer $ID
 * @property integer $UserID
 * @property string $Name
 * @property string $Code
 * @property string $Barcode
 * @property double $Price
 * @property string $ExpireDate
 * @property string $MadeDate
 */
class Product extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return 'Product';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserID, Name, Code, ExpireDate, RecipeID, Quantity, Frequency', 'required'),
			array('UserID, RecipeID, Quantity, Frequency, ExpireDate', 'numerical', 'integerOnly'=>true),
			array('Price', 'numerical'),
			array('Name', 'length', 'max'=>100),
			array('Code', 'length', 'max'=>9),
			array('Barcode', 'length', 'max'=>14),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, UserID, Name, Code, Barcode, Price, ExpireDate, MadeDate', 'safe', 'on'=>'search'),
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
			'recipe' => array(self::BELONGS_TO, 'Recipe', 'RecipeID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'UserID' => 'Usuario: ',
			'Name' => 'Nombre del producto: ',
			'Code' => 'C&oacute;digo: ',
			'Barcode' => 'C&oacute;digo de barras: ',
			'Price' => 'Precio: ',
			'ExpireDate' => 'Dias para caducidad: ',
			'MadeDate' => 'Fecha de fabricaci&oacute;n: ',
			'RecipeID' => 'Receta relacionada: ',
			'Quantity' => 'Frecuencia de producci&oacute;n: ',
			'Frecuency' => 'Receta relacionada: ',
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
		$criteria->compare('Code',$this->Code,true);
		$criteria->compare('Barcode',$this->Barcode,true);
		$criteria->compare('Price',$this->Price);
		$criteria->compare('ExpireDate',$this->ExpireDate,true);
		$criteria->compare('MadeDate',$this->MadeDate,true);
		$criteria->compare('RecipeID',$this->RecipeID);
		$criteria->compare('Quantity',$this->Quantity);
		$criteria->compare('Frequency',$this->Frequency);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}