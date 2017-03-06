<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\datamaster\Member;

/**
 * CariMember represents the model behind the search form about `common\models\datamaster\Member`.
 */
class CariMember extends Member
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MEMBER_ID', 'USER_ID'], 'integer'],
            [['MEMBER_NAMA', 'DATE_JOIN'], 'safe'],
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
        $query = Member::find();

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
            'MEMBER_ID' => $this->MEMBER_ID,
            'USER_ID' => $this->USER_ID,
            'DATE_JOIN' => $this->DATE_JOIN,
        ]);

        $query->andFilterWhere(['like', 'MEMBER_NAMA', $this->MEMBER_NAMA]);

        return $dataProvider;
    }
}
