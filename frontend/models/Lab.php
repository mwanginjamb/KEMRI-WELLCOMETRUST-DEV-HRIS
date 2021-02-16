<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 3/9/2020
 * Time: 4:09 PM
 */

namespace frontend\models;
use yii\base\Model;


class Lab extends Model
{


    public $Employee_no;
    public $Exit_no;
    public $Lab_Item;
    public $Returned;
    public $Number;
    public $Line_No;
    public $Form_No;
    public $Key;
    public $isNewRecord;

    public function rules()
    {
        return [
            [['Lab_Item','Employee_no','Exit_no','Form_No'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'Number' => 'Item Cost',
        ];
    }
}