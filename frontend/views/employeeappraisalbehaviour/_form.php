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




                $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-12">



                        <table class="table">
                            <tbody>


                            <?= (Yii::$app->session->get('Goal_Setting_Status') == 'New')?
                            $form->field($model, 'Behaviour_Name')->textInput(['maxlength' => 150]):
                            $form->field($model, 'Behaviour_Name')->textInput(['maxlength' => 150,'disabled' => true, 'readonly' => true]) ?>

                            <?= (Yii::$app->session->get('Goal_Setting_Status') == 'New' )?$form->field($model, 'Applicable')->checkbox(['value' => true,['enclosedByLabel' => true]]):'' ?>

                            

                            <?= 
                                (

                                 Yii::$app->session->get('isAppraisee') &&
                                 Yii::$app->session->get('EY_Appraisal_Status') == 'Appraisee_Level' 
                                    )?$form->field($model, 'Self_Rating')->dropDownList($ratings,['prompt' => 'Select Rating']):'' ?>
                            <?= 

                                (
                                 Yii::$app->session->get('isAppraisee') &&
                                 Yii::$app->session->get('EY_Appraisal_Status') == 'Appraisee_Level' 

                             )?$form->field($model, 'Appraisee_Remark')->textarea(['rows' => 3, 'maxlength' => 250]):'' ?>



                            <?= (

                                Yii::$app->user->identity->isSupervisor() &&
                                (
                                Yii::$app->session->get('EY_Appraisal_Status') == 'Supervisor_Level' ||
                                Yii::$app->session->get('Appraisal_Status') == 'Supervisor_Level')

                            )?$form->field($model, 'Appraiser_Rating')->dropDownList($ratings,['prompt' => 'Select Rating']):'' ?>

                            <?= (Yii::$app->session->get('EY_Appraisal_Status') == 'Peer_1_Level')?$form->field($model, 'Peer_1')->dropDownList($ratings,['prompt' => 'Select Rating']):'' ?>
                            <?= (Yii::$app->session->get('EY_Appraisal_Status') == 'Peer_1_Level')?$form->field($model, 'Peer_1_Remark')->textarea(['rows' => 3, 'maxlength' => 250]):'' ?>


                            <?= (Yii::$app->session->get('EY_Appraisal_Status') == 'Peer_2_Level')?$form->field($model, 'Peer_2')->dropDownList($ratings,['prompt' => 'Select Rating']):'' ?>
                            <?= (Yii::$app->session->get('EY_Appraisal_Status') == 'Peer_2_Level')?$form->field($model, 'Peer_2_Remark')->textarea(['rows' => 3, 'maxlength' => 250]):'' ?>


                            <?= (Yii::$app->session->get('Goal_Setting_Status') == 'New')?$form->field($model, 'Agreed_Rating')->textInput(['type' => 'number','required' => true]):'' ?>
                            <?= (
                                Yii::$app->user->identity->isSupervisor() && (
                                Yii::$app->session->get('EY_Appraisal_Status') == 'Supervisor_Level' ||
                                Yii::$app->session->get('Appraisal_Status') == 'Supervisor_Level')
                                    
                            )?$form->field($model, 'Overall_Remarks')->textarea(['rows' => 4,'max-length'=> 250]):'' ?>

                            <?= $form->field($model, 'Key')->hiddenInput(['readonly'=> true])->label(false) ?>











                            </tbody>
                        </table>



                    </div>




                </div>












                <div class="row">

                    <div class="form-group">
                        <?= Html::submitButton(($model->isNewRecord)?'Save':'Update', ['class' => 'btn btn-success']) ?>
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
