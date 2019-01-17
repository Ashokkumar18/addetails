<?php

namespace frontend\controllers;

use Yii;
use app\models\Addetails;
use app\models\AddetailsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddetailsController implements the CRUD actions for Addetails model.
 */
class AddetailsController extends Controller
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
     * Lists all Addetails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AddetailsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Addetails model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Addetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Addetails();

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/

        //$model           = new Gallery();
       // $gallerycategory = new GalleryCategory();

        if ($model->load(Yii::$app->request->post())) {

            //$model->category_name = $_POST['Gallery']['gallery_title'];
            $model->created_date  = date("Y-m-d h:i:s");
            $model->save(false);        
            $title_id                       = $model->id;           
            $path                           = Yii::getAlias('@frontend') .'/web/images/gallery/';
            if(chmod($path, 0545)) { chmod($path, 0745); }

                   // print_r(count($_FILES["gallery_url"]['name']));
                    for($i=0;$i<count($_FILES["gallery_url"]['name']); $i++)
                    {
                     if($_FILES["gallery_url"]['name'][$i]!='')
                     {
                        $fileName    = str_replace(" ", "-", $_FILES["gallery_url"]['name'][$i]);
                        $file        = date('d-m-Y-h-i-s')."_".basename($fileName); 
                        $target_file = $_FILES['gallery_url']["tmp_name"][$i];
                        $gallery_image_title = $_POST['gallery_image_title'][$i];


                        $gallery     = new Gallery();
                            // UPLOAD FILE 
                        if (move_uploaded_file($target_file, $path.$file)) {
                             $gallery->gallery_url         = $file;
                             $gallery->gallery_category_id = $title_id;
                             $gallery->gallery_order       = $i+1;
                             $gallery->gallery_image_title = $gallery_image_title;
                             $gallery->save(false);
                             //$file_name                    =  $file;    
                        }
                     }   
                    }
            return $this->redirect(['addetails/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Addetails model.
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
     * Deletes an existing Addetails model.
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
     * Finds the Addetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Addetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Addetails::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
