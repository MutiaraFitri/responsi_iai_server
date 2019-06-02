<?php
function get_client_ip() {
$ipaddress = '';
if (isset($_SERVER['HTTP_CLIENT_IP']))
    $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_X_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
    $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
else if(isset($_SERVER['HTTP_FORWARDED']))
    $ipaddress = $_SERVER['HTTP_FORWARDED'];
else if(isset($_SERVER['REMOTE_ADDR']))
    $ipaddress = $_SERVER['REMOTE_ADDR'];
else
    $ipaddress = 'UNKNOWN';
return $ipaddress;
} 
$ip = get_client_ip();
?>

<!DOCTYPE html>
<html lang="en">
<head>
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
  <title>Mahdojan API JSON</title>

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
                <li><a href="./">JSON</a></li>
                <li><a href="badges.html">XML</a></li>
                <li><a href="../restoran">Restoran</a></li>                
            </ul>
        </div>
    </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="./">JSON</a></li>
    <li><a href="badges.html">XML</a></li>
    <li><a href="../restoran">Restoran</a></li>                
  </ul>

  <div id="index-banner" class="parallax-container" style="height:190vh;">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <div class="card">
            <div class="card-content white-text">
                <span class="card-title teal-text lighten-2"><h5>Tambah Data Restoran</h5><br></span>
                <br>
                <div class="row">
                    <form class="col s12" action="tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="nama_restoran" type="text" class="validate" name="name" required>
                        <label for="nama_restoran">Nama Restoran</label>
                        </div>
                    </div>
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
                                <option value="western food" >western food</option>
                                <option value="chinese food" >chinese food</option>
                            </select>
                            <label>Kategori</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="alamat" type="text" class="validate" name="alamat" required>
                        <label for="alamat">Alamat</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="kota" type="text" class="validate" name="kota" required>
                        <label for="kota">Kota</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                        <input id="keterangan" type="text" class="validate" name="keterangan" required>
                        <label for="keterangan">Keterangan</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <input id="lat" type="text" class="validate" name="lat" required>
                            <label for="lat">latitude</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="lng" type="text" class="validate" name="lng" required>
                            <label for="lng">longitude</label>
                        </div>
                        <div class="input-field col s4">
                            <input id="kode_pos" type="text" class="validate" name="postal" required>
                            <label for="kode_pos">Kode Pos</label>
                        </div>
                        <input id="ip" type="hidden" name="ip" value="<?=$ip;?>">
                    </div>
                    <div class="row">
                        <div class="col m12">
                            <label for="">Fasilitas</label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col m2">
                            <input type="checkbox" class="filled-in" name="wifi" />
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
                    <div class="row">
                        <div class="input-field col s4">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" onchange="preview_image(event)" name="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                            <img id="output_image" style="max-width:200px;"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <select name="kode_admin">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Beruang" >Beruang</option>
                                <option value="Kelinci" >Kelinci</option>
                                <option value="Marmut" >Marmut</option>
                                <option value="Panda" >Panda</option>
                            </select>
                            <label>Kode ADMIN</label>
                        </div>
                    </div>
                        <input onclick="M.toast({html: 'Tunggu dulu yaa ...'})" type="submit" class="waves-effect waves-light btn white-text" value="SIMPAN"/>
                    </form>
                </div>
            </div>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="../background1.jpg" alt="Unsplashed background img 1"></div>
  </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
    <!-- dropdown -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });
  
  // Or with jQuery

  $(document).ready(function(){
    $('select').formSelect();
  });
  </script>

  </body>
</html>