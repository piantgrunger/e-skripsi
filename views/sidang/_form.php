<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Skripsi */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
$url = \yii\helpers\Url::to(['skripsi/skripsi-list']);
 
// The widget
use yii\web\JsExpression;
use app\models\Mahasiswa;
use yii\helpers\ArrayHelper;
 

?>

<div class="skripsi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
        <div class="row">
        <label class="control-label text-right col-md-3">Skripsi</label>

          <?php if(Yii::$app->controller->action->id  === 'create') { ?> 
        <div class="col-md-7">
  
        <?= $form->field($model, 'id_skripsi') ->widget(Select2::classname(), [
 // set the initial display text
   'initValueText' => $model->nim ." - ".$model->judul_skripsi , // set the initial display text
    'options' => ['placeholder' => 'Cari Judul Skripsi / NIM mahasiwa ...'],
'pluginOptions' => [
    'allowClear' => true,
    'minimumInputLength' => 4,
    'language' => [
        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
    ],
    'ajax' => [
        'url' => $url,
        'dataType' => 'json',
        'data' => new JsExpression('function(params) { return {q:params.term}; }')
    ],
    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
    'templateResult' => new JsExpression('function(city) { return city.text; }'),
    'templateSelection' => new JsExpression('function (city) { return city.text; }'),
],
])->label(false); ?>
</div>

          <?php } else { ?>
           
 <label class="control-label col-md-7">  <?=  $model->nim." - ".$model->judul_skripsi; ?> </label>
          
          
          <?php } ?>
                   
</div>
                       <div class="row">
        <label class="control-label text-right col-md-3">Tanggal Sidang</label>
        <div class="col-md-7">
          <?= $form->field($model, 'tanggal_sidang')->widget(DateControl::classname())->label(false); ?>
            
               
</div>
         
</div>
               <div class="row">
        <label class="control-label text-right col-md-3">Jam Sidang</label>
        <div class="col-md-7">
          <?= $form->field($model, 'jam_sidang')->widget(DateControl::classname(),[
    'type'=>DateControl::FORMAT_TIME
])->label(false); ?>
            
               
</div>

          
         
</div>

          <div class="row">
        <label class="control-label text-right col-md-3">Ruang Sidang</label>
        <div class="col-md-7">
          <?= $form->field($model, 'id_ruang')->widget(Select2::classname(),[
    'data'=> ArrayHelper::map( \app\models\Ruang::find()->asArray()->all(),'id','nama')
,
'options' => ['prompt' => 'Pilih Ruang Sidang...',]
])->label(false); ?>
            
               
</div>

          
         
</div>


<div class="x_title">
             
             <h4 class="card-title">Penguji</h4>
         </div>

         <table class="table">
    <thead>
        <tr>
           
            <th width="80%">Dosen</th>
           

            <th><a id="btn-add2" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->detailskripsipengujis,
        'model' => \app\models\Detailskripsipenguji::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ]
    ]);
    ?>
    </table>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
