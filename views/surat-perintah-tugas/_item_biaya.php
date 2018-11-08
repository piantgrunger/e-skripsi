

<td>
<?=$model->nama_biaya; ?>

</td>
<td>

<?= $model->anggaran; ?></td>
<td>
&nbsp;
<?= $model->durasi; ?> Hari</td>
<td>
&nbsp;
<?= $model->durasi * $model->anggaran; ?> </td>

<td>
<?=$form->field($model, "[$key]realisasi")->textInput()->label(false); ?>



</td>
<td><?=$form->field($model, "[$key]nama_biaya")->hiddenInput()->label(false); ?></td>
<?=$form->field($model, "[$key]anggaran")->hiddenInput()->label(false); ?></td>
