<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Addetails */

$this->title = 'Create Addetails';
$this->params['breadcrumbs'][] = ['label' => 'Addetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addetails-create">

    <h1><?php //Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
