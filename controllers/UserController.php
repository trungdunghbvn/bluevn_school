<?php

namespace app\controllers;
use Yii;
use app\models\User;
use app\models\UserSearch;
use app\models\Shools;
use app\models\UserSchool;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                        'actions' => ['view', 'index','create','update','create','customer','create-shool','reset-password-user'],
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $modelshool = new Shools();
        $dataShool =ArrayHelper::map($modelshool->getAllShool(),'school_id','school_name');
//        print_r(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $files = \yii\web\UploadedFile::getInstance($model, 'images_url');
            if($files){
                $file_name = $files->baseName.date('i') . '.' . $files->extension;
                $model->images_name = $files->baseName;
                $model->images_url = $file_name;
            }
            $model->setPassword($model->password_hash);
            $model->generateAuthKey();
            $model->parent_id = Yii::$app->user->id;
            if($model->save()){
                if($files)
                    $files->saveAs(Yii::getAlias('@webroot').'/uploads/' . $file_name);
                return $this->redirect(['customer']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelshool' => $modelshool,
                'dataShool'=> $dataShool,
            ]);
        }
    }

    public function actionCreateShool()
    {
        $model = new User();
        $modelshool = new Shools();
        $modelusershool = new UserSchool();
        $dataShool =ArrayHelper::map($modelshool->getAllShool(),'school_id','school_name');
//        print_r(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $files = \yii\web\UploadedFile::getInstance($model, 'images_url');
            if($files){
                $file_name = $files->baseName.date('i') . '.' . $files->extension;
                $model->images_name = $files->baseName;
                $model->images_url = $file_name;
            }
            $model->setPassword($model->password_hash);
            $model->generateAuthKey();
            $model->parent_id = Yii::$app->user->id;
            $modelshool->load(Yii::$app->request->post());
            $data = $modelshool->school_name;
            if($model->save()){
                $modelusershool->school_id = $data;
                $modelusershool->user_id = $model->id;
                $modelusershool->user_school_role = $model->role;
                $modelusershool->save();
                if($files){
                    $files->saveAs(Yii::getAlias('@webroot').'/uploads/' . $file_name);
                }
                
                return $this->redirect(['/user-school/index']);
            }
        } else {
            return $this->render('_form_admin_school', [
                'model' => $model,
                'modelshool' => $modelshool,
                'dataShool'=> $dataShool,
            ]);
        }
    }
    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $images_old = $model->images_url;
        if ($model->load(Yii::$app->request->post())) {
            $model->images_url = $images_old;
            $files = \yii\web\UploadedFile::getInstance($model, 'images_url');
            if($files){
                $file_name = $files->baseName.date('i') . '.' . $files->extension;
                $model->images_name = $files->baseName;
                $model->images_url = $file_name;
            }
            if($model->save()){
                if($files)
                    $files->saveAs(Yii::getAlias('@webroot').'/../../uploads/' . $file_name);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * Reset Password
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionResetPasswordUser($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->resetPassword()) {
            return $this->redirect(['view','id'=>$model->id]);
        } else {
            return $this->render('_reset_password', [
                'model' => $model,
            ]);
        }
    } 
    
    /**
     * Lists all customer.
     * @return mixed
     */
    public function actionCustomer()
    {
        $searchModel = new UserSearch();
        $searchModel->parent_id = Yii::$app->user->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('customer', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
