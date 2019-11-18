<?php
use kartik\select2\Select2;
use kartik\date\DatePicker;// The controller action that will render the list
$url = \yii\helpers\Url::to(['skripsi/nip-list']);
 
// The widget
use yii\web\JsExpression;
use app\models\Dosen;
 

$Desc = empty($model->nip_dosen) ? '' : $model->nip_dosen." - ".Dosen::find()->where(['nip'=>$model->nip_dosen])->one()->nama;
?>

<td>

<?= $form->field($model, "[$key]nip_dosen") ->widget(Select2::classname(), [
    'initValueText' => $Desc, // set the initial display text
    'options' => ['placeholder' => 'Cari Dosen Pembimbing ...'],
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
])->label(false);?>
</td>
<td>

<a data-action="delete" id='delete3'  class="btn btn-danger">Hapus</a>
</td>