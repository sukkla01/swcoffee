<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coffee_month".
 *
 * @property string $month_id
 * @property string $mname
 */
class CoffeeMonth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coffee_month';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['month_id', 'mname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'month_id' => 'Month ID',
            'mname' => 'Mname',
        ];
    }
}
