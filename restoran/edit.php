<?php

$ipaddress = '-';
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
$ipaddress=$_SERVER['HTTP_CLIENT_IP'];
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
$ipaddress=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
$ipaddress=$_SERVER['REMOTE_ADDR'];
}
// echo $ipaddress;die;

$id = null;
if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $curl = curl_init();
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://mahdojan.000webhostapp.com/readById.php',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => [
      'id_restoran' => $id,
    ]
  ]);
  
  $result = curl_exec($curl);
  curl_close($curl);
  
  // print_r($result);die;
  $result = json_decode($result);

// Fetch all users data from database
// print_r($rows->id_restoran); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- script -->
  <script type='text/javascript'>
        function preview_image(event) 
        {
        var reader = new FileReader();
        reader.onload = function()
        {
        var output = document.getElementById('output_image');
        output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
        }
    </script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Mahdojan API</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a href="." class="brand-logo mahdojan-font">Mahdo<span style="color:red">j</span>an</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../json">JSON</a></li>
                <li><a href="#">XML</a></li>
                <li><a href="../restoran">Restoran</a></li>                
            </ul>
        </div>
    </nav>

  <ul class="sidenav" id="mobile-demo">
                <li><a href="../json">JSON</a></li>
                <li><a href="#">XML</a></li>
                <li><a href="../restoran">Restoran</a></li>   
  </ul>
  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <?php if($result->restoran==null){echo $result->code.' : '.$result->message;}?>
              <?php foreach ($result->restoran as $i) :?>
                <div class="col m12 s12">
                  <div class="card">
                  <div class="card-content white-text">
                <span class="card-title teal-text lighten-2"><h5>Edit Data Restoran</h5><br></span>
                <br>
                <div class="row">
                <form class="col s12" action="update.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="nama_restoran" type="text" class="validate" name="name" value="<?=$i->nama_restoran?>" required>
                        <label for="nama_restoran">Nama Restoran</label>
                        </div>
                    </div>
                    <input type="hidden" class="wow" value="<?=$i->kategori?>">
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="kategori">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="cafe" >cafe</option>
                                <option value="foodcourt" >foodcourt</option>
                                <option value="berkuah" >berkuah</option>
                                <option value="restoran" >restoran</option>
                                <option value="restoran ayam" >restoran ayam</option>
                                <option value="restoran cepat saji" >restoran cepat saji</option>
                                <option value="restoran indonesia" >restoran indonesia</option>
                                <option value="restoran jepang" >restoran jepang</option>
                                <option value="restoran korea" >restoran korea</option>
                                <option value="restoran mie" >restoran mie</option>
                                <option value="restoran non halal" >restoran non halal</option>
                                <option value="restoran sunda" >restoran sunda</option>
                                <option value="restoran Thailand" >restoran Thailand</option>
                                <option value="restoran padang" >restoran padang</option>
                                <option value="snack jajanan" >snack jajanan</option>
                                <option value="restoran sate" >restoran sate</option>
                                <option value="khas jogja" >khas jogja</option>
                                <option value="street food" >street food</option>
                                <option value="toko kue" >toko kue</option>
                                <option value="toko ice cream" >toko ice cream</option>
                            </select>
                            <label>Kategori</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="alamat" type="text" class="validate" name="alamat" value="<?=$i->alamat;?>" required>
                        <label for="alamat">Alamat</label>
                        </div>
                    </div>
                     <div class="row">
                        <div class="input-field col s12">
                        <input id="daerah" type="text" class="validate" name="daerah" value="<?=$i->daerah;?>" required>
                        <label for="daerah">Daerah</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="kota" type="text" class="validate" name="kota" value="<?=$i->kota;?>" required>
                        <label for="kota">Kota</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="keterangan" type="text" class="validate" name="keterangan" value="<?=$i->keterangan;?>" required>
                        <label for="keterangan">Keterangan</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="lat" type="text" class="validate" name="lat" value="<?=$i->latitude;?>" required>
                            <label for="lat">latitude</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="lng" type="text" class="validate" name="lng" value="<?=$i->longitude;?>" required>
                            <label for="lng">longitude</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="kode_pos" type="text" class="validate" name="postal" value="<?=$i->kode_pos;?>" required>
                            <label for="kode_pos">Kode Pos</label>
                        </div>
                        <input id="ip" type="hidden" name="id" value="<?=$i->id_restoran;?>">
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <label for="">Fasilitas</label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col m2">
                            <input type="checkbox" class="filled-in" name="wifi"/>
                            <span>WiFi</span>
                        </label>
                        <label class="col m2">
                            <input type="checkbox" class="filled-in" name="parkir" />
                            <span>Parkir Luas</span>
                        </label>
                        <label class="col m2">
                            <input type="checkbox" class="filled-in" name="delivery" />
                            <span>Pesan Antar</span>
                        </label>
                        <label class="col m2">
                            <input type="checkbox" class="filled-in" name="gojek" />
                            <span>Gojek</span>
                        </label>
                        <label class="col m2">
                            <input type="checkbox" class="filled-in" name="grab" />
                            <span>Grab</span>
                        </label>
                        <label class="col m3">
                            <input type="checkbox" class="filled-in" name="powersocket" />
                            <span>Power Socket</span>
                        </label>
                    </div>
                    <?php if($i->photo_profile == 'not yet') {?>
                    <div class="row">
                        <div class="input-field col s4">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" onchange="preview_image(event)" name="file" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <img id="output_image" style="max-width:200px;"/>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="input-field col s4">
                            <?php if($i->kode_admin!=null) {?>
                                <input id="kode_admin" type="text" class="validate" value="<?=$i->kode_admin?>" name="kode_admin" readonly>
                                <label>Kode ADMIN</label>
                            <?php } 
                            else { ?>
                            <select name="kode_admin">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Beruang" >Beruang</option>
                                <option value="Kelinci" >Kelinci</option>
                                <option value="Marmut" >Marmut</option>
                                <option value="Panda" >Panda</option>
                            </select>
                            <?php } ?>
                        </div>
                    </div>
                        <input onclick="M.toast({html: 'Tunggu dulu yaa ...'})" type="submit" class="waves-effect waves-light btn white-text" value="SIMPAN"/>
                    </form>
                </div>
            </div>
                  </div>
                </div>
                <input type="hidden" class="wifi" value="<?php if($i->wifi){echo 1;}else {echo 0;} ?>">
                <input type="hidden" class="parkir" value="<?php if($i->parkir){echo 1;}else {echo 0;} ?>">
                <input type="hidden" class="delivery" value="<?php if($i->delivery){echo 1;}else {echo 0;} ?>">
                <input type="hidden" class="gojek" value="<?php if($i->gojek){echo 1;}else {echo 0;} ?>">
                <input type="hidden" class="grab" value="<?php if($i->grab){echo 1;}else {echo 0;} ?>">
                <input type="hidden" class="powersocket" value="<?php if($i->powersocket){echo 1;}else {echo 0;} ?>">
              <?php endforeach?>
      </div>
    </div>
  </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  <script>
  
  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
    var x = $('.wow').val();
    $("select option[value='"+x+"']").attr("selected","selected");
    $('select').formSelect();

    //wifi
   if($('.wifi').val()=='1') {
    $("input[name='wifi']").attr("checked","checked");
   }

   if($('.delivery').val()=='1') {
    $("input[name='delivery']").attr("checked","checked");
   }

   if($('.parkir').val()=='1') {
    $("input[name='parkir']").attr("checked","checked");
    console.log($('.parkir').val());
   }

   if($('.gojek').val()=='1') {
    $("input[name='gojek']").attr("checked","checked");
   }

   if($('.grab').val()=='1') {
    $("input[name='grab']").attr("checked","checked");
   }

   if($('.powersocket').val()=='1') {
    $("input[name='powersocket']").attr("checked","checked");
   }
  });
  </script>

  </body>
</html>