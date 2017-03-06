<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\datamaster\Anime;

/**
 * CariAnime represents the model behind the search form about `common\models\datamaster\Anime`.
 */
class CariAnime extends Anime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ANIME_ID'], 'integer'],
            [['ANIME_TITLE', 'ANIME_PICT', 'EPISODE', 'PREMIRED', 'SYNOPSIS', 'DATE_CREATE'], 'safe'],
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
        $query = Anime::find();

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
            'ANIME_ID' => $this->ANIME_ID,
            'DATE_CREATE' => $this->DATE_CREATE,
        ]);

        $query->andFilterWhere(['like', 'ANIME_TITLE', $this->ANIME_TITLE])
            ->andFilterWhere(['like', 'ANIME_PICT', $this->ANIME_PICT])
            ->andFilterWhere(['like', 'EPISODE', $this->EPISODE])
            ->andFilterWhere(['like', 'PREMIRED', $this->PREMIRED])
            ->andFilterWhere(['like', 'SYNOPSIS', $this->SYNOPSIS]);

        return $dataProvider;
    }
}
