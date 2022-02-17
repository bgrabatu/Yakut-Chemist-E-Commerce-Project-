<?php 
require_once "header.php" ;
require_once "sidebar.php";

?>


  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary col-md-12">
    <div class="card-header">
        <h3 class="card-title">Hakkımızda</h3>
    </div>

    <form action="işlem/işlem.php" method="POST" enctype="multipart/from-data">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Hakkımızda Başlık</label>
                <input value="<?php echo $hakkimizdacek['hakkimizda_baslik']?>"name="hbaslik" type="text" class="form-control" place_holder="Hakkımzıda Başlığı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hakkımızda Misyon</label>
                <input value="<?php echo $hakkimizdacek['hakkimizda_misyon']?>" name="misyon" type="text" class="form-control" place_holder="Hakkımızda Misyonu Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hakkımızda Vizyon</label>
                <input value="<?php echo $hakkimizdacek['hakkimizda_vizyon']?>" name="vizyon" type="text" class="form-control" place_holder="Hakkımızda Vizyonu Giriniz">
            </div>
            <label>Hakkımızda Detay</label>
            <textarea name="detay"class="ckeditor" id="editor1"><?php echo $hakkimizdacek['hakkimizda_detay'] ?></textarea>
        </div>
        <div class="card-footer">
            <button name="hakkimizdakaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
    </section>
  </div>
  
   
  
    
  
  <?php require_once "footer.php" ?>