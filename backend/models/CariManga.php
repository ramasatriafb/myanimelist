<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\datamaster\Manga;

/**
 * CariManga represents the model behind the search form about `common\models\datamaster\Manga`.
 */
class CariManga extends Manga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MANGA_ID', 'MANGA_EKSEMPLAR', 'MANGA_GENRE'], 'integer'],
            [['MANGA_JUDUL', 'MANGA_GAMBAR', 'MANGA_PENGARANG', 'MANGA_PENERBIT'], 'safe'],
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
        $query = Manga::find();

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
            'MANGA_ID' => $this->MANGA_ID,
            'MANGA_EKSEMPLAR' => $this->MANGA_EKSEMPLAR,
            'MANGA_GENRE' => $this->MANGA_GENRE,
        ]);

        $query->andFilterWhere(['like', 'MANGA_JUDUL', $this->MANGA_JUDUL])
            ->andFilterWhere(['like', 'MANGA_GAMBAR', $this->MANGA_GAMBAR])
            ->andFilterWhere(['like', 'MANGA_PENGARANG', $this->MANGA_PENGARANG])
            ->andFilterWhere(['like', 'MANGA_PENERBIT', $this->MANGA_PENERBIT]);

        return $dataProvider;
    }
}
