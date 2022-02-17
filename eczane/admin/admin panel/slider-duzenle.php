<?php 
require_once "header.php" ;
require_once "sidebar.php";

$slider=$baglanti->prepare("SELECT * FROM slider where slider_id=:slider_id");
$slider->execute(array(
'slider_id'=>$_GET['id']
));
$slidercek=$slider->fetch(PDO::FETCH_ASSOC);

?>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
      <div class="card card-primary col-md-12">
    <div class="card-header">
        <h3 class="card-title">Slider</h3>
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
                <label>Slider Resim</label>
                <input name="sliderresim" type="file" class="form-control">
            </div>
            <div class="form-group">
                <label>Slider Başlık</label>
                <input value="<?php echo $slidercek['slider_baslik']?>" name="sliderbaslik" type="text" class="form-control" place_holder="Slider Başlığını Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Slider Açıklama</label>
                <input value="<?php echo $slidercek['slider_aciklama']?>" name="slideraciklama" type="text" class="form-control" place_holder="Slider Açıklamasını Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Slider Sıra</label>
                <input value="<?php echo $slidercek['slider_sira']?>" name="slidersira" type="text" class="form-control" place_holder="Slider Sırasını Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Slider Link</label>
                <input value="<?php echo $slidercek['slider_link']?>" name="sliderlink" type="text" class="form-control" place_holder="Slider Linkini Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Slider Button Adı</label>
                <input value="<?php echo $slidercek['slider_button']?>" name="sliderbutton" type="text" class="form-control" place_holder="Slider Buton Adını Giriniz">
            </div>
            <div class="form-group">
                  <label>Slider Durum</label>
                  <select name="sliderdurum" class="form-control select2" style="width: 100%;">
                    <option <?php if($slidercek['slider_durum']=="1"){
                        echo "Selected";
                        }?> 
                    value="1" selected="selected">Aktif</option>
                    <option <?php if($slidercek['slider_durum']=="0"){
                            echo "Selected";
                    }?> 
                    value="0">Pasif</option>
                  </select>
            </div>
            <input type="hidden" name="id" value="<?php echo $slidercek['slider_id']?>">
            <input type="hidden" name="eskiresim" value="<?php echo $slidercek['slider_resim']?>">
            <div class="form-group">
                  <label>Slider Banner</label>
                  <select name="sliderbanner" class="form-control select2" style="width: 100%;">
                    <option  <?php if($slidercek['slider_banner']=="1"){
                        echo "Selected";
                        }?>  value="1" selected="selected">Slider</option>
                    <option  <?php if($slidercek['slider_banner']=="0"){
                        echo "Selected";
                        }?> value="0">Banner</option>
                  </select>
            </div>
        </div>

        <div class="card-footer">
            <button name="sliderduzenle" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
            

        
      
    </section>
  </div>
  <?php require_once "footer.php" ?>