<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $oder_id
 * @property int $item_id
 *
 * @property Order $oder
 * @property Item $item
 */
class order_item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['oder_id', 'item_id'], 'required'],
            [['oder_id', 'item_id'], 'integer'],
            [['oder_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['oder_id' => 'id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'oder_id' => 'Oder ID',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * Gets query for [[Oder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOder()
    {
        return $this->hasOne(Order::className(), ['id' => 'oder_id']);
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['id' => 'item_id']);
    }
}
