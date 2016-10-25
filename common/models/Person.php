<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property integer $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $photo
 * @property string $address
 * @property string $tel
 * @property integer $department_id
 * @property string $office_id
 * @property string $email
 * @property string $facebook
 * @property string $created_at
 * @property string $status
 *
 * @property User $user
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'firstname', 'lastname', 'department_id', 'office_id', 'created_at'], 'required'],
            [['user_id', 'department_id'], 'integer'],
            [['address', 'status'], 'string'],
            [['created_at'], 'safe'],
            [['firstname', 'lastname', 'photo', 'email', 'facebook'], 'string', 'max' => 100],
            [['tel'], 'string', 'max' => 45],
            [['office_id'], 'string', 'max' => 5],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'photo' => 'รูปภาพ',
            'address' => 'ที่อยู่',
            'tel' => 'เบอร์โทร',
            'department_id' => 'ฝ่าย',
            'office_id' => 'สถานบริการ',
            'email' => 'อีเมลล์',
            'facebook' => 'Facebook',
            'created_at' => 'วันที่เข้าระบบ',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
