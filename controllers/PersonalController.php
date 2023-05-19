<?php

namespace app\controllers;

use app\models\FormsFieldsData;
use app\models\FormsFieldsDataSearch;
use app\models\Rent;
use Yii;
use app\models\Personal;
use app\models\PersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Personal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
//        $user_id = Yii::$app->user->identity->id;
//        $person = Personal::find()->where(['user_id'=>$user_id])->one();
//        var_dump($id);die();
//        if($id !== $person->id and !Yii::$app->user->can('accessPersonal'))
//        {
//            $id = $person->id;
//        }
//        $person = Personal::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
//        $dataProvider = new ActiveDataProvider([
//            'query' => Rent::find()->where(['personal_id'=>$id]),
//            'pagination' => [
//                'pageSize' => 20,
//            ],
//        ]);
        $modelData = new FormsFieldsData();
        $searchModel = new FormsFieldsDataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['user_id'=>$id]);

        if (Yii::$app->request->post()){
            $modelData->form_id = $_POST['form_id'];
            $modelData->content = json_encode($_POST['Field']);
            $modelData->user_id = $id;
            if ($modelData->save()){
                Yii::$app->session->setFlash('success', "Успешно добавлен!");
                return $this->redirect(Yii::$app->request->referrer);
            }else{
                Yii::$app->session->setFlash('warning', "Ошибка! Попробуйте позже");
                return $this->redirect(Yii::$app->request->referrer);
            }


            var_dump($_POST['Field']);die();
        }

        return $this->render('view', [
            'modelData' => $modelData,
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Personal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
