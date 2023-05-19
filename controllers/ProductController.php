<?php

namespace app\controllers;

use app\models\Personal;
use app\models\Rent;
use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use PHPExcel;
use PHPExcel_Writer_Excel5;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
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
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        if ($model->load(Yii::$app->request->post())) {
            if(!empty($_FILES['Product']['name']['img'])) {
                $member_id = Yii::$app->user->identity->id;
                $d =  new \DateTime('now', new \DateTimeZone('+0600'));
                $model->img = UploadedFile::getInstance($model, 'img');
                $file_name = $d->format('m-d-Y_H-i-s').'_'.$member_id;
                $file_extension = $model->img->extension;
                $dir_name = $_SERVER['DOCUMENT_ROOT'].'/web/uploads/img/';
                #var_dump($_FILES);die();
                if ($model->img->saveAs($dir_name.$file_name.'.'.$file_extension)){
                    $model->img = $file_name.'.'.$file_extension;
                    $model->save(false);
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }else{
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img = $model->img;
            if ($model->load(Yii::$app->request->post())) {
                if(!empty($_FILES['Product']['name']['img'])) {
                    $member_id = Yii::$app->user->identity->id;
                    $d =  new \DateTime('now', new \DateTimeZone('+0600'));
                    $model->img = UploadedFile::getInstance($model, 'img');
                    $file_name = $d->format('m-d-Y_H-i-s').'_'.$member_id;
                    $file_extension = $model->img->extension;
                    $dir_name = $_SERVER['DOCUMENT_ROOT'].'/web/uploads/img/';
                    #var_dump($_FILES);die();
                    if ($model->img->saveAs($dir_name.$file_name.'.'.$file_extension)){
                        $model->img = $file_name.'.'.$file_extension;
                        $model->save(false);
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }else{
                    $model->img = $img;
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }

            }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionTake($id)
    {
        $model = $this->findModel($id);
        $person = Personal::find()->where(['user_id'=>Yii::$app->user->identity->id])->one();
        if($model->count > 0){
            $model->count = $model->count -1;
            if($model->save()){
                $rent = new Rent();
                $rent->product_id = (int)$model->id;
                $rent->personal_id = (int)$person->id;
                $rent->save();
                return $this->redirect(['index']);
            }

        } else {

        }
    }

    public function actionReturn($id,$pid)
    {
        $model = $this->findModel($id);

        $user_id = Yii::$app->user->identity->id;
        $person = Personal::find()->where(['user_id'=>$user_id])->one();

        if($pid !== $person->id and !Yii::$app->user->can('accessPersonal'))
        {
            $id = $person->id;
        }

        #$person = Personal::find()->where(['user_id'=>$user_id])->one();

        $rent = Rent::find()->where(['personal_id'=>$pid, 'product_id'=>$id])->one();
        #var_dump($rent);die();
        if(count($rent)>0){
            $model->count = $model->count +1;
            if($model->save()){
                $rent->delete();
                return $this->redirect(['personal/view?id='.$pid]);
            }
        }

    }

    public function actionItog()
    {
        $user_id = \Yii::$app->user->identity->id;

        $xls = new PHPExcel();                              // Создаем объект класса PHPExcel
        $xls->setActiveSheetIndex(0);               // Устанавливаем индекс активного листа
        $sheet = $xls->getActiveSheet();                    // Получаем активный лист
        $sheet->setTitle('Отчёт');  // Подписываем лист

        $sheet->getStyle("B2:G2")->applyFromArray(
            array(
                'borders' => array(
                    'allborders' => array(
                        'style' => \PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('rgb' => '000000')
                    )
                ),
                'alignment' => array(
                    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PHPExcel_Style_Alignment::VERTICAL_CENTER,
                )
            )
        );

        // формируем первые ячейки (заголовки)
        $sheet->setCellValueByColumnAndRow(1, 2, '№');
        $sheet->setCellValueByColumnAndRow(2, 2, 'Инв. номер');
        $sheet->setCellValueByColumnAndRow(3, 2, 'Название');
        $sheet->setCellValueByColumnAndRow(4, 2, 'Цена');
        $sheet->setCellValueByColumnAndRow(5, 2, 'Период носки');
        $sheet->setCellValueByColumnAndRow(6, 2, 'Кол-во');
        $sheet->getColumnDimension('D')->setWidth(42);
        $sheet->getColumnDimension('F')->setWidth(13);
        $sheet->getColumnDimension('C')->setWidth(11);
        //------------------------------------

        $products = Product::find()->all();
        #var_dump($products[0]);die();
        for($i=0;count($products) > $i; $i++){
            $sheet->setCellValueByColumnAndRow(1, ($i+3), ($i+1));
            $sheet->setCellValueByColumnAndRow(2, ($i+3), $products[$i]->number);
            $sheet->setCellValueByColumnAndRow(3, ($i+3), $products[$i]->name);
            $sheet->setCellValueByColumnAndRow(4, ($i+3), $products[$i]->price);
            $sheet->setCellValueByColumnAndRow(5, ($i+3), $products[$i]->period);
            $sheet->setCellValueByColumnAndRow(6, ($i+3), $products[$i]->count);
        }

        $objWriter = new PHPExcel_Writer_Excel5($xls);
        $objWriter->save($_SERVER['DOCUMENT_ROOT'].'/web/uploads/data/otchet.xls');
        return $this->redirect(['/web/uploads/data/otchet.xls']);

    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
