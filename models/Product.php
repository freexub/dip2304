<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property string $img
 * @property int $number
 * @property int $price
 * @property int $period
 * @property int $active
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'number', 'price', 'period'], 'required'],
            [['img'], 'required', 'on' => 'update'],
            [['category_id', 'price', 'period', 'count', 'active'], 'integer'],
            [['name'], 'string', 'max' => 500],
            [['number'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['img'], 'file', 'extensions' => 'pdf, gif, png, jpg, jpeg', 'maxSize'=> 1024 * 1024 * 2],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'category_id' => 'Категория',
            'img' => 'Картинка',
            'number' => 'Инв. номер',
            'count' => 'Кол-во на складе',
            'price' => 'Цена',
            'period' => 'Период амортизации',
            'active' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getCategoryList()
    {
        $parent  = Category::find()->where(['active'=>0, 'parent_id'=> NULL])->all();
        return $parent;
    }
}
