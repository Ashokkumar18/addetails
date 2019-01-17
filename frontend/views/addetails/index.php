<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Addetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="addetails-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Addetails', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'title',
            'description:ntext',
            'amount',
            //'seller_name',
            //'seller_email:email',
            //'seller_phone_number',
            //'location',
            //'address',
            //'active_flag',
            //'is_accept',
            //'created_date',
            //'updated_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
