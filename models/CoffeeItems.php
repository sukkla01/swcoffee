<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coffee_items".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $price
 * @property string $detail
 * @property string $image
 * @property string $order_guide
 */
class CoffeeItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coffee_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price','order_guide','code','name','detail'],'required'],
            [['price'], 'integer'],
            [['order_guide'], 'string'],
            [['code'], 'string', 'max' => 10],
            [['name', 'image'], 'string', 'max' => 100],
            [['detail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'รหัสสินค้า',
            'name' => 'ชื่อสินค้า',
            'price' => 'ราคา',
            'detail' => 'รายละเอียดสินค้า',
            'image' => 'รูปภาพ',
            'order_guide' => 'สินค้าแนะนำ',
            
        ];
    }
}
