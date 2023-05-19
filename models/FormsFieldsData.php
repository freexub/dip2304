<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "forms_fields_data".
 *
 * @property int $id
 * @property int $form_id
 * @property int $user_id
 * @property string $content
 * @property string $date_create
 * @property int $active
 *
 * @property FormsFields $field
 */
class FormsFieldsData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'forms_fields_data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['form_id', 'user_id', 'content'], 'required'],
            [['form_id', 'user_id', 'active'], 'integer'],
            [['content'], 'string'],
            [['date_create'], 'safe'],
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
            'field_id' => 'Field ID',
            'user_id' => 'User ID',
            'content' => 'Content',
            'date_create' => 'Date Create',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForms()
    {
        return $this->hasOne(Forms::className(), ['id' => 'form_id']);
    }

    public function getContentData()
    {
        return implode(', <br>',(array)json_decode($this->content));
    }
}
