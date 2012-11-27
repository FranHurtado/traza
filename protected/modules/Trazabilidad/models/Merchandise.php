<?php

/**
 * This is the model class for table "Merchandise".
 *
 * The followings are the available columns in table 'Merchandise':
 * @property integer $ID
 * @property integer $UserID
 * @property integer $ProviderID
 * @property string $Date
 * @property integer $RawID
 * @property string $Document
 * @property string $State
 * @property string $Temperature
 * @property string $Conditions
 * @property string $Expiration
 * @property string $Comments
 *
 * The followings are the available model relations:
 * @property Raw $raw
 * @property User $user
 * @property Provider $provider
 */
class Merchandise extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Merchandise the static model class
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
		return 'Merchandise';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserID, ProviderID, Date', 'required'),
			array('UserID, ProviderID, RawID', 'numerical', 'integerOnly'=>true),
			array('Quantity, Type, Document', 'length', 'max'=>50),
			array('State, Temperature, Conditions', 'length', 'max'=>100),
			array('Expiration, Comments', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, UserID, ProviderID, Date, RawID, Document, State, Temperature, Conditions, Expiration, Comments', 'safe', 'on'=>'search'),
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
			'raw' => array(self::BELONGS_TO, 'Raw', 'RawID'),
			'user' => array(self::BELONGS_TO, 'User', 'UserID'),
			'provider' => array(self::BELONGS_TO, 'Provider', 'ProviderID'),
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
			'ProviderID' => 'Proveedor: ',
			'Date' => 'Fecha: ',
			'RawID' => 'Materia prima: ',
			'Document' => 'Lote / Albaran: ',
			'State' => 'Estado: ',
			'Temperature' => 'Temperatura: ',
			'Conditions' => 'Condiciones: ',
			'Expiration' => 'Caducidad: ',
			'Comments' => 'Comentarios: ',
			'Quantity' => 'Cantidad: ', 
			'Type' => 'Unidades',
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
		$criteria->compare('ProviderID',$this->ProviderID);
		$criteria->compare('Date',$this->Date,true);
		$criteria->compare('RawID',$this->RawID);
		$criteria->compare('Document',$this->Document,true);
		$criteria->compare('State',$this->State,true);
		$criteria->compare('Temperature',$this->Temperature,true);
		$criteria->compare('Conditions',$this->Conditions,true);
		$criteria->compare('Expiration',$this->Expiration,true);
		$criteria->compare('Comments',$this->Comments,true);
		$criteria->compare('Quantity',$this->Quantity,true);
		$criteria->compare('Type',$this->Type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}