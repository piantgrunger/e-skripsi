<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Detailskripsipembimbing */

$this->title = Yii::t('app', 'Detailskripsipembimbing  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Detailskripsipembimbing'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailskripsipembimbing-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>