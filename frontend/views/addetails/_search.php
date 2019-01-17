<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AddetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="addetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'seller_name') ?>

    <?php // echo $form->field($model, 'seller_email') ?>

    <?php // echo $form->field($model, 'seller_phone_number') ?>

    <?php // echo $form->field($model, 'location') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'active_flag') ?>

    <?php // echo $form->field($model, 'is_accept') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
