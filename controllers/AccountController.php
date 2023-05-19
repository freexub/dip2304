<?php
namespace app\controllers;
/**
 * Created by PhpStorm.
 * User: kenguru
 * Date: 12.08.2018
 * Time: 15:05
 */

use yii\web\Controller;
use yii\filters\VerbFilter;
use mdm\admin\models\form\ChangePassword;

use app\models\Personal;
use app\models\TicketSearch;
use app\models\TypeTicket;
use app\models\Ticket;
use app\models\TicketInfo;
use app\models\TicketStatus;
use Yii;

class AccountController extends Controller
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
     * Lists all Ticket models.
     * @return mixed
     */
	

    public function actionIndex()
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort->defaultOrder = ['id' => SORT_DESC];
        if(Yii::$app->user->identity)
        $dataProvider->query->andWhere('id IN (SELECT `ticket_id` FROM `ticket_info` WHERE `personal_id` = '.Yii::$app->user->identity->person_id.' and `active` = "0")');

        $status = TicketStatus::find()->where('active=0')->all();

        $ticket_inf = TicketInfo::find()->select(['date'],'DISTINCT')->orderBy(['date'=>SORT_ASC])->all();
        $today = date("Y-m-d");
        #var_dump(createRange($ticket_inf[0]['date'], $ddd));die();
        #var_dump(createRange('2015-01-01', '2015-01-06'));die();

        #$d1 = createRange($ticket_inf[0]['date'], $ddd);
		
		// доделай даты!!!
        $count_type = TypeTicket::find()->asArray()->select(['id'])->where(['active'=>0])->all();
        $count_t = TypeTicket::find()->where(['active'=>0])->all();
		
		$date = array();
		
		$current = strtotime($ticket_inf[0]['date']);
		$last = strtotime($today);
		$step = '+1 day';
		$output_format = 'Y-m-d';
		while( $current <= $last ) {

			$date[] = date($output_format, $current);
			$current = strtotime($step, $current);
		}
		
		for($a=0;count($count_type)>$a;$a++){
			for($ii=0;count($date)>$ii;$ii++){				
									
				#var_dump($count_all);die();
				$kart_c = Ticket::find()->joinWith('ticketInf')->asArray()->select(['COUNT(*) AS id'])->where(['ticket_info.date'=>$date[$ii],'type_id'=>(int)$count_type[$a]['id']])->all();
				if(count($kart_c)>1){
					$count_all[$a][date($date[$ii],'m-d')] = 0;
				}else{
					$count_all[$a][$date[$ii]] = (int)$kart_c[0]['id'];
				}
			}

            $all[$a] = ['name' => 'Ремонт компьютера', 'data' => array_values($count_all[$a])];		
        }
		

        for($i=0;count($date)>$i;$i++){				
                $c = TicketInfo::find()->asArray()->select(['COUNT(*) AS id'])->where(['date'=>$date[$i]])->all();                
                if(count($c)>1){
					$count[date($date[$i],'m-d')] = 0;						
				}else{
					$count[$date[$i]] = (int)$c[0]['id'];						
				}
        }
        
        #var_dump($count_type[0]['id']);die();
        #var_dump(array_values($count_all));die();
        #var_dump(array_values($count));die();
        $personal = Personal::findOne(['user_id'=>Yii::$app->user->identity->id]);
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('index', [
            'model' => $model,
            'personal' => $personal,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'count_type' => $count_type,
            'count_t' => $count_t,
            'status' => $status,
            'date' => $date,
            'count' => $count,
            'count_all' => $count_all,
            'all' => $all,
            #'d1' => $d1,
            'arrProfile'=>[],
        ]);
    }
	
	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }
	
	protected function findModel($id)
    {
        if (($model = Ticket::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function dateRange($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}
}
















