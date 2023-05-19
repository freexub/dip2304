<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forms".
 *
 * @property int $id
 * @property string $name
 * @property int $active
 *
 * @property FormsFields[] $formsFields
 */
class Forms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormsFields()
    {
        return $this->hasMany(FormsFields::className(), ['form_id' => 'id']);
    }
}
