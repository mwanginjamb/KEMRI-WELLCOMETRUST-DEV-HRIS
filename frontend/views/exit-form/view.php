<?php
/**
 * Created by PhpStorm.
 * User: HP ELITEBOOK 840 G5
 * Date: 2/24/2020
 * Time: 6:09 PM
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Change Request - '.$model->Form_No;
$this->params['breadcrumbs'][] = ['label' => 'Change Request', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Change Request Card', 'url' => ['view','No'=> $model->Form_No]];
/** Status Sessions */


/* Yii::$app->session->set('MY_Appraisal_Status',$model->MY_Appraisal_Status);
Yii::$app->session->set('EY_Appraisal_Status',$model->EY_Appraisal_Status);
Yii::$app->session->set('isSupervisor',false);*/
?>

<div class="row">
    <div class="col-md-12">




        <?= Html::a('<i class="fas fa-paper-plane"></i> Send to Library',['cancel-request'],['class' =>  $model->CheckStatus('Library').' btn btn-app submitforapproval',
            'data' => [
                'confirm' => 'Are you sure you want to send this document ?',
                'params'=>[
                    'No'=> $model->Form_No,
                ],
                'method' => 'get',
            ],
            'title' => 'Cancel Approval Request'

        ]) ?>

        <?= Html::a('<i class="fas fa-paper-plane"></i> Send to Lab',['cancel-request'],['class' => $model->CheckStatus('Lab').' btn btn-app submitforapproval',
            'data' => [
                'confirm' => 'Are you sure you want to send this document ?',
                'params'=>[
                    'No'=> $model->Form_No,
                ],
                'method' => 'get',
            ],
            'title' => 'Cancel Approval Request'

        ]) ?>


        <?= Html::a('<i class="fas fa-paper-plane"></i> Send to ICT',['cancel-request'],['class' => $model->CheckStatus('ICT').' btn btn-app submitforapproval',
            'data' => [
                'confirm' => 'Are you sure you want to send this document ?',
                'params'=>[
                    'No'=> $model->Form_No,
                ],
                'method' => 'get',
            ],
            'title' => 'Cancel Approval Request'

        ]) ?>

        <?= Html::a('<i class="fas fa-paper-plane"></i> Send to Store',['cancel-request'],['class' => $model->CheckStatus('Store').' btn btn-app submitforapproval',
            'data' => [
                'confirm' => 'Are you sure you want to send this document ?',
                'params'=>[
                    'No'=> $model->Form_No,
                ],
                'method' => 'get',
            ],
            'title' => 'Cancel Approval Request'

        ]) ?>

        <?= Html::a('<i class="fas fa-paper-plane"></i> Send to Archives',['cancel-request'],['class' => $model->CheckStatus('Archives').' btn btn-app submitforapproval',
            'data' => [
                'confirm' => 'Are you sure you want to send this document ?',
                'params'=>[
                    'No'=> $model->Form_No,
                ],
                'method' => 'get',
            ],
            'title' => 'Cancel Approval Request'

        ]) ?>

        <?= Html::a('<i class="fas fa-paper-plane"></i> Send to Assets',['cancel-request'],['class' => $model->CheckStatus('Assets').' btn btn-app submitforapproval',
            'data' => [
                'confirm' => 'Are you sure you want to send this document ?',
                'params'=>[
                    'No'=> $model->Form_No,
                ],
                'method' => 'get',
            ],
            'title' => 'Cancel Approval Request'

        ]) ?>


    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-info">
                <div class="card-header">
                    <h3>Exit Form Document </h3>
                </div>



            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">




                    <h3 class="card-title">Request No : <?= $model->Form_No?></h3>

                    <div class="card-tools">
                        <?= Html::a('View Clearance Status',['clearance-status','form_no' => $model->Form_No],['class' => 'btn btn-sm btn-success']);?>
                    </div>


                    <?php
                    if(Yii::$app->session->hasFlash('success')){
                        print ' <div class="alert alert-success alert-dismissable">
                                 ';
                        echo Yii::$app->session->getFlash('success');
                        print '</div>';
                    }else if(Yii::$app->session->hasFlash('error')){
                        print ' <div class="alert alert-danger alert-dismissable">
                                 ';
                        echo Yii::$app->session->getFlash('error');
                        print '</div>';
                    }
                    ?>
                </div>
                <div class="card-body">


                    <?php $form = ActiveForm::begin(); ?>


                    <div class="row">
                        <div class=" row col-md-12">
                            <div class="col-md-6">

                                <?= $form->field($model, 'Form_No')->textInput(['readonly'=> true]) ?>
                                <?= $form->field($model, 'Exit_No')->textInput(['readonly' => true]) ?>
                                <?= $form->field($model, 'Employee_No')->textInput(['readonly'=> true]) ?>
                                <?= $form->field($model, 'Key')->hiddenInput(['readonly'=> true])->label(false) ?>
                                <?= $form->field($model, 'Employee_Name')->textInput(['readonly'=> true]) ?>
                                <?= $form->field($model, 'Global_Dimension_1_Code')->textInput(['readonly'=> true]) ?>

                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model, 'Global_Dimension_2_Code')->textInput(['readonly'=> true,'disabled'=> true]) ?>
                                <?= $form->field($model, 'Global_Dimension_3_Code')->textInput(['readonly'=> true,'disabled'=> true]) ?>
                                <?= $form->field($model, 'Global_Dimension_4_Code')->textInput(['readonly'=> true,'disabled'=> true]) ?>
                                <?= $form->field($model, 'Global_Dimension_5_Code')->textInput(['readonly'=> true,'disabled'=> true]) ?>
                                <?= $form->field($model, 'Action_ID')->textInput(['readonly'=> true,'disabled'=> true]) ?>

                            </div>
                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>



                </div>
            </div><!--end details card-->

            <!--Library Clearance Lines -->

            <div class="card" id="Library">
                <div class="card-header">
                    <div class="card-title">
                       Library Clearance Lines
                    </div>
                    <div class="card-tools">
                        <?= Html::a('<i class="fas fa-plus-square mr-2"></i>Add',['library-clearance/create','No' => $model->Form_No],['class' => 'add-line btn btn-sm btn-info ml-auto']) ?>
                    </div>

                </div>

                <div class="card-body">

                    <?php
                   // Yii::$app->recruitment->printrr($model);
                    if(is_array($model->library)){ //show Lines ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td><b>Employee_no</b></td>
                                <td><b>Exit_no</b></td>
                                <td><b>Book_Description</b></td>
                                <td><b>Book_Worth</b></td>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            // print '<pre>'; print_r($model->getObjectives()); exit;
                            foreach($model->library as $obj):
                                $updateLink = Html::a('<i class="fa fa-edit"></i>',['library-clearance/update','No'=> $obj->Line_No],['class' => 'update-objective btn btn-outline-info btn-xs']);
                                $deleteLink = Html::a('<i class="fa fa-trash"></i>',['library-clearance/delete','Key'=> $obj->Key ],['class'=>'delete btn btn-outline-danger btn-xs']);
                                ?>
                                <tr>

                                    <td data-key="<?= $obj->Key ?>" data-name="Employee_no" data-no="<?= $obj->Line_No ?>"  data-service="LibraryClearanceLines" ondblclick="addInput(this)"><?= !empty($obj->Employee_no)?$obj->Employee_no:'Not Set' ?></td>
                                    <td data-key="<?= $obj->Key ?>" data-name="Exit_no" data-no="<?= $obj->Line_No ?>"  data-service="LibraryClearanceLines" ondblclick="addInput(this)"><?= !empty($obj->Exit_no)?$obj->Exit_no:'Not Set' ?></td>
                                    <td data-key="<?= $obj->Key ?>" data-name="Book_Description" data-no="<?= $obj->Line_No ?>"  data-service="LibraryClearanceLines" ondblclick="addInput(this)"><?= !empty($obj->Book_Description)?$obj->Book_Description:'Not Set' ?></td>
                                    <td data-key="<?= $obj->Key ?>" data-name="Book_Worth" data-no="<?= $obj->Line_No ?>"  data-service="LibraryClearanceLines" ondblclick="addInput(this, 'number')"><?= !empty($obj->Book_Worth)?$obj->Book_Worth:'Not Set' ?></td>


                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php } ?>
                </div>
            </div>


            <!--End Library Lines -->


            <!--Next Lab_Clearance_Lines-->

            <div class="card" id="Lab">
                <div class="card-header">
                    <div class="card-title">
                        Lab Clearance Lines
                    </div>
                    <div class="card-tools">
                        <?= Html::a('<i class="fas fa-plus-square mr-2"></i>Add',['lab-clearance/create','No' => $model->Form_No],['class' => 'add-line btn btn-sm btn-info']) ?>
                    </div>
                </div>

                <div class="card-body">

                    <?php
                    //Yii::$app->recruitment->printrr($model->relatives);
                    if(is_array($model->lab)){ //show Lines ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td><b>Employee_no</b></td>
                                    <td><b>Exit_no</b></td>
                                    <td><b>Lab_Item</b></td>
                                    <td><b>Returned</b></td>
                                    <td><b>Number</b></td>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // print '<pre>'; print_r($model->getObjectives()); exit;
                                foreach($model->lab as $robj):
                                    $updateLink = Html::a('<i class="fa fa-edit"></i>',['dependant/update','No'=> $robj->Line_No],['class' => 'update-robjective btn btn-outline-info btn-xs']);
                                    $deleteLink = Html::a('<i class="fa fa-trash"></i>',['dependant/delete','Key'=> $robj->Key ],['class'=>'delete btn btn-outline-danger btn-xs']);
                                    ?>
                                    <tr>

                                        <td data-key="<?= $robj->Key ?>" data-name="Employee_no" data-no="<?= $robj->Line_No ?>" data-model="Relative" data-service="LabClearanceLines" ondblclick="addInput(this)"><?= !empty($robj->Employee_no)?$robj->Employee_no:'Not Set' ?></td>
                                        <td data-key="<?= $robj->Key ?>" data-name="Exit_no" data-no="<?= $robj->Line_No ?>" data-model="Relative" data-service="LabClearanceLines" ondblclick="addInput(this)"><?= !empty($robj->Exit_no)?$robj->Exit_no:'Not Set' ?></td>
                                        <td data-key="<?= $robj->Key ?>" data-name="Lab_Item" data-no="<?= $robj->Line_No ?>" data-model="Relative" data-service="LabClearanceLines" ondblclick="addInput(this)"><?= !empty($robj->Lab_Item)?$robj->Lab_Item:'Not Set' ?></td>
                                        <td data-key="<?= $robj->Key ?>" data-name="Returned" data-no="<?= $robj->Line_No ?>" data-model="Relative" data-service="LabClearanceLines" ondblclick="addDropDown(this,'returned')"><?= !empty($robj->Returned)?$robj->Returned:'Not Set' ?></td>

                                        <td data-key="<?= $robj->Key ?>" data-name="Number" data-no="<?= $robj->Line_No ?>" data-model="Relative" data-service="LabClearanceLines" ondblclick="addInput(this)"><?= !empty($robj->Number)?$robj->Number:'Not Set' ?></td>


                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    <?php } ?>
                </div>
            </div>

            <!--ICT cLEARANCE Form-->

            <div class="card" id="ICT_Clearance_Lines">
                <div class="card-header">
                    <div class="card-title">
                        ICT Clearance
                    </div>
                    <div class="card-tools">
                        <?= Html::a('<i class="fas fa-plus-square mr-2"></i>Add',['ict-clearance/create','No' => $model->Form_No],['class' => 'add-line btn btn-sm btn-info']) ?>
                    </div>
                </div>

                <div class="card-body">

                    <?php

                    if(is_array($model->ict)){ //show Lines ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>


                                    <td><b>Employee_no</b></td>
                                    <td><b>Exit_no</b></td>
                                    <td><b>Item_Description</b></td>
                                    <td><b>Item_Worth</b></td>



                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // print '<pre>'; print_r($model->getObjectives()); exit;
                                foreach($model->ict as $benobj):
                                    $updateLink = Html::a('<i class="fa fa-edit"></i>',['ict-clearance/update','No'=> $benobj->No],['class' => 'update-benobjective btn btn-outline-info btn-xs']);
                                    $deleteLink = Html::a('<i class="fa fa-trash"></i>',['ict/clearance','Key'=> $benobj->Key ],['class'=>'delete btn btn-outline-danger btn-xs']);
                                    ?>
                                    <tr>

                                        <td data-key="<?= $benobj->Key ?>" data-name="Employee_no" data-no="<?= $benobj->No ?>" data-filter-field="No" data-service="ICTClearanceLines" ondblclick="addInput(this)"><?= !empty($benobj->Employee_no)?$benobj->Employee_no:'Not Set' ?></td>
                                        <td data-key="<?= $benobj->Key ?>" data-name="Exit_no" data-no="<?= $benobj->No ?>" data-filter-field="No" data-service="ICTClearanceLines" ondblclick="addDropDown(this,'type')"><?= !empty($benobj->Exit_no)?$benobj->Exit_no:'Not Set' ?></td>
                                        <td data-key="<?= $benobj->Key ?>" data-name="Item_Description" data-no="<?= $benobj->No ?>" data-filter-field="No" data-service="ICTClearanceLines" ondblclick="addDropDown(this,'relatives')"><?= !empty($benobj->Item_Description)?$benobj->Item_Description:'Not Set' ?></td>
                                        <td data-key="<?= $benobj->Key ?>" data-name="Item_Worth" data-no="<?= $benobj->No ?>" data-filter-field="No" data-service="ICTClearanceLines" ondblclick="addInput(this)"><?= !empty($benobj->Item_Worth)?$benobj->Item_Worth:'Not Set' ?></td>


                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>

                </div>
            </div>


            <!--Assigned_store_Clearance-->

            <div class="card" id="Store_CLearance_Form">
                <div class="card-header">
                    <div class="card-title">
                        Store Clearance Form
                    </div>
                    <div class="card-tools">
                        <?= Html::a('<i class="fas fa-plus-square mr-2"></i>Add',['store-clearance/create','No' => $model->Form_No],['class' => 'add-line btn btn-sm btn-info']) ?>
                    </div>
                </div>

                <div class="card-body">

                    <?php

                    if(is_array($model->store)){ //show Lines ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td><b>Employee_no</b></td>
                                    <td><b>Exit_no</b></td>
                                    <td><b>Item_Description</b></td>
                                    <td><b>Item_Worth</b></td>



                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // print '<pre>'; print_r($model->getObjectives()); exit;
                                foreach($model->store as $whobj):
                                    $updateLink = Html::a('<i class="fa fa-edit"></i>',['store-clearance/update','No'=> $whobj->Line_No],['class' => 'update-whobjective btn btn-outline-info btn-xs']);
                                    $deleteLink = Html::a('<i class="fa fa-trash"></i>',['store-clearance/delete','Key'=> $whobj->Key ],['class'=>'delete btn btn-outline-danger btn-xs']);
                                    ?>
                                    <tr>

                                        <td data-key="<?= $whobj->Key ?>" data-name="Employee_no" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="StoreCLearanceForm" ondblclick="addInput(this)"><?= !empty($whobj->Employee_no)?$whobj->Employee_no:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Exit_no" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="StoreCLearanceForm" ondblclick="addInput(this)"><?= !empty($whobj->Exit_no)?$whobj->Exit_no:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Item_Description" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="StoreCLearanceForm" ondblclick="addInput(this)"><?= !empty($whobj->Item_Description)?$whobj->Item_Description:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Item_Worth" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="StoreCLearanceForm" ondblclick="addInput(this, 'number')"><?= !empty($whobj->Item_Worth)?$whobj->Item_Worth:'Not Set' ?></td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>

                </div>
            </div>


            <!--Assigned Assets Clearance-->


            <div class="card" id="Assigned_Assets_Clearance">
                <div class="card-header">
                    <div class="card-title">
                        Assigned Assets Clearance Form
                    </div>
                    <div class="card-tools">
                        <?= Html::a('<i class="fas fa-plus-square mr-2"></i>Add',['assigned-assets-clearance/create','No' => $model->Form_No],['class' => 'add-line btn btn-sm btn-info']) ?>
                    </div>
                </div>

                <div class="card-body">

                    <?php

                    if(is_array($model->assets)){ //show Lines ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td><b>Employee_no</b></td>
                                    <td><b>Misc_Article_Code</b></td>
                                    <td><b>Description</b></td>
                                    <td><b>Asset_Number</b></td>
                                    <td><b>Condition</b></td>
                                    <td><b>Returned</b></td>
                                    <td><b>Value_on_Return</b></td>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // print '<pre>'; print_r($model->getObjectives()); exit;
                                foreach($model->assets as $whobj):
                                    $updateLink = Html::a('<i class="fa fa-edit"></i>',['assigned-assets-clearance/update','No'=> $whobj->Line_No],['class' => 'update-whobjective btn btn-outline-info btn-xs']);
                                    $deleteLink = Html::a('<i class="fa fa-trash"></i>',['assigned-assets-clearance/delete','Key'=> $whobj->Key ],['class'=>'delete btn btn-outline-danger btn-xs']);
                                    ?>
                                    <tr>

                                        <td data-key="<?= $whobj->Key ?>" data-name="Employee_No" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="AssignedAssetsClearance" ><?= !empty($whobj->Employee_No)?$whobj->Employee_No:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Misc_Article_Code" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="AssignedAssetsClearance" ondblclick="addInput(this)"><?= !empty($whobj->Misc_Article_Code)?$whobj->Misc_Article_Code:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Description" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="AssignedAssetsClearance" ondblclick="addInput(this)"><?= !empty($whobj->Description)?$whobj->Description:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Asset_Number" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="AssignedAssetsClearance" ondblclick="addInput(this)"><?= !empty($whobj->Asset_Number)?$whobj->Asset_Number:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Condition" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="AssignedAssetsClearance" ondblclick="addDropDown(this,'condition')"><?= !empty($whobj->Condition)?$whobj->Condition:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Returned" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="AssignedAssetsClearance" ondblclick="addInput(this, 'checkbox')"><?= !empty($whobj->Returned)?$whobj->Returned:'Not Set' ?></td>
                                        <td data-key="<?= $whobj->Key ?>" data-name="Value_on_Return" data-no="<?= $whobj->Line_No ?>" data-filter-field="Line_No" data-service="AssignedAssetsClearance" ondblclick="addInput(this, 'number')"><?= !empty($whobj->Value_on_Return)?$whobj->Value_on_Return:'Not Set' ?></td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>

                </div>
            </div>















    </div>

    <!--My Bs Modal template  --->

    <div class="modal fade bs-example-modal-lg bs-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel" style="position: absolute">Change Request Management</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>

            </div>
        </div>
    </div>


<?php

$script = <<<JS

    $(function(){
      
        
     /*Deleting Records*/
     
     $('.delete, .delete-objective').on('click',function(e){
         e.preventDefault();
           var secondThought = confirm("Are you sure you want to delete this record ?");
           if(!secondThought){//if user says no, kill code execution
                return;
           }
           
         var url = $(this).attr('href');
         $.get(url).done(function(msg){
             $('.modal').modal('show')
                    .find('.modal-body')
                    .html(msg.note);
         },'json');
     });
      
    
    /*Evaluate KRA*/
        $('.evalkra').on('click', function(e){
             e.preventDefault();
            var url = $(this).attr('href');
            console.log('clicking...');
            $('.modal').modal('show')
                            .find('.modal-body')
                            .load(url); 

        });
        
        
      //Add  plan Line
    
     $('.add-line, .update-objective').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('clicking...');
        $('.modal').modal('show')
                        .find('.modal-body')
                        .load(url); 

     });
     
     
     //Update a training plan
    
     $('.update-trainingplan').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('clicking...');
        $('.modal').modal('show')
                        .find('.modal-body')
                        .load(url); 

     });
     
     
     //Update/ Evalute Employeeappraisal behaviour -- evalbehaviour
     
      $('.evalbehaviour').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('clicking...');
        $('.modal').modal('show')
                        .find('.modal-body')
                        .load(url); 

     });
      
      /*Add learning assessment competence-----> add-learning-assessment */
      
      
      $('.add-learning-assessment').on('click',function(e){
        e.preventDefault();
        var url = $(this).attr('href');
        console.log('clicking...');
        $('.modal').modal('show')
                        .find('.modal-body')
                        .load(url); 

     });
      
      
     
      
      
      
    
    /*Handle modal dismissal event  */
    $('.modal').on('hidden.bs.modal',function(){
        var reld = location.reload(true);
        setTimeout(reld,1000);
    }); 
        
    /*Parent-Children accordion*/ 
    
    $('tr.parent').find('span').text('+');
    $('tr.parent').find('span').css({"color":"red", "font-weight":"bolder"});    
    $('tr.parent').nextUntil('tr.parent').slideUp(1, function(){});    
    $('tr.parent').click(function(){
            $(this).find('span').text(function(_, value){return value=='-'?'+':'-'}); //to disregard an argument -event- on a function use an underscore in the parameter               
            $(this).nextUntil('tr.parent').slideToggle(100, function(){});
     });
    
    /*Divs parenting*/
    
     $('p.parent').find('span').text('+');
    $('p.parent').find('span').css({"color":"red", "font-weight":"bolder"});    
    $('p.parent').nextUntil('p.parent').slideUp(1, function(){});    
    $('p.parent').click(function(){
            $(this).find('span').text(function(_, value){return value=='-'?'+':'-'}); //to disregard an argument -event- on a function use an underscore in the parameter               
            $(this).nextUntil('p.parent').slideToggle(100, function(){});
     });
    
        //Add Career Development Plan
        
        $('.add-cdp').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
           
            
            console.log('clicking...');
            $('.modal').modal('show')
                            .find('.modal-body')
                            .load(url); 
            
         });//End Adding career development plan
         
         /*Add Career development Strength*/
         
         
        $('.add-cds').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            
            $('.modal').modal('show')
                            .find('.modal-body')
                            .load(url); 
            
         });
         
         /*End Add Career development Strength*/
         
         
         /* Add further development Areas */
         
            $('.add-fda').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
                       
            console.log('clicking...');
            $('.modal').modal('show')
                            .find('.modal-body')
                            .load(url); 
            
         });
         
         /* End Add further development Areas */
         
         /*Add Weakness Development Plan*/
             $('.add-wdp').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
                       
            console.log('clicking...');
            $('.modal').modal('show')
                            .find('.modal-body')
                            .load(url); 
            
         });
         /*End Add Weakness Development Plan*/

         //Change Action taken

         $('select#probation-action_taken').on('change',(e) => {

            const key = $('input[id=Key]').val();
            const Employee_No = $('input[id=Employee_No]').val();
            const Appraisal_No = $('input[id=Appraisal_No]').val();
            const Action_Taken = $('#probation-action_taken option:selected').val();
           
              

            /* var data = {
                "Action_Taken": Action_Taken,
                "Appraisal_No": Appraisal_No,
                "Employee_No": Employee_No,
                "Key": key

             } 
            */
            $.get('./takeaction', {"Key":key,"Appraisal_No":Appraisal_No, "Action_Taken": Action_Taken,"Employee_No": Employee_No}).done(function(msg){
                 $('.modal').modal('show')
                    .find('.modal-body')
                    .html(msg.note);
                });


            });
    
        
    });//end jquery

    

        
JS;

$this->registerJs($script);

$style = <<<CSS
    p span {
        margin-right: 50%;
        font-weight: bold;
    }

    table td:nth-child(11), td:nth-child(12) {
                text-align: center;
    }
    
    /* Table Media Queries */
    
     @media (max-width: 500px) {
          table td:nth-child(2),td:nth-child(3),td:nth-child(6),td:nth-child(7),td:nth-child(8),td:nth-child(9),td:nth-child(10), td:nth-child(11) {
                display: none;
        }
    }
    
     @media (max-width: 550px) {
          table td:nth-child(2),td:nth-child(6),td:nth-child(7),td:nth-child(8),td:nth-child(9),td:nth-child(10), td:nth-child(11) {
                display: none;
        }
    }
    
    @media (max-width: 650px) {
          table td:nth-child(2),td:nth-child(6),td:nth-child(7),td:nth-child(8),td:nth-child(9),td:nth-child(10), td:nth-child(11) {
                display: none;
        }
    }


    @media (max-width: 1500px) {
          table td:nth-child(2),td:nth-child(7),td:nth-child(8),td:nth-child(9),td:nth-child(10), td:nth-child(11) {
                display: none;
        }
    }
CSS;

$this->registerCss($style);
