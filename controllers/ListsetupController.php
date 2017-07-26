<?php

namespace app\controllers;

use Yii;
use app\models\ListSetup;
use app\models\ListsetupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ListsetupController implements the CRUD actions for ListSetup model.
 */
class ListsetupController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['item', 'index','view','create','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ListSetup models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListsetupSearch();
        $listSearch = Yii::$app->request->queryParams;
        $listSearch['ListsetupSearch']['list_parent'] = 0;
        $dataProvider = $searchModel->search($listSearch);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Lists all ListSetup models.
     * @return mixed
     */
    public function actionItem($parent_id)
    {
        $searchModel = new ListsetupSearch();
        $listSearch = Yii::$app->request->queryParams;
        $listSearch['ListsetupSearch']['list_parent'] = $parent_id;        
        $dataProvider = $searchModel->search($listSearch);
        $parent = ListSetup::findOne($parent_id);
        return $this->render('list_item', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'parent'=>$parent
        ]);
    }


    /**
     * Displays a single ListSetup model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ListSetup model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ListSetup();

        if ($model->load(Yii::$app->request->post())) {
            if($model->save())
                echo "success";
            else
                echo "fail";
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ListSetup model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->list_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ListSetup model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ListSetup model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ListSetup the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ListSetup::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
