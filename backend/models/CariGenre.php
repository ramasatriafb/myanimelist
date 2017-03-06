<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\datamaster\Genre;

/**
 * CariGenre represents the model behind the search form about `common\models\datamaster\Genre`.
 */
class CariGenre extends Genre
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GENRE_ID'], 'integer'],
            [['GENRE'], 'safe'],
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
        $query = Genre::find();

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
            'GENRE_ID' => $this->GENRE_ID,
        ]);

        $query->andFilterWhere(['like', 'GENRE', $this->GENRE]);

        return $dataProvider;
    }
}
