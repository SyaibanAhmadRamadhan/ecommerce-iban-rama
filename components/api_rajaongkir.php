<?php 

switch ($_GET['jenis']){
    case 'provinsi';
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 280ce9f4fdf58e75607880f0bdb67827"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    //   echo $response;
        // dapatkan dalam bentuk json (konversi ke arraydlu)
        $ARRAYrespose = json_decode($response,TRUE);
        $data_provinsi=($ARRAYrespose['rajaongkir']['results']);
        echo "<option value=''>Pilih Provinsi...</option>";
        foreach ($data_provinsi as $key => $tiap_provinsi) {
            echo "<option 
            value = '".$tiap_provinsi['province_id']."'
            provinsi_name='".$tiap_provinsi['province']."'>";
            echo $tiap_provinsi['province'];
            echo "</option>";
        }
    }
    break;
    
    case 'kota';
    $id_provinsi_terpilih=$_POST['value'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id_provinsi_terpilih",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: 280ce9f4fdf58e75607880f0bdb67827"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    //   dapatkan json dalam bentuk json, jadikan array agar bisa dipakai php
        $array_kota = json_decode($response,TRUE);
        $array_kota = $array_kota['rajaongkir']['results'];
        foreach ($array_kota as $key => $tiap_kota) {
            echo "<option value='' 
            id_kota = '".$tiap_kota['city_id']."'
            nama_provinsi='".$tiap_kota['province']."' 
            nama_kota='".$tiap_kota['city_name']."' 
            tipe_kota='".$tiap_kota['type']."' 
            kodepos='".$tiap_kota['postal_code']."'
            >";
            echo $tiap_kota['type'].' ';
            echo $tiap_kota['city_name'];
            echo "</option>";
        }
    }
    break;

    case 'ongkos';
    $ekspedisi = $_POST['ekspedisi'];
    $kota = $_POST['kota'];
    $berat = $_POST['berat'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=501&destination=".$kota."&weight=".$berat."&courier=".$ekspedisi,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: 280ce9f4fdf58e75607880f0bdb67827"
    ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
    } else {
    $array_ongkos = json_decode($response,TRUE);
    $array_ongkos1 = $array_ongkos['rajaongkir']['results']['0']['costs'];
    //   echo'<pre>';
    //   print_r ($array_ongkos);
    //   echo'</pre>';
    echo "<option value=''>pilih paket</option>";
    foreach ($array_ongkos1 as $key => $tiap_paket) {
        echo "<option 
        paket='".$tiap_paket['service']."'
        ongkir='".$tiap_paket['cost']['0']['value']."'
        etd='".$tiap_paket['cost']['0']['etd']."'
        >";
        echo $tiap_paket['service']." ";
        echo "Rp ".number_format($tiap_paket['cost']['0']['value'])." ";
        echo $tiap_paket['cost']['0']['etd']." hari";
        echo "</option>";
    }
    }
    break;

  ;
    // $koneksi = mysqli_connect('localhost','root','','tugas_semester2');
    // mysqli_query($koneksi,"INSERT INTO api VALUES ($ongkir)");
}
?>
