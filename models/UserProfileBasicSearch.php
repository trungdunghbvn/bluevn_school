<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserProfileBasic;

/**
 * UserProfileBasicSearch represents the model behind the search form about `app\models\UserProfileBasic`.
 */
class UserProfileBasicSearch extends UserProfileBasic
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_basic_id', 'user_id', 'profile_basic_gender', 'profile_basic_birthplace'], 'integer'],
            [['profile_basic_code', 'profile_basic_email', 'profile_basic_images', 'profile_basic_birthday', 'profile_basic_identity_card', 'profile_basic_address', 'profile_basic_phone', 'profile_basic_ethnic'], 'safe'],
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
        $query = UserProfileBasic::find();

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
            'profile_basic_id' => $this->profile_basic_id,
            'user_id' => $this->user_id,
            'profile_basic_gender' => $this->profile_basic_gender,
            'profile_basic_birthday' => $this->profile_basic_birthday,
            'profile_basic_birthplace' => $this->profile_basic_birthplace,
        ]);

        $query->andFilterWhere(['like', 'profile_basic_code', $this->profile_basic_code])
            ->andFilterWhere(['like', 'profile_basic_email', $this->profile_basic_email])
            ->andFilterWhere(['like', 'profile_basic_images', $this->profile_basic_images])
            ->andFilterWhere(['like', 'profile_basic_identity_card', $this->profile_basic_identity_card])
            ->andFilterWhere(['like', 'profile_basic_address', $this->profile_basic_address])
            ->andFilterWhere(['like', 'profile_basic_phone', $this->profile_basic_phone])
            ->andFilterWhere(['like', 'profile_basic_ethnic', $this->profile_basic_ethnic]);

        return $dataProvider;
    }
}
