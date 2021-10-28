<?php

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\request\Requests;

/**
 * RequestSearch represents the model behind the search form of `backend\models\request\Requests`.
 */
class RequestSearch extends Requests
{
    public $service;
    public $client;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'service_id'], 'integer'],
            [['email', 'name','service','client'], 'safe'],
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
        $query = Requests::find();

        // add conditions that should always apply here
        $query->joinWith('service');
        $query->joinWith('client');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'email',
                    'name',
                    'service' => [
                        'asc' => ['services.name' => SORT_ASC],
                        'desc' => ['services.name' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'client' => [
                        'asc' => ['clients.passport' => SORT_ASC],
                        'desc' => ['clients.passport' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                ],
            ]
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
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'services.name', $this->service])
            ->andFilterWhere(['like', 'clients.passport', $this->client]);

        return $dataProvider;
    }
}
