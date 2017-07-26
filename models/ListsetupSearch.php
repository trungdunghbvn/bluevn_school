<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ListSetup;

/**
 * ListsetupSearch represents the model behind the search form about `app\models\ListSetup`.
 */
class ListsetupSearch extends ListSetup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['list_id', 'list_parent'], 'integer'],
            [['list_name', 'list_value', 'list_description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = ListSetup::find();

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
            'list_id' => $this->list_id,
            'list_parent' => $this->list_parent,
        ]);

        $query->andFilterWhere(['like', 'list_name', $this->list_name])
            ->andFilterWhere(['like', 'list_value', $this->list_value])
            ->andFilterWhere(['like', 'list_description', $this->list_description]);

        return $dataProvider;
    }
}
