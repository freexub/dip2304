<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rent".
 *
 * @property int $id
 * @property int $product_id
 * @property int $personal_id
 */
class Rent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'personal_id'], 'required'],
            [['product_id', 'personal_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'personal_id' => 'Personal ID',
            'date_add' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
