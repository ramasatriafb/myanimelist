<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\MempunyaiRating;

/**
 * CariMempunyaiRating represents the model behind the search form about `common\models\data\MempunyaiRating`.
 */
class CariMempunyaiRating extends MempunyaiRating
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'USER_ID', 'ANIME_ID'], 'integer'],
            [['RATING'], 'safe'],
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
        $query = MempunyaiRating::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'ID' => $this->ID,
            'USER_ID' => $this->USER_ID,
            'ANIME_ID' => $this->ANIME_ID,
        ]);

        $query->andFilterWhere(['like', 'RATING', $this->RATING]);

        return $dataProvider;
    }
}
