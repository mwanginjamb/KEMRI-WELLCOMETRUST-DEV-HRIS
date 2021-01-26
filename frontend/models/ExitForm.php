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
use yii\helpers\ArrayHelper;


class ExitForm extends Model
{

public $Key;
public $Form_No;
public $Exit_No;
public $Employee_No;
public $Employee_Name;
public $Global_Dimension_1_Code;
public $Global_Dimension_2_Code;
public $Global_Dimension_3_Code;
public $Global_Dimension_4_Code;
public $Global_Dimension_5_Code;
public $Action_ID;
public $isNewRecord;



    public function rules()
    {
        return [

        ];
    }

    public function attributeLabels()
    {
        return [
            'Global_Dimension_1_Code' => 'Department Code',
            'Global_Dimension_2_Code' => 'Project Code',
            'Global_Dimension_3_Code' => 'Department Code',
            'Global_Dimension_4_Code' => 'Project Code',
            'Global_Dimension_5_Code' => 'CustomerGroup Code'
        ];
    }

    /*Get Library Clearance Lines*/
    public function getLibrary(){
        $service = Yii::$app->params['ServiceName']['LibraryClearanceLines'];
        $filter = [
            'Exit_no' => $this->Exit_No,
        ];

        $lines = Yii::$app->navhelper->getData($service, $filter);
        return $lines;

    }

    /*Get Lab Lines*/

    public function getLab(){
        $service = Yii::$app->params['ServiceName']['LabClearanceLines'];
        $filter = [
            'Exit_no' => $this->Exit_No,
        ];

        $lines = Yii::$app->navhelper->getData($service, $filter);
        return $lines;

    }

    /*Get ICT lINES*/

    public function getICT(){
        $service = Yii::$app->params['ServiceName']['ICTClearanceLines'];
        $filter = [
            'Exit_no' => $this->Exit_No,
        ];

        $lines = Yii::$app->navhelper->getData($service, $filter);
        return $lines;

    }

    /*Get Store Clearance Lines */

    public function getStore(){
        $service = Yii::$app->params['ServiceName']['StoreCLearanceForm'];
        $filter = [
            'Exit_no' => $this->Exit_No,
        ];

        $lines = Yii::$app->navhelper->getData($service, $filter);
        return $lines;

    }

    /* Get Assigned Assets Lines*/
    public function getAssets(){
        $service = Yii::$app->params['ServiceName']['AssignedAssetsClearance'];
        $filter = [
            'Exit_no' => $this->Exit_No,
        ];

        $lines = Yii::$app->navhelper->getData($service, $filter);
        return $lines;

    }







/*Drop downs*/
    public function getChanges()
    {

        $changes = [
            ['Code' => '_blank_','Desc' => '_blank_'],
            ['Code' => 'Bio_Data' ,'Desc' =>'Bio_Data'],
            ['Code' => 'Next_Of_Kin' ,'Desc' => 'Next_Of_Kin',],
            ['Code' =>'Asset_Assignment' ,'Desc' => 'Asset_Assignment'],
            ['Code' => 'Emergency_Contacts' ,'Desc' => 'Emergency_Contacts'],
            ['Code' => 'Beneficiaries' ,'Desc' => 'Beneficiaries'],
            ['Code' => 'Medical_Dependants' ,'Desc' => 'Medical_Dependants'],
            ['Code' => 'Qualifications' ,'Desc' => 'Qualifications'],
            ['Code' => 'Proffesional_Bodies' ,'Desc' => 'Proffesional_Bodies'],
            ['Code' => 'Work_History' ,'Desc' => 'Work_History'],
            ['Code' => 'Contract_Renewal','Desc' => 'Contract_Renewal'],
            ['Code' => 'New_Contract' ,'Desc' => 'New_Contract'],
            ['Code' => 'salary_Increment' ,'Desc' => 'salary_Increment']
        ];

        return ArrayHelper::map($changes,'Code','Desc');
    }

    // Check section clearance Status

    public function CheckStatus($section)
    {
        $service = Yii::$app->params['ServiceName']['ClearanceStatus'];

        if($section == 'Lab')
        {
            $filter = [
                'Form_No' => $this->Form_No,
                'Section' => $section,
            ];
            //Get Status
            $result = Yii::$app->navhelper->getData($service, $filter);
            return $result[0]->Status;
        }
        elseif($section == 'ICT')
        {
            $filter = [
                'Form_No' => $this->Form_No,
                'Section' => $section,
            ];
            //Get Status
            $result = Yii::$app->navhelper->getData($service, $filter);
            return $result[0]->Status == 'Cleared'?'text-success':'';
        }
        elseif($section == 'Store')
        {
            $filter = [
                'Form_No' => $this->Form_No,
                'Section' => $section,
            ];
            //Get Status
            $result = Yii::$app->navhelper->getData($service, $filter);
            return $result[0]->Status == 'Cleared'?'text-success':'';
        }
        elseif($section == 'Library')
        {
            $filter = [
                'Form_No' => $this->Form_No,
                'Section' => $section,
            ];
            //Get Status
            $result = Yii::$app->navhelper->getData($service, $filter);
            return $result[0]->Status == 'Cleared'?'text-success':'';
        }
        elseif($section == 'Archives')
        {
            $filter = [
                'Form_No' => $this->Form_No,
                'Section' => $section,
            ];
            //Get Status

            $result = Yii::$app->navhelper->getData($service, $filter);
            if(is_array($result)){
                return $result[0]->Status == 'Cleared'?'text-success':'';
            }else{
                return false;
            }

        }
        elseif($section == 'Assets')
        {
            $filter = [
                'Form_No' => $this->Form_No,
                'Section' => $section,
            ];
            //Get Status
            $result = Yii::$app->navhelper->getData($service, $filter);
            if(is_array($result)){
                return $result[0]->Status == 'Cleared'?'text-success':'';
            }else{
                return false;
            }
        }else{
            return false;
        }
    }



}