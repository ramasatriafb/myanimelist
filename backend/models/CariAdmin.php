<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\datamaster\Admin;

/**
 * CariAdmin represents the model behind the search form about `common\models\datamaster\Admin`.
 */
class CariAdmin extends Admin
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADMIN_ID', 'USER_ID'], 'integer'],
            [['NAMA', 'DATE_JOIN'], 'safe'],
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
        $query = Admin::find();

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
            'ADMIN_ID' => $this->ADMIN_ID,
            'USER_ID' => $this->USER_ID,
            'DATE_JOIN' => $this->DATE_JOIN,
        ]);

        $query->andFilterWhere(['like', 'NAMA', $this->NAMA]);

        return $dataProvider;
    }
}
