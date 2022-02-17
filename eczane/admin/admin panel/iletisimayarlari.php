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

    <form action="işlem/işlem.php" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Telefon Numarası</label>
                <input value="<?php echo $ayarcek['telefon']?>"name="telefon" type="text" class="form-control" place_holder="Telefon Numaranızı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">E-Mail</label>
                <input value="<?php echo $ayarcek['email'] ?>" name="email" type="text" class="form-control" place_holder="Mail Adresinizi Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Adres</label>
                <input value="<?php echo $ayarcek['adres']?>" name="adres" type="text" class="form-control" place_holder="Adresinizi Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mesai</label>
                <input value="<?php echo $ayarcek['mesai']?>" name="mesai" type="text" class="form-control" place_holder="Mesai Saatinizi Giriniz">
            </div>
        </div>

        <div class="card-footer">
            <button name="iletişimkaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
            

        
      
    </section>
  </div>
  <?php require_once "footer.php" ?>