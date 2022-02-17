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
                <label for="exampleInputEmail1">Facebook</label>
                <input value="<?php echo $ayarcek['facebook']?>"name="facebook" type="text" class="form-control" place_holder="Telefon Numaranızı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">İnstagram</label>
                <input value="<?php echo $ayarcek['instagram'] ?>" name="instagram" type="text" class="form-control" place_holder="Mail Adresinizi Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Youtube</label>
                <input value="<?php echo $ayarcek['youtube']?>" name="youtube" type="text" class="form-control" place_holder="Adresinizi Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Twitter</label>
                <input value="<?php echo $ayarcek['twitter']?>" name="twitter" type="text" class="form-control" place_holder="Mesai Saatinizi Giriniz">
            </div>
        </div>

        <div class="card-footer">
            <button name="sosyalmedyakaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
            

        
      
    </section>
  </div>
  <?php require_once "footer.php" ?>