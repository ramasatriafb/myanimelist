<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\datamaster\User;

/**
 * CariUser represents the model behind the search form about `common\models\datamaster\User`.
 */
class CariUser extends User
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ROLE_ID', 'USER_AKTIF'], 'integer'],
            [['USER_NAMA', 'USER_PASSWORD', 'USER_EMAIL', 'USER_AVATAR'], 'safe'],
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
        $query = User::find();

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
            'USER_ID' => $this->USER_ID,
            'ROLE_ID' => $this->ROLE_ID,
            'USER_AKTIF' => $this->USER_AKTIF,
        ]);

        $query->andFilterWhere(['like', 'USER_NAMA', $this->USER_NAMA])
            ->andFilterWhere(['like', 'USER_PASSWORD', $this->USER_PASSWORD])
            ->andFilterWhere(['like', 'USER_EMAIL', $this->USER_EMAIL])
            ->andFilterWhere(['like', 'USER_AVATAR', $this->USER_AVATAR]);

        return $dataProvider;
    }
}
