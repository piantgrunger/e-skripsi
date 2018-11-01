<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kota */

$this->title = Yii::t('app', 'Kota Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Kota'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kota-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
