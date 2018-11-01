<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AlatKelengkapan */

$this->title = Yii::t('app', 'Alat Kelengkapan Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Alat Kelengkapan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-kelengkapan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
