<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yakut Eczanesi Giriş</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body style="background-color:#7FFFD4;"class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Yakut</b> Eczanesi</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">
<?php
if(@$_GET['durum']=="hata") {?>
<p style="color:red" class="login-box-msg"> Kullanıcı Adı Ya Da Şifre Hatalı
<?php }
else if(@$_GET['durum']=="gulegule"){ ?>
<p style="color:black" class="login-box-msg"> Görüşmek Üzere
 <?php }
else
{
    echo "Lütfen giriş bilgilerini giriniz";
}



?>


      </p>


      <form action="işlem/işlem.php" method="post">
        <div class="input-group mb-3">
          <input name="kadi" type="text" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color:black;"class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="sifre" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color:black;" class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                 Beni Unutma
              </label>
            </div>
          </div>
          <div class="col-4">
            <button name="girisyap" type="submit" class="btn btn-primary btn-block">Giriş</button>
          </div>
        </div>
      </form>

     
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
