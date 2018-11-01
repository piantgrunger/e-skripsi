<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\AlatKelengkapan */

$this->title = $model->id_alat_kelengkapan;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Alat Kelengkapan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alat-kelengkapan-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_alat_kelengkapan], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_alat_kelengkapan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Apakah Anda yakin ingin menghapus item ini??'),
                'method' => 'post',
            ],
        ]) ?>
        <?php } ?>    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'alat_kelengkapan',
            'tahun',
        ],
    ]) ?>

</div>
