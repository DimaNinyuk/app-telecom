<?php

namespace backend\controllers;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\history\BalanceHistory;

/**
 * BalanceHistorySearch represents the model behind the search form of `backend\models\history\BalanceHistory`.
 */
class BalanceHistorySearch extends BalanceHistory
{
    /**
     * {@inheritdoc}
     */
    public $operation_type;
    public function rules()
    {
        return [
            [['id', 'connection_id', 'operation_type_id'], 'integer'],
            [['value'], 'number'],
            [['date', 'comment','operation_type'], 'safe'],
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
        $query = BalanceHistory::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'value',
                    'date',
                    'connection_id',
                    'comment',
                    'operation_type'=>[
                        'asc' => ['operation_types.name' => SORT_ASC],
                        'desc' => ['operation_types.name' => SORT_DESC],
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
        if(\Yii::$app->request->get('history_connect_id')){
            $query->andWhere(['connection_id'=>\Yii::$app->request->get('history_connect_id')]);
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'value' => $this->value,
            'date' => $this->date,
            'connection_id' => $this->connection_id,
            'operation_type_id' => $this->operation_type_id,
        ]);
        $query->joinWith('operationType');
        $query->andFilterWhere(['like', 'comment', $this->comment]);
        $query->andFilterWhere(['like', 'operation_types.name', $this->operation_type]);

        return $dataProvider;
    }
}
