<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "addetails".
 *
 * @property int $id
 * @property string $category_id
 * @property string $title
 * @property string $description
 * @property string $amount
 * @property string $seller_name
 * @property string $seller_email
 * @property string $seller_phone_number
 * @property string $location
 * @property string $address
 * @property int $active_flag
 * @property int $is_accept
 * @property string $created_date
 * @property string $updated_date
 */
class Addetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'addetails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['active_flag', 'is_accept'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['category_id', 'title', 'seller_name', 'seller_email', 'seller_phone_number', 'location', 'address'], 'string', 'max' => 255],
            [['amount'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'amount' => 'Amount',
            'seller_name' => 'Seller Name',
            'seller_email' => 'Seller Email',
            'seller_phone_number' => 'Seller Phone Number',
            'location' => 'Location',
            'address' => 'Address',
            'active_flag' => 'Active Flag',
            'is_accept' => 'Is Accept',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
        ];
    }
}
