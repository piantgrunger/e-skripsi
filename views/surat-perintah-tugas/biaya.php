<?php
use yii\widgets\ActiveForm;

?>
<div>

<div class="panel panel-info"   >
<div class="panel-heading"> <strong> Data Realisasi Biaya <?=$model->nama_personil; ?></strong>

</div>

<?php
$form = ActiveForm::begin(); ?>
    <table id="table-detail" class="table table-condensed table-bordered table-hover table-stripped">
    <thead>
        <tr class="active">
           
           <th>Biaya</th>
           <th>Anggaran</th>
           <th>Durasi</th>
           <th>Total</th>
           <th>Realisasi</th>
          


        </tr>
        <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid2',
        'allModels' => $model->subDetPerintahTugas,
        'model' => \app\models\SubSuratPerintahTugas::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item_biaya',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ],
    ]);
    ?>

    </thead>
    

    </table>
    <?ActiveForm::end() ?>
 </div>   
 </div>