<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SuratKeluar */

$this->title = Yii::t('app', 'Surat Keluar Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Surat Keluar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="surat-keluar-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
