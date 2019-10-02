<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

</head>
<body>
	<?php 
	function formattgl($tanggal){
		$bulan = [1 =>'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2]. ' '.$bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
	}
	?>
	<br>
	<style>
	.bt{border-top: 1px solid black;}
	.bb{border-bottom: 1px solid black;}
	.bl{border-left: 1px solid black;}
	.br{border-right: 1px solid black}
	.btd{border-top: 1px dotted black;}
	.bld{border-left: 1px dotted black;}
	.brd{border-right: 1px dotted black}
	.cw{color:white;}
</style>
<div class="container">
  <table>
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th> 
        <th colspan="1" class=" pl-1 pr-">Jakarta, <?= formattgl(date('Y-m-d')) ?></th>
      </tr>
      <tr class="text-center">
        <th class="pl-4 pr-4 cw">.</th>
        <th colspan="2" class="cw" style="padding-left: 85px;padding-right: 85px">.</th>
        <th colspan="2"class=" " style="padding-left: 35px;padding-right: 35px">Diketahu Oleh</th>
      </tr>
      <tr>
        <th class="cw">.</th>
        <th class="cw">.</th>
        <th class="cw">.</th>
        <th class="cw ">.</th>
      </tr>
      <tr>
        <th class="cw">.</th>
        <th class="cw">.</th>
        <th class="cw">.</th>
        <th class="cw ">.</th>
      </tr>
      <tr>
        <th class="cw">.</th>
        <th class="cw">.</th>
        <th class="cw">.</th>
        <th class="cw ">.</th>
      </tr>
      <tr>
        <th class="text-center cw " >.</th>
        <th class="text-center pl-4 pr-4 cw" >Siska Puspita</th>
        <th class="text-center pl-3 pr-3 cw" >Fitri Wahyuni</th>
        <th class="text-center bb" >Nur Muhammad Syafei</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th colspan="1" class="text-center cw"><?= "."; ?></th>
        <th colspan="1" class="text-center cw"><?= "."; ?></th>
        <th colspan="1" class="text-center cw"><?= "MR"; ?></th>
        <th colspan="1" class="text-center "><?= "Ketua Administrasi"; ?></th>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>