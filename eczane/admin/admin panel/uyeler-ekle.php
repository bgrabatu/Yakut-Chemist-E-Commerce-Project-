<?php 
require_once "header.php" ;
require_once "sidebar.php";

?>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary col-md-12">
    <div class="card-header">
        <h3 class="card-title">Genel Ayarlar</h3>
    </div>


<?php 
if(@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green;">(Yüklenme İşlemi Başarılı)</h6>
<?php  }
else if(@$_GET['yuklenme']=="basarisiz") { ?>
<h6 style="color:red;">(Yüklenme İşlemi Başarısız)</h6> <?php }
else if(@$_GET['yuklenme']=="kullanicivar"){ ?>
<h6 style="color:red;">(Bu Kullanıcı Kayıtlı)</h6>
<?php } ?>


    <form action="işlem/işlem.php" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Kullanıcı Adı</label>
                <input name="kadi" type="text" class="form-control" place_holder="Kullanıcı Adı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kullanıcı Şifre</label>
                <input  name="sifre" type="text" class="form-control" place_holder="Şifre Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kullanıcı Ad Soyad</label>
                <input name="adsoyad" type="text" class="form-control" place_holder="Adınızı Ve Soyadınızı Giriniz">
            </div>
        </div>

        <div class="card-footer">
            <button name="uyelerkaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
            

        
      
    </section>
  </div>
  <?php require_once "footer.php" ?>