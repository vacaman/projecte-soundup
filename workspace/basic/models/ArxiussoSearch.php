<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Arxiusso;

/**
 * ArxiussoSearch represents the model behind the search form about `app\models\Arxiusso`.
 */
class ArxiussoSearch extends Arxiusso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['arxiu_id', 'user_id'], 'integer'],
            [['arxiu_nom', 'arxiu_path', 'arxiu_tags'], 'safe'],
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
        $query = Arxiusso::find();

        // add conditions that should always apply here
        
        // aquest filtre comprova que només mostri les coses que pertanyin al usuari connectat
        
        $idusuari = Yii::$app->user->getId();
        $query->andFilterWhere(['like', 'user_id', $idusuari]);
       

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
            'arxiu_id' => $this->arxiu_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'arxiu_nom', $this->arxiu_nom])
            ->andFilterWhere(['like', 'arxiu_path', $this->arxiu_path])
            ->andFilterWhere(['like', 'arxiu_tags', $this->arxiu_tags]);

        return $dataProvider;
    }
    
    /**
     * Crea un proveidor de dades sense cap filtre aplicat
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchGlobal($params)
    {
        $query = Arxiusso::find();

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
            'arxiu_id' => $this->arxiu_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'arxiu_nom', $this->arxiu_nom])
            ->andFilterWhere(['like', 'arxiu_path', $this->arxiu_path])
            ->andFilterWhere(['like', 'arxiu_tags', $this->arxiu_tags]);

        return $dataProvider;
    }
}
