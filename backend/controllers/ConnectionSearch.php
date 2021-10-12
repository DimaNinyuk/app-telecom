<?php

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\connection\Connections;

/**
 * ConnectionSearch represents the model behind the search form of `backend\models\connection\Connections`.
 */
class ConnectionSearch extends Connections
{
    /**
     * {@inheritdoc}
     */
    public $connection_type;
    public $connection_status;
    public $tarif;
    public $client;
    public function rules()
    {
        return [
            [['id', 'personal_account', 'client_id', 'tarif_id', 'connection_status_id', 'connection_type_id'], 'integer'],
            [['register_date','connection_type','connection_status','tarif','client'], 'safe'],
            [['current_balance'], 'number'],
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
        $query = Connections::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'register_date',
                    'personal_account',
                    'current_balance',
                    'connection_type'=>[
                        'asc' => ['connection_types.name' => SORT_ASC],
                        'desc' => ['connection_types.name' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'connection_status'=>[
                        'asc' => ['connection_status.name' => SORT_ASC],
                        'desc' => ['connection_status.name' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'tarif'=>[
                        'asc' => ['tarifs.name' => SORT_ASC],
                        'desc' => ['tarifs.name' => SORT_DESC],
                        'default' => SORT_DESC
                    ],
                    'client'=>[
                        'asc' => ['clients.passport' => SORT_ASC],
                        'desc' => ['clients.passport' => SORT_DESC],
                        'default' => SORT_DESC
                    ]
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
            'register_date' => $this->register_date,
            'personal_account' => $this->personal_account,
            'current_balance' => $this->current_balance,
            'client_id' => $this->client_id,
            'tarif_id' => $this->tarif_id,
            'connection_status_id' => $this->connection_status_id,
            'connection_type_id' => $this->connection_type_id,
        ]);
        $query->joinWith('connectionType');
        $query->joinWith('connectionStatus');
        $query->joinWith('tarif');
        $query->joinWith('client');
        $query->andFilterWhere(['like', 'connection_types.name', $this->connection_type]);
        $query->andFilterWhere(['like', 'connection_status.name', $this->connection_status]);
        $query->andFilterWhere(['like', 'tarifs.name', $this->tarif]);
        $query->andFilterWhere(['like', 'clients.passport', $this->client]);

        return $dataProvider;
    }
}
