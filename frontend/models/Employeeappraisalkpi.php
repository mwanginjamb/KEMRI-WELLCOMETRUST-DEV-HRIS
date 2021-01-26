<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace frontend\models;
use yii\base\Model;


class Employeeappraisalkpi extends Model
{
    public $Key;
    public $Appraisal_No;
    public $Employee_No;
    public $Objective;
    public $Weight;
    public $Mid_Year_Appraisee_Assesment;
    public $Mid_Year_Appraisee_Comments;
    public $Mid_Year_Supervisor_Assesment;
    public $Mid_Year_Supervisor_Comments;
    public $Appraisee_Self_Rating;
    public $Employee_Comments;
    public $Appraiser_Rating;
    public $End_Year_Supervisor_Comments;
    public $Agree;
    public $Disagreement_Comments;
    public $Line_No;
    public $KRA_Line_No;
    public $isNewRecord;

    public function rules()
    {
        return [
            [['Appraisal_No','Employee_No','Objective','Objective'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [

        ];
    }
}