<?php 
require_once "header.php" ;
require_once "sidebar.php";

$kategori=$baglanti->prepare("SELECT * FROM kategori where kategori_id=:kategori_id");
$kategori->execute(array(
'kategori_id'=>$_GET['id']
));
$kategoricek=$kategori->fetch(PDO::FETCH_ASSOC);   

?>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary col-md-12">
    <div class="card-header">
        <h3 class="card-title">Kategoriler</h3>
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


    <form action="işlem/işlem.php" method="POST" enctype="multipart/form-data">

        <div class="card-body">
            <div class="form-group">
                <label>Kategori Adı</label>
                <input value="<?php echo $kategoricek['kategori_adi'] ?>" name="kategoriadi" type="text" class="form-control" place_holder="Kategori Adı Giriniz">
            </div>

            <input type="hidden" name="katid" value="<?php echo $kategoricek['kategori_id'] ?>">

            <div class="form-group">
                <label for="exampleInputPassword1">Kategori Sıra</label>
                <input value="<?php echo $kategoricek['kategori_sira'] ?>"name="kategorisira" type="text" class="form-control" place_holder="Kategori Sira Giriniz">
            </div>

            <div class="form-group">
                  <label>Kategori Durum</label>
                  <select name="kategoridurum" class="form-control select2" style="width: 100%;">
                    <option value="1" <?php if($kategoricek['kategori_durum']=="1")
                    {
                      echo 'Selected';
                    }  ?>>Aktif</option>
                    <option value="0"<?php if($kategoricek['kategori_durum']=="0")
                    {
                      echo 'Selected';
                    }  ?>>Pasif</option>
                  </select>
                </div>
        </div>

        <div class="card-footer">
            <button name="kategoriduzenle" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
            

        
      
    </section>
  </div>
  <?php require_once "footer.php" ?>