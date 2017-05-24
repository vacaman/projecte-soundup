<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Arxiusso;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

     
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionPere(){
 
        return $this->render('pere');
    }
    
    public function actionAlbum(){
        $fileName = 'file';
        $uploadPath = 'so';
        
        if (isset($_FILES[$fileName])) {
            $file = \yii\web\UploadedFile::getInstanceByName($fileName);
            $nomArxiu = $file->name;
            $usuari = Yii::$app->user->identity->username;  // Nom d'usuari
            $carpetaUsuari = $uploadPath . '/' ;            // carpeta de sons usuari
            
            // Si l'usuari no està loguejat, canvia la variabe a anònim
            if (empty($usuari)){
                $usuari = "anonim";
            }
            
            // Si no existeix la carpeta amb el nom d'usuari la crea
            if (!file_exists($carpetaUsuari.$usuari)) {
                mkdir( $carpetaUsuari . $usuari, 0700);
            }
            
            
            // Si l'arxiu SI existeix del mateix usuari, li canvia el nom
            if (file_exists($carpetaUsuari.$usuari. '/' . $nomArxiu)) {
                $nomArxiu = rand().$nomArxiu;
            }
            
            // Puja l'arxiu si pot
            if ($file->saveas($uploadPath . '/' . $usuari . '/' . $nomArxiu)) {
                
                echo \yii\helpers\Json::encode($file);
                
                
                // Guarda les dades de larxiu a la bbdd
                $model = new Arxiusso();
                $model->arxiu_nom = $nomArxiu;
                $model->arxiu_path = $uploadPath . '/' . $usuari . '/' . $nomArxiu;
                $model->arxiu_tags = "";
                $model->user_id=  Yii::$app->user->getId();
                $model->save();
                
            }
            
            
        }else{
            $provider = (new \yii\db\Query())
            ->from('arxius_so')
            ->where(['user_id' => Yii::$app->user->getId()])
            ->indexBy('arxiu_id')
            ->all();
            
            return $this->render('album', [
            'provider' => $provider,

            
            
        ]);
            
        }
        
        return false;
    }
    
    public function actionAdmin(){
        
        // Deixa entrar a la pàgina d'admin si està loguejat com admin
        if (Yii::$app->user->identity->isAdmin){
        return $this->render('admin');
        } 
        
        // en cas contrari retorna al inici
        return $this->goHome();
    }
    
    
    /*
    public function actionAvatar(){
        
        $model = new Profile();
        $fileName = 'gravatar_email';
        $uploadPath = 'img/img_perfil';
        
        if (isset($_FILES[$fileName])) {
            $model ->gravatar_email = UploadedFile::getInstance($model,'gravatar_email');
            $model->gravatar_email->saveas($uploadPath.'/'.$fileName.'.'.$model->gravatar_email->extension);
            $usuari = Yii::$app->user->identity->username;
            if ($usuari->load(Yii::$app->request->post())){
                mkdir($uploadPath . '/' . $usuari, 0700);
                
                if ($file->saveas($uploadPath . '/' . $usuari . '/' . $file->name)) {
                    
                    echo \yii\helpers\Json::encode($file);
            }
                
            }
        }else{
            return $this->render('upload');
        }
        
        return false;
    }*/
    

    
    
}

    /*
    public function actionPerfil(){
        return $this->render('perfil');
    }*/


