<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Gallery;

/**
 * GallerySearch represents the model behind the search form of `app\models\Gallery`.
 */
class GallerySearch extends Gallery
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gallery_id', 'gallery_category_id', 'language_id', 'delete_flag', 'gallery_order'], 'integer'],
            [['gallery_type', 'gallery_url', 'created_date', 'updated_date', 'gallery_image_title'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Gallery::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'gallery_id' => $this->gallery_id,
            'gallery_category_id' => $this->gallery_category_id,
            'language_id' => $this->language_id,
            'delete_flag' => $this->delete_flag,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
            'gallery_order' => $this->gallery_order,
        ]);

        $query->andFilterWhere(['like', 'gallery_type', $this->gallery_type])
            ->andFilterWhere(['like', 'gallery_url', $this->gallery_url])
            ->andFilterWhere(['like', 'gallery_image_title', $this->gallery_image_title]);

        return $dataProvider;
    }
}
