<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GallerySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'gallery_id') ?>

    <?= $form->field($model, 'gallery_category_id') ?>

    <?= $form->field($model, 'language_id') ?>

    <?= $form->field($model, 'gallery_type') ?>

    <?= $form->field($model, 'gallery_url') ?>

    <?php // echo $form->field($model, 'delete_flag') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <?php // echo $form->field($model, 'gallery_order') ?>

    <?php // echo $form->field($model, 'gallery_image_title') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
