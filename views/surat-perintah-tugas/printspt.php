<?php
use yii\helpers\Url;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
    <td width="100%" height="56" colspan="3" align="left" valign="top"><img src="<?=Url::to(["/image/Kop1.png"])?>" width="706" height="145" /></td>

  </tr>
</table>
<table width="708" height="954" border="0" cellpadding="3" cellspacing="0">
  <tr>
    <td colspan="13" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="22" colspan="13" align="center" class="judul"><strong>SURAT PERINTAH TUGAS </strong></td>
  </tr>
  <tr class="isi">
    <td height="21" colspan="13" align="center">Nomor :&nbsp;<?php echo $model->no_spt; ?></td>
  </tr>
  <tr>
    <td height="18" colspan="13">&nbsp;</td>
  </tr>
  <tr class="isi">
    <td width="56" height="18" align="right">&nbsp;</td>
    <td align="left" valign="top">Dasar</td>
    <td align="left" valign="top">:</td>
    <td colspan="10" align="left" valign="top" style="padding-left:3px;"><?php echo $model->dasar; ?></td>
  </tr>
  <tr>
    <td colspan="13" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td height="22" colspan="13" align="center" class="judul"><strong>MEMERINTAHKAN</strong></td>
  </tr>
  <tr class="isi">
    <td height="23" align="right">&nbsp;</td>
    <td width="107" align="left" valign="top">Kepada</td>
    <td width="35" align="left" valign="top">:</td>
    <td colspan="10" align="left" valign="top">
      <?php
        $i = 0;
        foreach ($model->detailSuratPerintahTugas as $key => $row) {
            ++$i; ?>
      <div class="container">
      <div style="">
        <div style="float:left"><?php echo $i.'.'.'&nbsp;'; ?></div>
        <div>Nama : <?php echo $row->nama_personil; ?></div>
        <?php if ($row->status_personil !== 'Dewan') {
                ?>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;NIP : <?php echo $row->nip; ?></div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Pangkat/Golongan : <?php echo $row->pangkat; ?></div>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;Jabatan : <?php echo $row->jenis; ?></div>
        <?php
            } ?>
        <div>&nbsp;&nbsp;&nbsp;&nbsp; </div>

        </div>
      <?php
        } ?>    </td>
  </tr>


  <tr>
    <td height="18" colspan="13">&nbsp;</td>
  </tr>
  <tr class="isi">
  	<td height="18" align="right">&nbsp;</td>
  	<td align="left" valign="top">Untuk</td>
  	<td align="left" valign="top">:</td>
    <td colspan="13"><?php echo $model->untuk; ?>, pada :</td>
  </tr>
  <tr class="isi">
    <td height="18" colspan="3">&nbsp;</td>
    <td colspan="2">Hari</td>
    <td>:</td>
    <td colspan="10" align="left">
      <div style="float:left">
        <?php
        $tglHari = $model->tgl_awal;
        $tglHari2 = $model->tgl_akhir;
        $day = date('D', strtotime($tglHari));
        $day2 = date('D', strtotime($tglHari2));
        //echo $day;
        $daftarHari = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu',
        );
        echo $daftarHari[$day];
    ?>
    </div>
    <div style="float:left"> <?php echo ($tglHari!==$tglHari2)? "&nbsp;-".$daftarHari[$day2] :""; ?></div></td>
  </tr>
  <tr class = "isi">
    <td height="18" colspan="3">&nbsp;</td>
    <td colspan="2">tgl</td>
    <td width="5">:</td>
    <td colspan="13" align="left">
      <div style="float:left">
        <?php
    //echo date('d F Y', strtotime($model->tgl_awal))
        /*$tglHari = $row["tgl_awal"];
        $tglHari2 = $row["tgl_akhir"];
         $bulan = array(
                    '01' => 'Januarti',
                    '02' => 'Februari',
                    '03' => 'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
            );
            $bulan[date('m')];
            echo date('d', strtotime($model->tgl_awal)).'  '.(ucfirst($bulan[date('m')])).'  '.date('Y');
            $format1 = date('d F Y', strtotime($model->tgl_akhir));
 echo $format1;*/
        //echo date('d', strtotime($model->tgl_akhir)).'  '.(ucfirst($bulan[date('m')])).'  '.date('Y');
    function tgl_indo($tgl, $cetak_hari = false)
    {
        $hari = array(1 => 'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu',
            );

        $bulan = array(1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            );
        $split = explode('-', $tgl);
        //      echo "tgl:". $tgl ."##";
        $tgl_indo = $split[2].' '.$bulan[(int) $split[1]].' '.$split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tgl));

            return $hari[$num].', '.$tgl_indo;
        }

        return $tgl_indo;
    }
$tgl = date('Y-m-d', strtotime($model->tgl_awal));
$tglSurat = date('Y-m-d', strtotime($model->tgl_surat));
$tglDoang = date('d', strtotime($model->tgl_awal));
$tgl2 = date('Y-m-d', strtotime($model->tgl_akhir));
$bulanSaja1 = date('m', strtotime($model->tgl_awal));
$bulanSaja2 = date('m', strtotime($model->tgl_akhir));
/*
if ($bulanSaja1 == $bulanSaja2) {
    $batas = tgl_indo($tglDoang, false);
} else {
    $batas = tgl_indo($tgl, false);
}
*/
//echo "Batas:". $batas;
    ?>
      </div>
      <div style="float:left"> <?php echo tgl_indo($tgl, false); ?>&nbsp;-&nbsp; <?php echo tgl_indo($tgl2, false); ?>
    </div></td>
  </tr>
  <tr class = "isi">
    <td height="18" colspan="3">&nbsp;</td>
    <td colspan="2" valign="top">Tujuan</td>
    <td valign="top">:</td>
    <td colspan="7" align="left" valign="top"><?php echo nl2br(stripcslashes($model->tujuan)); ?></td>
  </tr>

  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr class = "isi">
    <td height="16" colspan="1">&nbsp;</td>
    <td colspan="12">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian agar yang bersangkutan melaksanakan tugas dengan penuh tanggung jawab dan</td>
  </tr>
  <tr>
    <td height="16" colspan="13" class = "isi"> &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;segera melaporkan hasilnya.</td>
  </tr>
  <tr>
    <td height="18" colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td height="18" colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td height="18" colspan="13">&nbsp;</td>
  </tr>
  <tr class = "isi">
    <td height="16" colspan="11" align="right">Ditetapkan di&nbsp;&nbsp;</td>
    <td colspan="2">:&nbsp;S I D O A R J O</td>
  </tr>
  <tr class = "isi">
    <td height="18" colspan="11" align="right">Pada tgl&nbsp;</td>
    <td colspan="2">:&nbsp;<?php echo tgl_indo($tglSurat, false); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td width="46">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="16">&nbsp;</td>
    <td width="165">&nbsp;</td>
    <td width="26">&nbsp;</td>
    <td width="158">&nbsp;</td>
  </tr>
  <tr style="font-size:9px">
    <td height="16">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="right">KETUA DEWAN PERWAKILAN RAKYAT DAERAH</td>
  </tr>
  <tr style="font-size:9px">
    <td height="16">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="right">KABUPATEN SIDOARJO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr style="font-size:9px">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="right">&nbsp;</td>
  </tr>
  <tr style="font-size:9px">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="right">&nbsp;</td>
  </tr>
  <tr style="font-size:9px">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="right">&nbsp;</td>
  </tr>
  <tr style="font-size:9px">
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" align="right"><?php echo $model->penanda_tangan; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
  <tr class ="isi">
    <td colspan="9">&nbsp;</td>
    <td align="center"></td>
    <td colspan="2" align="center"></td>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr class = "isi">
    <td colspan="7">&nbsp;</td>
    <td colspan="5" align="center">&nbsp;</td>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr class = "isi">
    <td colspan="7">&nbsp;</td>
    <td colspan="5" align="center">&nbsp;</td>
    <td colspan="4" align="center"></td>
  </tr>
  <tr class = "isi">
    <td colspan="7">&nbsp;</td>
    <td colspan="5" align="center">&nbsp;</td>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="13">&nbsp;</td>
  </tr>
  <tr class = "isi">
    <td colspan="7">&nbsp;</td>
    <td colspan="5" align="center"></td>
    <td colspan="4" align="center"></td>
  </tr>
</table>
</body>
</html>