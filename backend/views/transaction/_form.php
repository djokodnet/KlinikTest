<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Transaction $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'doctor_id')->textInput() ?>

    <?= $form->field($model, 'treatment_id')->textInput() ?>

    <?= $form->field($model, 'medicine_id')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transaction_date')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
