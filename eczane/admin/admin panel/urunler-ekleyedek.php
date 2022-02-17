<?php 
require_once "header.php" ;
require_once "sidebar.php";

?>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary col-md-12">
    <div class="card-header">
        <h3 class="card-title">Ürünler</h3>
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
                  <label>Kategori Seç</label>
                  <select name="urunkategori" class="form-control select2" style="width: 100%;">
                   
                  <?php
                  $katid=$_GET['katid'];
                    $kategori=$baglanti->prepare("SELECT * FROM kategori order by kategori_id ASC");
                    $kategori->execute();
                    while($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC))
                    {                         
                        $kategoriid=$kategoricek['kategori_id'];
                        
                        
                        
                        
                        ?>
                  <option <?php if($katid==$kategoriid)
                  {
                      echo "Selected";
                  } ?>
                  
                  
                  
                  
                  value="<?php echo $kategoriid; ?>"><?php echo @$kategoricek['kategori_adi'];?></option>

                  <?php } ?>
                  </select>
            </div>
    
        <div class="form-group">
                <label>Ürünler Resim</label>
                <input name="urunlerresim" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Urun</label>
                <img style="width:250px;"src="resimler/urunler/<?php echo $urunlercek['urunlerresim']?>">
            </div>

            <div class="form-group">
                <label>urunler Başlık</label>
                <input name="urunlerbaslik" type="text" class="form-control" place_holder="urunler Başlığını Giriniz">
            </div>
            
            <label>Hakkımızda Detay</label>
            <textarea name="urunleraciklama"class="ckeditor" id="editor1"></textarea>
            <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
        
            <div class="form-group">
                <label for="exampleInputPassword1">urunler Sıra</label>
                <input  name="urunlersira" type="text" class="form-control" place_holder="urunler Sırasını Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">urunler Model</label>
                <input  name="urunlermodel" type="text" class="form-control" place_holder="urunler Linkini Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">urunler renk</label>
                <input  name="urunlerrenk" type="text" class="form-control" place_holder="urunler Buton Adını Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">urunler adet</label>
                <input  name="urunleradet" type="text" class="form-control" place_holder="urunler Buton Adını Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">urunler fiyat</label>
                <input  name="urunlerfiyat" type="text" class="form-control" place_holder="urunler Buton Adını Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">urunler anahtar kelime</label>
                <input  name="urunleranahtar" type="text" class="form-control" place_holder="urunler Buton Adını Giriniz">
            </div>
            <div class="form-group">
                  <label>urunler Durum</label>
                  <select name="urunlerdurum" class="form-control select2" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
            </div>


            <div class="form-group">
                  <label>Öne Çıkar</label>
                  <select name="urunleronecikar" class="form-control select2" style="width: 100%;">
                    <option value="1" selected="selected">Öne Çıkar</option>
                    <option value="0">Çıkarma</option>
                  </select>
            </div>
        </div>
        <div class="card-footer">
            <button name="urunlerkaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
            

        
      
    </section>
  </div>
  <?php require_once "footer.php" ?>