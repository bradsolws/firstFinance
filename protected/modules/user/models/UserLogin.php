<?php

/**
 * This is the model class for table "user_login".
 *
 * The followings are the available columns in table 'user_login':
 * @property string $user_id
 * @property string $username
 * @property string $password
 * @property string $password_key
 * @property string $last_login
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserLogin extends CActiveRecord {
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName() {
		return Yii::app ()->getModule ( 'user' )->tableUserLogin;
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array (
				array (
						'username,password',
						'required' 
				),
				array (
						'username',
						'length',
						'max' => 20,
						'min' => 6,
						'message' => UserModule::t ( "Incorrect username (length between 6 and 20 characters)." ) 
				),
				array (
						'username',
						'unique',
						'message' => UserModule::t ( "This username already exists." ) 
				),
				array (
						'password',
						'length',
						'max' => 128,
						'min' => 8,
						'message' => UserModule::t ( "Incorrect password (minimal length 8 characters)." ) 
				),
				array (
						'username',
						'match',
						'pattern' => '/^[A-Za-z0-9_]+$/u',
						'message' => UserModule::t ( "Incorrect symbols (A-z0-9)." ) 
				),
				array (
						'user_id',
						'length',
						'max' => 11 
				),
				array (
						'password_key',
						'length',
						'max' => 25 
				),
				array (
						'last_login',
						'safe' 
				) 
		);
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array (
				'user' => array (
						self::BELONGS_TO,
						'User',
						'user_id' 
				) 
		);
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array (
				'user_id' => 'User',
				'username' => 'Username',
				'password' => 'Password',
				'password_key' => 'Password Key',
				'last_login' => 'Last Visit' 
		);
	}
	public function scopes() {
		return array (
				'notsafe' => array (
						'select' => 'user_id, username, password, password_key, last_login' 
				) 
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
	 *         based on the search/filter conditions.
	 */
	public function search() {
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria ();
		
		$criteria->compare ( 'user_id', $this->user_id, true );
		$criteria->compare ( 'username', $this->username, true );
		$criteria->compare ( 'password', $this->password, true );
		$criteria->compare ( 'password_key', $this->password_key, true );
		$criteria->compare ( 'last_login', $this->last_login, true );
		
		return new CActiveDataProvider ( $this, array (
				'criteria' => $criteria 
		) );
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * 
	 * @param string $className
	 *        	active record class name.
	 * @return UserLogin the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model ( $className );
	}
}
