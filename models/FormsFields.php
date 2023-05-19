<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forms_fields".
 *
 * @property int $id
 * @property int $form_id
 * @property string $name
 * @property string $type
 * @property int $active
 *
 * @property Forms $form
 * @property FormsFieldsData[] $formsFieldsDatas
 */
class FormsFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form_id', 'name'], 'required'],
            [['form_id', 'active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 20],
            [['form_id'], 'exist', 'skipOnError' => true, 'targetClass' => Forms::className(), 'targetAttribute' => ['form_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'form_id' => 'Form ID',
            'name' => 'Название поля',
            'type' => 'Тип поля',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForm()
    {
        return $this->hasOne(Forms::className(), ['id' => 'form_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormsFieldsDatas()
    {
        return $this->hasMany(FormsFieldsData::className(), ['field_id' => 'id']);
    }
}
