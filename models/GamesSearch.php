<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Games;

/**
 * GamesSearch represents the model behind the search form of `app\models\Games`.
 */
class GamesSearch extends Games
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['namegames', 'namegamesdop', 'stampgames', 'globalimag', 'content', 'url_dowload', 'tehnik_trebov', 'date_exit', 'date_add', 'date_up'], 'safe'],
            [['rating'], 'number'],
            [['global', 'popular', 'central'], 'boolean'],
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
        $query = Games::find();

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
            'id' => $this->id,
            'rating' => $this->rating,
            'global' => $this->global,
            'popular' => $this->popular,
            'central' => $this->central,
            'date_exit' => $this->date_exit,
            'date_add' => $this->date_add,
            'date_up' => $this->date_up,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'namegames', $this->namegames])
            ->andFilterWhere(['like', 'namegamesdop', $this->namegamesdop])
            ->andFilterWhere(['like', 'stampgames', $this->stampgames])
            ->andFilterWhere(['like', 'globalimag', $this->globalimag])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'url_dowload', $this->url_dowload])
            ->andFilterWhere(['like', 'tehnik_trebov', $this->tehnik_trebov]);

        return $dataProvider;
    }
}
