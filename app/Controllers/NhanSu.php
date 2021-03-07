<?php
namespace App\Controllers;

class NhanSu extends \CodeIgniter\Controller
{
	public function index()
	{
		$this->GoToHomePage();
	}
	public function GoToHomePage(){
		$mymodel=model('app\models\nhansu_model',false);
		$records=$mymodel->findAll();
		$records=array('records'=>$records);
		// echo "<pre>";
		// var_dump($records);
		echo view('nhansu_view',$records);
	}
	public function InsertData(){
		// var_dump($_POST);
		$ten=$_POST["ten"];
		$tuoi=$_POST["tuoi"];
		$sdt=$_POST["sdt"];
		$linkfb=$_POST["linkfb"];
		$sodonhang=$_POST["sodonhang"];
		$anhavartar=$_POST["anhavartar"];
		echo "<br>".$ten;
		echo "<br>".$tuoi;
		echo "<br>".$sdt;
		echo "<br>".$linkfb;
		echo "<br>".$sodonhang;

		$datas=[
			'ten'=>$ten,
			'tuoi'=>$tuoi,
			'sdt'=>$sdt,
			'linkfb'=>$linkfb,
			'sodonhang'=>$sodonhang,
			'anhavartar'=>$anhavartar
		];
		// var_dump($datas);	
		$mymodel=model('app\models\nhansu_model',false);
		$mymodel->insert($datas);
	}
	public function DeleteData(){
		$id=$_POST['id'];
		$mymodel=model('app\models\nhansu_model',false);
		$success = $mymodel->delete($id);
		$success=$success->connID->affected_rows;
		echo $success;
	}
	public function UploadFile()
	{
		// var_dump($_FILES);
		$file = $this->request->getFile("file");
		$filename=$file->getRandomName();
		$location="uploads/";
		$file->move($location,$filename);
		$avtpath=base_url().'/public/'.$location.$filename;
		echo $avtpath;
	}
	public function Edit($id){
		$mymodel=model('app\models\nhansu_model',false);
		$records=$mymodel->find($id);
		$records=array('records'=>$records);
		// echo "<pre>";
		// var_dump($records);
		echo view('EditView',$records);
	}
	public function UpdateRecord($id){
		// echo $id;
		$ten=$_POST['ten'];
		$tuoi=$_POST['tuoi'];
		$sdt=$_POST['sdt'];
		$sodonhang=$_POST['sodonhang'];
		$linkfb=$_POST['linkfb'];
		$data=array(
			'ten'=>$ten,
			'tuoi'=>$tuoi,
			'sdt'=>$sdt,
			'sodonhang'=>$sodonhang,
			'linkfb'=>$linkfb
		);
		$file = $this->request->getFile("file");

		if($file->getName()){
			echo "Add new file : ".$file->getName();
			$filename=$file->getRandomName();
			$location="uploads/";
			$file->move($location,$filename);
			$avtpath=base_url().'/public/'.$location.$filename;
			$data=array(
				'ten'=>$ten,
				'tuoi'=>$tuoi,
				'sdt'=>$sdt,
				'sodonhang'=>$sodonhang,
				'linkfb'=>$linkfb,
				'anhavartar'=>$avtpath
			);
		}
		$mymodel=model('app\models\nhansu_model',false);
		$mymodel->update($id,$data);

		// var_dump($data);

		echo '<script type="text/javascript">alert("Đã lưu lại.")</script>';
		$this->GoToHomePage();
		// echo $ten;
	}
}