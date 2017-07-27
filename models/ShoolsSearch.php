<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shools;

/**
 * ShoolsSearch represents the model behind the search form about `app\models\Shools`.
 */
class ShoolsSearch extends Shools
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['school_id', 'user_id', 'school_status'], 'integer'],
            [['school_name', 'school_address', 'school_phone', 'school_fax', 'school_email'], 'safe'],
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
        $query = Shools::find();

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
            'school_id' => $this->school_id,
            'user_id' => $this->user_id,
            'school_status' => $this->school_status,
        ]);

        $query->andFilterWhere(['like', 'school_name', $this->school_name])
            ->andFilterWhere(['like', 'school_address', $this->school_address])
            ->andFilterWhere(['like', 'school_phone', $this->school_phone])
            ->andFilterWhere(['like', 'school_fax', $this->school_fax])
            ->andFilterWhere(['like', 'school_email', $this->school_email]);

        return $dataProvider;
    }
}
