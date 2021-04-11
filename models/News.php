<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $text
 * @property string|null $image
 * @property int|null $similar_id
 * @property int|null $city_id
 * @property int|null $is_favourite
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'text'], 'string'],
            [['similar_id', 'city_id', 'is_favourite'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'text' => 'Text',
            'image' => 'Image',
            'similar_id' => 'Similar ID',
            'city_id' => 'City ID',
            'is_favourite' => 'Is Favourite',
        ];
    }
}
