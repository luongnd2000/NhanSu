<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nhân sự</title>
	<script type="text/javascript" src="<?php echo base_url('assets/vendor/bootstrap.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/1.js');?>"></script>
	<link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/1.css');?>">
</head>
<body>

</div>
	<div class="container">
		<div class="text-xl-center">
			<h3>Nhân sự</h3>
			<hr>
		</div>
		<div class="row" id="content">

			<?php foreach ($records as $value): ?>
				<div class="col-sm-4" id="<?= $value['id']?>">
					<div class="card container" >
						<img src="<?= $value['anhavartar'] ?>" class="card-img-top img-fluid col-sm-5 mx-auto d-block" alt="...">
						<div class="card-body">	
							<!-- <div class="card-block"> -->
							<p class="card-text tuoi"> Tên : <b><?php echo $value['ten'] ?></b> .</p>
							<p class="card-text tuoi"> Tuổi : <b><?php echo $value['tuoi'] ?></b> .</p>
							<p class="card-text sdt"> Số điện thoại : <b><?php echo $value['sdt'] ?></b> .</p>
							<p class="card-text sodonhang"> Số đơn hoàn thành : <?php echo $value['sodonhang'] ?>.</p>
							<p class="card-text linkfb"> <i class="fa fa-facebook-square"><a href="facebook.com"> :<?php echo $value['linkfb'] ?></a></i></>	
							<hr>
							<p class="card-text linkfb"> 
								<a class="btn btn-outline-warning" href="<?php echo base_url() ?>/public/nhansu/Edit/<?php echo $value['id'] ?>"><i class="fa fa-edit"></i></a>
								<button class="btn btn-outline-danger" onclick="DeleteData('<?=$value['id']?>')"><i class="fa fa-minus-square"></i></button>
							</p>	
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
						<!-- </div> -->
					</div>
				</div>
			<?php endforeach ?>
		</div>

	</div>

	<div class="container">
		<div class="text-xl-center">
			<h3>Nhập nhân sự</h3>
			<hr>
		</div>


		<div class="col-sm-6 ">	
			<div class="form-group ">
				<label for="anh">Ảnh avartar</label>
				<input id="anhavartar" name="file" type="file" class="form-control" >
			</div>
			<div class="form-group">
				<label >Tên</label>
				<input id= "ten" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên của nhân viên ">
			</div>
			<div class="form-group">
				<label for="tuoi">Tuổi</label>
				<input id="tuoi" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tuổi của nhân viên ">
			</div>
			<div class="form-group">
				<label for="sdt">Số điện thoại</label>
				<input id="sdt" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại của nhân viên ">
			</div>
			<div class="form-group">
				<label for="sodonhang">Số đơn hoàn thành</label>
				<input id="sodonhang" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số đơn hoàn thành của nhân viên ">
			</div>
			<div class="form-group">
				<label for="sdt">Link Fb</label>
				<input id="linkfb" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số điện thoại của nhân viên ">
			</div>
			<div class="form-group text-xl-center">
				<button type="button" class="btn btn-outline-success " id="AddButton">Thêm mới<i></i></button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function DeleteData(id){
			// alert(id);
			var fd= new FormData();
			fd.append('id',id);
			$.ajax({
				url: '<?php echo base_url(); ?>/public/nhansu/DeleteData',
				type: 'post',
				data: fd,
				contentType:false,
				processData:false,
				success:function(response){
					if(response){
						document.getElementById(id).remove();
						alert("Delete success");
					}
				}
			})
		}
		$('#AddButton').click(function(event) {
			/* Act on the event */
			var myfile=new FormData();
			myfile.append('file',$('#anhavartar')[0].files[0]);
			$.ajax({
				url: '<?php echo base_url(); ?>/public/nhansu/UploadFile',
				type: 'post',
				data: myfile,
				contentType: false,
				processData: false,
				success: function(response){
					if(response){
						anhavartar=response;
						var datas=new FormData();
						datas.append('ten',$('#ten').val());
						datas.append('tuoi',$('#tuoi').val());
						datas.append('sdt',$('#sdt').val());
						datas.append('sodonhang',$('#sodonhang').val());
						datas.append('linkfb',$('#linkfb').val());
						datas.append('anhavartar',response);
						$.ajax({
							url:'<?php echo base_url(); ?>/public/nhansu/InsertData',
							type:'post',
							data: datas,
							contentType:false,
							processData:false,
							success:function(response){
							}
						})
						.done(function(){
							console.log("success");
						})
						.fail(function(){
							console.log("error");
						})
						.always(function(){
							console.log("complete");
							content='<div class="col-sm-4">';
							content+='<div class="card">'
							content+='<img src="'+response+'" class="card-img-top img-fluid col-sm-5 mx-auto d-block" alt="...">'
							content+='<div class="card-block">'
							content+='<p class="card-text tuoi"> Tên : <b>'+$('#ten').val()+'</b> .</p>'
							content+='<p class="card-text tuoi"> Tuổi : <b>'+$('#tuoi').val()+'</b> .</p>'
							content+='<p class="card-text sdt"> Số điện thoại : <b>'+$('#sdt').val()+'</b> .</p>'
							content+='<p class="card-text sodonhang"> Số đơn hoàn thành : '+$('#sodonhang').val()+'.</p>'
							content+='<p class="card-text linkfb"> <i class="fa fa-facebook-square"><a href="facebook.com"> :'+$('#linkfb').val()+'</a></i></p>'
							content+='<hr>'
							content+='<p class="card-text linkfb">'
							content+='<a href="" class="btn btn-outline-warning"><i class="fa fa-edit"></i></a>'
							content+=' <a href="" class="btn btn-outline-danger"><i class="fa fa-minus-square"></i></a>'
							content+='</p>'
							content+='<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>'
							content+='</div>'
							content+='</div>'
							content+='</div>'
							$('#content').append(content);
							$('#ten').val('');
							$('#tuoi').val('');
							$('#sdt').val('');
							$('#linkfb').val('');
							$('#sodonhang').val('');
							$('#anhavartar').val('');
						})
					}
				}
			});			
		});
	</script>
</body>
</html>