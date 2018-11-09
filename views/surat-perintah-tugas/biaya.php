<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$js = <<< JS

$('#form-biaya').on('beforeSubmit', function(e) {
var form = $(this);
var formData = form.serialize();
$.ajax({
    url: form.attr("action"),
    type: form.attr("method"),
    data: formData,
    success: function (data) {
        
        alert('Test');
    },
    error: function () {
        alert("Something went wrong");
    }
    return false; // prevent default submit

});
}).on('submit', function(e){
    console.log('masuk');
  e.preventDefault();
  console.log('gagal');
});
JS;
$this->registerJS($js);
?>
<div>
<?php Pjax::begin(); ?>
<div class="panel panel-info"   >
<div class="panel-heading"> <strong> Data Realisasi Biaya <?=$model->nama_personil; ?></strong>

</div>

<?php
$form = ActiveForm::begin([
    'options' => [
        'id' => 'form-biaya',
        'options' => ['data-pjax' => true],
    ],
]); ?>
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
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']); ?>
    </div>

    <?=$form->field($model, 'id_d_spt')->hiddenInput()->label(false); ?>




    <?php ActiveForm::end(); ?>
 </div>   
 </div>
 <?php Pjax::end(); ?>