<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LevelJabatan;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use yii\helpers\Url;
use app\models\Personil;

?>
<td>
<?=$key?>
</td>
<td>
<?= $form->field($model, "[$key]id_personil")->hiddenInput()->label(false) ?><?= $model->nama_personil;?>
</td>
<td><?= $model->pangkat;?></td>
<td><?=$model->status_personil;?>
</td>
<td>
<?=$model->jenis?>
<?= $form->field($model, "[$key]jenis")->hiddenInput()->label(false) ?>

</td>
 <td>
<?= $form->field($model, "[$key]id_d_spt")->hiddenInput()->label(false) ?>

    <a data-action="delete" id='delete2'><span class="glyphicon glyphicon-trash">
</td>
