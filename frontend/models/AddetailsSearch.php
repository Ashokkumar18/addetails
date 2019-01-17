<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Addetails;

/**
 * AddetailsSearch represents the model behind the search form of `app\models\Addetails`.
 */
class AddetailsSearch extends Addetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active_flag', 'is_accept'], 'integer'],
            [['category_id', 'title', 'description', 'amount', 'seller_name', 'seller_email', 'seller_phone_number', 'location', 'address', 'created_date', 'updated_date'], 'safe'],
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
        $query = Addetails::find();

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
            'id' => $this->id,
            'active_flag' => $this->active_flag,
            'is_accept' => $this->is_accept,
            'created_date' => $this->created_date,
            'updated_date' => $this->updated_date,
        ]);

        $query->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'amount', $this->amount])
            ->andFilterWhere(['like', 'seller_name', $this->seller_name])
            ->andFilterWhere(['like', 'seller_email', $this->seller_email])
            ->andFilterWhere(['like', 'seller_phone_number', $this->seller_phone_number])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
