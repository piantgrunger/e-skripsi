<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\Personil */

$this->title = $model->nip;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Personil'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personil-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
             <?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>        <?= Html::a(Yii::t('app', 'Ubah'), ['update', 'id' => $model->id_personil], ['class' => 'btn btn-primary']) ?>
        <?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>        <?= Html::a(Yii::t('app', 'Hapus'), ['delete', 'id' => $model->id_personil], [
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
            'nip',
            'nama_personil',
            'status_personil',
            'golongan',
            'id_pangkat',
            'setuju',
            'mengetahui',
            'lunas',
            'tanda_tangan_surat',
        ],
    ]) ?>

</div>
