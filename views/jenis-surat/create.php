<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisSurat */

$this->title = Yii::t('app', 'Jenis Surat Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Jenis Surat'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-surat-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
