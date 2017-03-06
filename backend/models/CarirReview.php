<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\datamaster\Review;

/**
 * CarirReview represents the model behind the search form about `common\models\datamaster\Review`.
 */
class CarirReview extends Review
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'USER_ID', 'ANIME_ID'], 'integer'],
            [['REVIEW', 'DATE_REVIEW'], 'safe'],
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
        $query = Review::find();

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
            'DATE_REVIEW' => $this->DATE_REVIEW,
        ]);

        $query->andFilterWhere(['like', 'REVIEW', $this->REVIEW]);

        return $dataProvider;
    }
}
