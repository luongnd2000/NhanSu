<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
		<script type="text/javascript" src="<?php echo base_url('assets/vendor/bootstrap.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/1.js');?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/1.css');?>">
</head>
<body>
	<div class="container">
		<div class="text-xl-center">
			<h3>Sửa nhân sự</h3>
			<hr>
		</div>
		<div class="col-sm-6 ">	
			<form action="<?php echo base_url() ?>/public/nhansu/updaterecord/<?php echo $records['id'] ?>" method="post" enctype="multipart/form-data" >
				
			<div class="form-group">
				<img src="<?php echo $records['anhavartar'] ?>" alt="avartar" class="col-sm-4 ">
			</div>
			<div class="form-group ">
				<label for="anh">Ảnh avartar</label>
				<input id="anhavartar" name="file" type="file" class="form-control" >
			</div>
			<div class="form-group">
				<label >Tên : </label>
				<input id= "ten" name="ten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên của nhân viên " value="<?php echo $records['ten'] ?>">
			</div>
			<div class="form-group">
				<label for="tuoi">Tuổi</label>
				<input id="tuoi" name="tuoi" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tuổi của nhân viên " value="<?php echo $records['tuoi'] ?>">
			</div>
			<div class="form-group">
				<label for="sdt">Số điện thoại</label>
				<input id="sdt" name="sdt"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại của nhân viên " value="<?php echo $records['sdt'] ?>">
			</div>
			<div class="form-group">
				<label for="sodonhang">Số đơn hoàn thành</label>
				<input id="sodonhang" name="sodonhang" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số đơn hoàn thành của nhân viên " value="<?php echo $records['sodonhang'] ?>">
			</div>
			<div class="form-group">
				<label for="sdt">Link Fb</label>
				<input id="linkfb" name="linkfb" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại của nhân viên " value="<?php echo $records['linkfb'] ?>">
			</div>
			<div class="form-group text-xl-center">
				<button type="submit" class="btn btn-outline-success " id="AddButton">Lưu lại<a href=""></a><i></i></button>
			</div>
			</form>
		</div>	</div>
</body>
</html>