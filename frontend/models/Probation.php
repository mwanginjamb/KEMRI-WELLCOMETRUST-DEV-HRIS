<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace frontend\models;
use common\models\User;
use Yii;
use yii\base\Model;


class Probation extends Model
{

public $Key;
public $Appraisal_No;
public $Employee_No;
public $Employee_Name;
public $Employee_User_Id;
public $Level_Grade;
public $Job_Title;
public $Goal_Setting_Status;
public $Appraisal_Status;
public $Supervisor_No;
public $Supervisor_Name;
public $Supervisor_User_Id;
public $Overview_Manager;
public $Overview_Manager_Name;
public $Overview_Manager_UserID;
public $Probation_Recomended_Action;
public $Over_View_Manager_Comments;

public $Overall_Score;

    public function rules()
    {
        return [

        ];
    }

    public function attributeLabels()
    {
        return [



        ];
    }

    public function getObjectives(){
        $service = Yii::$app->params['ServiceName']['ProbationKRAs'];
        $filter = [
            'Appraisal_No' => $this->Appraisal_No,
        ];

        $objectives = Yii::$app->navhelper->getData($service, $filter);
        return $objectives;
    }

    public function getKpi($KRA_Line_No){
        $service = Yii::$app->params['ServiceName']['ProbationKPIs'];
        $filter = [
            'KRA_Line_No' => $KRA_Line_No,
        ];

        $result = Yii::$app->navhelper->getData($service, $filter);
        return $result;
    }



    //get supervisor status

    public function isSupervisor()
    {

        return (Yii::$app->user->identity->{'Employee No_'} == $this->Supervisor_No);

    }

    public function isOverview()
    {

        return (Yii::$app->user->identity->{'Employee No_'} == $this->Overview_Manager);

    }

    public function isAppraisee()
    {
        return (Yii::$app->user->identity->{'Employee No_'} == $this->Employee_No);
    }



}