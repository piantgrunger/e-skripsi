<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Skripsi */
/* @var $form yii\widgets\ActiveForm */
use kartik\select2\Select2;
use kartik\date\DatePicker;// The controller action that will render the list
$url = \yii\helpers\Url::to(['skripsi/nim-list']);
 
// The widget
use yii\web\JsExpression;
use app\models\Mahasiswa;
 

$Desc = empty($model->nim) ? '' : $model->nim." - ".Mahasiswa::find()->where(['nim'=>$model->nim])->one()->nama;
?>

<div class="skripsi-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->
        <div class="row">
        <label class="control-label col-md-3">Mahasiswa</label>
        <div class="col-md-7">

        <?= $form->field($model, 'nim') ->widget(Select2::classname(), [
    'initValueText' => $Desc, // set the initial display text
    'options' => ['placeholder' => 'Cari Mahasiswa ...'],
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
</div>

<div class="row">
<label class="control-label col-md-3">Judul Skripsi</label>
        <div class="col-md-7">

    <?= $form->field($model, 'judul_skripsi')->textarea(['rows' => 6])->label(false) ?>

    </div>
</div>


<div class="x_title">
             
             <h4 class="card-title">Pembimbing</h4>
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
        'allModels' => $model->detailskripsipembimbings,
        'model' => \app\models\Detailskripsipembimbing::className(),
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
