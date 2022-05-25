<?php
$con = mysqli_connect("localhost","root","","indonesia");
	switch ($_GET['jenis']) {
		//ambil data kota / kabupaten
		case 'kota':
		$id_provinces = $_POST['id_provinces'];
		if($id_provinces == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($con,"SELECT  * FROM ec_cities WHERE prov_id ='$id_provinces'");
		     while($data = mysqli_fetch_assoc($getcity)){
		          echo '<option value="'.$data['city_id'].'">'.$data['city_name'].'</option>';
		     }
		     exit;    
		}
		break;

		//ambil data kecamatan
		case 'kecamatan':
		$id_regencies = $_POST['id_regencies'];
		if($id_regencies == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($con,"SELECT  * FROM ec_districts WHERE city_id ='$id_regencies'");
		     while($data = mysqli_fetch_assoc($getcity)){
		          echo '<option value="'.$data['dis_id'].'">'.$data['dis_name'].'</option>';
		     }
		     exit;    
		}
		break;
		

		//ambil data kelurahan
		case 'kelurahan':
		$id_district = $_POST['id_district'];
		if($id_district == ''){
		     exit;
		}else{
		     $getcity = mysqli_query($con,"SELECT  * FROM ec_subdistricts WHERE dis_id ='$id_district'");
		     while($data = mysqli_fetch_assoc($getcity)){
		          echo '<option value="'.$data['subdis_id'].'">'.$data['subdis_name'].'</option>';
		     }
		     exit;    
		}
		break;

		case 'kode_pos':
			$id_pos = $_POST['id_pos'];
			if($id_pos == ''){
				 exit;
			}else{
				 $getcity = mysqli_query($con,"SELECT  * FROM ec_postalcode WHERE subdis_id =$id_pos");
				 while($data = mysqli_fetch_assoc($getcity)){
					  echo '<option value="'.$data['postal_id'].'">'.$data['postal_code'].'</option>';
				 }
				 exit;    
			}
			break;
		
	}
?>