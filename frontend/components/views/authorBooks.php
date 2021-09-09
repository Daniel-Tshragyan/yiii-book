<?php

use common\models\Book;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ArrayDataProvider;
use common\models\BookSearch;

/* @var $this yii\web\View */
$searchModel = new BookSearch();


$dataProvider = new ArrayDataProvider([
    'allModels' => $books,
    'pagination' =>[
        'pageSize' => 3
    ]
]);
?>
<div class="book-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'title',
        ],
    ]); ?>


</div>
