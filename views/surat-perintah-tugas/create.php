<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SuratPerintahTugas */

$this->title = Yii::t('app', 'Surat Perintah Tugas Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Perintah Tugas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-perintah-tugas-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
