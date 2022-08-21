<?php


namespace app\controllers;


use Yii;
use yii\web\Controller;

class AjaxController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionResult()
    {
        $request = Yii::$app->request->post();
        $min = $request["min"];
        $max = $request["max"];

//доп проверка
        if(strlen($min) != 6 || strlen($max) != 6){
            return 'error lenght';
        }elseif(!ctype_digit($min) || !ctype_digit($max)){
            return 'Only numbers';
        }

        if(intval($min) > intval($max)){
            $min = $request["max"];
            $max = $request["min"];
        }
        $count = 0;
        $list = [];

        for($i = $min; $i <= $max; $i++){
            $i = strval($i);
            $left_sum = $i[0] + $i[1] + $i[2];
            $right_sum = $i[3] + $i[4] + $i[5];
            if(strlen(strval($left_sum)) > 1){
                $left_sum = strval($left_sum);
                $left_sum = $left_sum[0] + $left_sum[1];
            }
            if(strlen(strval($right_sum)) > 1){
                $right_sum = strval($right_sum);
                $right_sum = $right_sum[0] + $right_sum[1];
            }

            if($left_sum == $right_sum){
                $count++;
                array_push($list, $i);
            }
        }
        //echo json_encode($list);

        return $count;
    }

}