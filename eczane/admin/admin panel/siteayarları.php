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
                <label for="exampleInputEmail1">Site Başlığı</label>
                <input value="<?php echo $ayarcek['baslik']?>"name="baslik" type="text" class="form-control" place_holder="Site Başlığı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Açıklama</label>
                <input value="<?php echo $ayarcek['aciklama'] ?>" name="aciklama" type="text" class="form-control" place_holder="Site Açıklaması Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Anahtar Kelime</label>
                <input value="<?php echo $ayarcek['anahtarkelime']?>" name="anahtarkelime" type="text" class="form-control" place_holder="Site Anahtar Kelimesini Giriniz">
            </div>
        </div>

        <div class="card-footer">
            <button name="ayarkaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>


<div class="card card-primary col-md-12">
    <form action="işlem/işlem.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="eskilogo" value="<?php echo $ayarcek['logo'] ?>"> 
    <div class="card-body">

            <div class="form-group">
                <label for="exampleInputPassword1">Logo</label >
                <img style="width:250px;"src="resimler/logo/<?php echo $ayarcek['logo']?>">
            </div>

    </div>

        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Logo</label>
                <input name="logo" type="file" class="form-control">
            </div>
        </div>

        <div class="card-footer">
            <button name="logokaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
    </section>
  </div>
  
   
  
    
  
  <?php require_once "footer.php" ?>