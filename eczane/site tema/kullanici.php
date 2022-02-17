<?php require_once 'header.php';

if($var==0)
{
    Header("Location:giris?durum=girisyap");
}

?>
            <div class="page-section mb-60" style="margin-left:470px">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <form action="../admin/admin panel/işlem/işlem.php" method="POST" >
                                <div class="login-form">
                                   <h4 class="login-tittle">Kullanıcı Bilgileri <?php if(@$_GET['yuklenme']=="Başarısız") { ?>
                                    <i style="color:red;">Hata Bulundu</i>
                                    <?php } elseif(@$_GET['yuklenme']=="Başarılı") {?>
                                        <i style="color:yellow;"> Başarılı </i>
                                        <?php } ?></h4>

                                   
                                    <div class="row">
                                        <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id']?>">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Kullanıcı Ad-Soyad</label>
                                            <input value="<?php echo @$kullanicicek['kullanici_adsoyad'] ?>" name="adsoyad" required=""class="mb-0" type="text" placeholder="Ad-Soyad">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Kullanıcı E-mail</label>
                                            <input value="<?php echo @$kullanicicek['kullanici_mail'] ?>" name="email" required="" class="mb-0" type="text" placeholder="E-mail">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Kullanıcı Adres</label>
                                            <input value="<?php echo @$kullanicicek['kullanici_adres'] ?>" name="adres" required="" class="mb-0" type="text" placeholder="Adres">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Kullanıcı Şehir</label>
                                            <input value="<?php echo @$kullanicicek['kullanici_il'] ?>"name="sehir" required="" class="mb-0" type="text" placeholder="Sehir">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Kullanıcı İlçe</label>
                                            <input value="<?php echo @$kullanicicek['kullanici_ilce'] ?>" name="ilce" required="" class="mb-0" type="text" placeholder="İlçe">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Kullanıcı Telefon Numarası</label>
                                            <input value="<?php echo @$kullanicicek['kullanici_tel'] ?>" name="telefon" required="" class="mb-0" type="text" placeholder="Telefon Numarası">
                                        </div>
                                        <div class="col-md-12">
                                            <button name="kullaniciduzenle"class="register-button mt-0">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                    </div>  <a href="cikis.php"><button style="margin-left:230px" class="btn btn-info"><i class="fa fa-sign-out"></i> Çıkış</button></a>
                </div>
            </div>
           
           <?php require_once 'footer.php' ?>