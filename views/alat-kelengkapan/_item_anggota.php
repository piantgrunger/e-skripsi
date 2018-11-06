<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LevelJabatan;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use app\models\Personil;

$data = ArrayHelper::map(Personil::find()->select(['id_personil','nama_personil'])->asArray()->all(), 'id_personil', 'nama_personil');

?>
<td>
<?= $form->field($model, "[$key]id_personil")->widget(Select2::className(), [
    'data' => $data,
    'options' => ['placeholder' => 'Pilih Personil...' ,
            'onChange' => "$.post( '" . Url::to(['alat-kelengkapan/personil']) . "?id=' +$(this).val(), function(data) {
                                                  data1 = JSON.parse(data)
                                                  console.log(data1.nama_pangkat);
                                                  $( '#detalatkelengkapan-$key-pangkat' ).val(data1.nama_pangkat);
                                                  $( '#detalatkelengkapan-$key-status_personil' ).val(data1.status_personil);
            })
"
        ,

],
    'pluginOptions' => [
        'allowClear' => true,
    ],
])->label(false) ?>
</td>
<td><?= $form->field($model, "[$key]pangkat")->textInput(["readOnly"=>true])->label(false) ?></td>
<td><?= $form->field($model, "[$key]status_personil")->textInput(["readOnly" => true])->label(false) ?></td>
<td>

<?= $form->field($model, "[$key]jenis")->dropDownList([
    'Ketua DPRD' => 'Ketua DPRD',
    'Wakil Ketua DPRD' => 'Wakil Ketua DPRD',

    'KETUA' => 'Ketua', 'WAKIL KETUA' => 'Wakil Ketua',
'SEKRETARIS' =>'Sekretaris','ANGGOTA' =>'Anggota','STAFF' =>'Staff'
], ['prompt' =>''])->label(false) ?>

</td>
 <td>

    <a data-action="delete" id='delete2'><span class="glyphicon glyphicon-trash">
</td>
