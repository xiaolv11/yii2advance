<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Auth;

/**
 * AuthSearch represents the model behind the search form of `frontend\models\Auth`.
 */
class AuthSearch extends Auth
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pid', 'is_nav', 'create_time', 'update_time', 'delete_time'], 'integer'],
            [['auth_name', 'auth_c', 'auth_a'], 'safe'],
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
        $query = Auth::find();

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
            'pid' => $this->pid,
            'is_nav' => $this->is_nav,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'delete_time' => $this->delete_time,
        ]);

        $query->andFilterWhere(['like', 'auth_name', $this->auth_name])
            ->andFilterWhere(['like', 'auth_c', $this->auth_c])
            ->andFilterWhere(['like', 'auth_a', $this->auth_a]);

        return $dataProvider;
    }
}
