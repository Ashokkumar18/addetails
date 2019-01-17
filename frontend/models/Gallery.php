<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $gallery_id
 * @property int $gallery_category_id
 * @property int $language_id
 * @property string $gallery_type
 * @property string $gallery_url
 * @property int $delete_flag
 * @property string $created_date
 * @property string $updated_date
 * @property int $gallery_order
 * @property string $gallery_image_title
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gallery_category_id', 'language_id', 'gallery_type', 'gallery_url', 'created_date', 'updated_date', 'gallery_image_title'], 'required'],
            [['gallery_category_id', 'language_id', 'delete_flag', 'gallery_order'], 'integer'],
            [['created_date', 'updated_date'], 'safe'],
            [['gallery_type'], 'string', 'max' => 100],
            [['gallery_url'], 'string', 'max' => 255],
            [['gallery_image_title'], 'string', 'max' => 600],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gallery_id' => 'Gallery ID',
            'gallery_category_id' => 'Gallery Category ID',
            'language_id' => 'Language ID',
            'gallery_type' => 'Gallery Type',
            'gallery_url' => 'Gallery Url',
            'delete_flag' => 'Delete Flag',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'gallery_order' => 'Gallery Order',
            'gallery_image_title' => 'Gallery Image Title',
        ];
    }
}
