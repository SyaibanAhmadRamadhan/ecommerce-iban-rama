$(document).ready(function(){
   $.ajax({
      type:'post',
      url:'./components/api_rajaongkir.php?jenis=provinsi',
      success:function(hasil_provinsi){
         $("select#provinsi").html(hasil_provinsi);
      }
   });
   $("select#provinsi").on("change",function(){
      var id_provinsi_terpilih = $("option:selected",this).attr("value");
      var provinsi = $("option:selected","select#provinsi").attr("provinsi_name");
      $.ajax({
         type:'post',
         url:'./components/api_rajaongkir.php?jenis=kota',
         data:'value='+id_provinsi_terpilih,
         success:function(hasil_kota){
            $("select#kota").html(hasil_kota);
            $("input[name=provinsi]").val(provinsi)
         }
      })
   });
   $("select#kota").on("change",function(){
      var kota = $("option:selected","select#kota").attr("nama_kota");
      var postal_code = $("option:selected","select#kota").attr("kodepos");
      $.ajax({
         success:function(){
            $("input[name=kota]").val(kota)
            $("input[name=postal_code]").val(postal_code)
         }
      })
   })
   // nyari paket
   $("select#nama_ekspedisi").on("change",function(){
      var terpilih_ekspedisi = $("select#nama_ekspedisi").val();
      var var_kota_terpilih = $("option:selected","select#kota").attr("id_kota");
      var berat = $("input[name=berat]").val()
      $.ajax({
         type:'post',
         url:'./components/api_rajaongkir.php?jenis=ongkos',
         data:'ekspedisi='+terpilih_ekspedisi+'&kota='+var_kota_terpilih+'&berat='+berat,
         success:function(hasil_paket){
            $("select#nama_paket").html(hasil_paket);
            $("input[name=ekspedisi]").val(terpilih_ekspedisi)
         }
      })
   })
   $("select#kota").on("change",function(){
      var terpilih_ekspedisi = $("select#nama_ekspedisi").val();
      var var_kota_terpilih = $("option:selected","select#kota").attr("id_kota");
      var berat = $("input[name=berat]").val()
      $.ajax({
         type:'post',
         url:'./components/api_rajaongkir.php?jenis=ongkos',
         data:'ekspedisi='+terpilih_ekspedisi+'&kota='+var_kota_terpilih+'&berat='+berat,
         success:function(hasil_paket){
            $("select#nama_paket").html(hasil_paket);
            $("input[name=ekspedisi]").val(terpilih_ekspedisi)
         }
      })
   })
   $("select#provinsi").on("change",function(){
      var terpilih_ekspedisi = $("select#nama_ekspedisi").val();
      var var_kota_terpilih = $("option:selected","select#kota").attr("id_kota");
      var berat = $("input[name=berat]").val()
      $.ajax({
         type:'post',
         url:'./components/api_rajaongkir.php?jenis=ongkos',
         data:'ekspedisi='+terpilih_ekspedisi+'&kota='+var_kota_terpilih+'&berat='+berat,
         success:function(hasil_paket){
            $("select#nama_paket").html(hasil_paket);
            $("input[name=ekspedisi]").val(terpilih_ekspedisi)
         }
      })
   })
   // end nyari paket
   $("select#nama_paket").on("change",function(){
      var ongkir = $("option:selected","select#nama_paket").attr("ongkir");
      var paket = $("option:selected","select#nama_paket").attr("paket");
      var estimasi = $("option:selected","select#nama_paket").attr("etd");
      $.ajax({
         success:function(){
            $("input[name=paket_yang_diambil]").val(paket)
            $("input[name=estimasi]").val(estimasi)
            $("input[name=ongkir]").val(ongkir)
         }
      })
   })
   
})