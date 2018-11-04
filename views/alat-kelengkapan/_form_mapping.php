<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\grid\GridView;

$gridColumns = [
    ['class' => 'kartik\grid\SerialColumn'],
    'nip',
    'nama_personil',
    'status_personil',
    'nama_pangkat',
            // 'id_pangkat',
            // 'setuju',
            // 'mengetahui',
            // 'lunas',
            // 'tanda_tangan_surat',

    [
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{Add}',
        'buttons' => [
            'Add' => function ($url, $model) {
                return Html::a(
                    '<span class="glyphicon glyphicon-plus"></span>',
                    '#',
                    [
                        'title' => Yii::t('app', 'Tambah'),
                        'id' => $model->id_personil,
                        'class' => 'add_detail'
                    ]
                );
            },
        ]

    ],


];


/* @var $this yii\web\View */
/* @var $model app\models\AlatKelengkapan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alat-kelengkapan-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

    <?= $form->field($model, 'alat_kelengkapan')->textInput(['readOnly' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['readOnly' => true])  ?>
<div class="row">
<div class="col-sm-12">
<div class="panel panel-info"   >
<div class="panel-heading"> <strong> Anggota Alat Kelengkapan</strong>

</div>
<table class="table table-bordered table-hover kv-grid-table kv-table-wrap">
    <thead>
        <tr class="active">
           <th>Nama</th>
           <th>Pangkat</th>
           <th>Status</th>
           <th>Jabatan</th>
                   <th><a id="btn-add2" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>

        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid2',
        'allModels' => $model->detailAlatKelengkapan,
        'model' => \app\models\DetAlatKelengkapan::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_anggota',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ],
    ]);
    ?>
    </table>

</div>




</div>
</div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>