<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property int $id
 * @property int $user_id
 * @property int $gender
 * @property string $name
 * @property string $sername
 * @property string $patronymic
 * @property int $active
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[/*'user_id', */'firstname', 'lastname'], 'required'],
            [['user_id', 'active', 'gender'], 'integer'],
            [['firstname', 'lastname', 'patronymic'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'firstname' => 'Фамилия',
            'lastname' => 'Имя',
            'patronymic' => 'Отчество',
            'gender' => 'Пол',
            'active' => 'Active',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getAllForms()
    {
        return Forms::find()->where(['active'=>0])->all();
    }

}
