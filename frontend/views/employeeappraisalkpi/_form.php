<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/24/2020
 * Time: 12:13 PM
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="card-body">



                    <?php




                    $form = ActiveForm::begin();





                $disabled = (Yii::$app->session->get('Goal_Setting_Status') == 'Closed' )? true: false;

                     ?>
                <div class="row">
                    <div class="col-md-12">



                            <table class="table">
                                <tbody>




                                      <?= $form->field($model, 'Appraisal_No')->hiddenInput(['readonly' => true])->label(false) ?>

                                    <?= $form->field($model, 'Employee_No')->hiddenInput(['readonly' => true])->label(false) ?>

                                    <?= $form->field($model, 'KRA_Line_No')->hiddenInput(['readonly' => true])->label(false)?>

                                    <?= (Yii::$app->session->get('Goal_Setting_Status') == 'New')?
                                    $form->field($model, 'Objective')->textArea(['max-length' => 250, 'row' => 4,'placeholder' => 'Your KPI']):
                                     $form->field($model, 'Objective')->textArea(['max-length' => 250, 'row' => 4,'placeholder' => 'Your KPI','readonly' => true,'disabled'=> true])
                                     ?>

                                     <?= (Yii::$app->session->get('Goal_Setting_Status') == 'New')?$form->field($model, 'Weight')->textInput(['type' => 'number']):'' ?>

                                       <?= (Yii::$app->session->get('Goal_Setting_Status') == 'New')?$form->field($model, 'Due_Date')->textInput(['type' => 'date','required' => true]):'' ?>




                                     <?= (Yii::$app->session->get('MY_Appraisal_Status') == 'Appraisee_Level')?$form->field($model, 'Mid_Year_Appraisee_Assesment')->dropDownList($assessments,['prompt' => 'Select Assement...']):'' ?>   

                                      <?= (Yii::$app->session->get('MY_Appraisal_Status') == 'Appraisee_Level') ? $form->field($model, 'Mid_Year_Appraisee_Comments')->textArea(['rows' => 2,'maxlength' => 250]):'' ?> 


                                       <?= (Yii::$app->session->get('MY_Appraisal_Status') == 'Supervisor_Level')?$form->field($model, 'Mid_Year_Supervisor_Assesment')->dropDownList($assessments,['prompt' => 'Select Assement...']) :'' ?>   

                                      <?= (Yii::$app->session->get('MY_Appraisal_Status') == 'Supervisor_Level')?$form->field($model, 'Mid_Year_Supervisor_Comments')->textArea(['rows' => 2,'maxlength' => 250]):'' ?> 






                                     <?=
                                     (!$disabled && Yii::$app->session->get('Goal_Setting_Status') == 'Closed' && Yii::$app->session->get('Appraisal_Status') == 'Appraisee_Level')?
                                     $form->field($model, 'Appraisee_Self_Rating')->dropDownList($ratings,['prompt' => 'Select Rating...',$disabled])
                                     :
                                     (Yii::$app->session->get('EY_Appraisal_Status') == 'Appraisee_Level')?$form->field($model, 'Appraisee_Self_Rating')->dropDownList($ratings,['prompt' => 'Select Rating...']):'' ?>

                                    


                                     <?= (!$disabled && Yii::$app->session->get('Goal_Setting_Status') == 'Closed' && Yii::$app->session->get('Appraisal_Status') == 'Appraisee_Level')? 

                                     $form->field($model, 'Employee_Comments')->textInput(['type' => 'text'])
                                     :
                                     (Yii::$app->session->get('EY_Appraisal_Status') == 'Appraisee_Level')?$form->field($model, 'Employee_Comments')->textInput(['type' => 'text']):'' 
                                      ?>




                                      <?= (Yii::$app->session->get('EY_Appraisal_Status') == 'Supervisor_Level')?$form->field($model, 'Appraiser_Rating')->dropDownList($ratings,['prompt' => 'Select Rating...']):'' ?>



                                     <?= (Yii::$app->session->get('EY_Appraisal_Status') == 'Supervisor_Level')? $form->field($model, 'End_Year_Supervisor_Comments')->textInput(['type' => 'text']): '' ?>

                                     <?= (Yii::$app->session->get('Goal_Setting_Status') == 'Closed' && Yii::$app->session->get('Appraisal_Status') == 'Agreement_Level')?$form->field($model, 'Agree')->dropDownList([
                                        true => 'I agree', false => 'I disagree'
                                     ]): '' ?>

                                      <?= (Yii::$app->session->get('Goal_Setting_Status' && Yii::$app->session->get('Appraisal_Status') == 'Agreement_Level') == 'Closed')? $form->field($model, 'Disagreement_Comments')->textArea(['max-length' => 250, 'row' => 4,'placeholder' => 'Your Comment']):'' ?>

                                      <?= (Yii::$app->session->get('Goal_Setting_Status') == 'Closed' && Yii::$app->session->get('Appraisal_Status') == 'Overview_Manager' )? $form->field($model, 'Overview_Manager_Comments')->textArea(['max-length' => 250, 'row' => 4,'placeholder' => 'Over View Manager Comment']):'' ?>







                                    <?= $form->field($model, 'Key')->hiddenInput(['readonly'=> true])->label(false) ?>
                                     <?= ($model->isNewRecord)?$form->field($model, 'Line_No')->hiddenInput(['readonly'=> true])->label(false):'' ?>












                                </tbody>
                            </table>



                    </div>




                </div>












                <div class="row">

                    <div class="form-group">
                        <?= Html::submitButton(($model->isNewRecord)?'Save Objective':'Update', ['class' => 'btn btn-success']) ?>
                    </div>


                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<<JS
 //Submit Rejection form and get results in json    
        $('form').on('submit', function(e){
            e.preventDefault()
            const data = $(this).serialize();
            const url = $(this).attr('action');
            $.post(url,data).done(function(msg){
                    $('.modal').modal('show')
                    .find('.modal-body')
                    .html(msg.note);
        
                },'json');
        });
JS;

$this->registerJs($script);
