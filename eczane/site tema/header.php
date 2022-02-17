<?php
error_reporting(0);
session_start();
ob_start();
require_once 'headerınphp.php';
require_once 'function.php';


$kullanicisor=$baglanti->prepare("SELECT * FROM kullanici WHERE kullanici_ad=:kullanici_ad ");
    $kullanicisor->execute(array(

       'kullanici_ad'=>@$_SESSION['normalgiris']

    ));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$var=$kullanicisor->rowCount();

    
?>

<!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>YAKUT ECZANESİ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="logo2.png">
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/fontawesome-stars.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/nice-select.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/helper.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <div class="body-wrapper">
            <header>
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <li><span>Telefon Numarası: </span><a href="tel:05388303992">0538 830 3992</a></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <li>
                                          <a href="giris.php"><span class="currency-selector-wrapper">Giriş</span></a>
                                        </li>
                                        <li>
                                            <div class="ht-setting-trigger"><span>Ayarlar</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="kullanici.php">Profilim</a></li>
                                                    <li><a href="sepet.php">Sepetim</a></li>
                                                    <li><a href="siparisler.php">Satın Alınanlar</a></li>
                                                    <li><a href="sifremidegistir.php">Şifre Değiştir</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="index.php">
                                        <img style="width:250px; height:80px; position:absolute; margin-top:-20px"src="logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                               
                                
                                <div class="header-middle-right">
                                    <ul class="hm-menu">
                                        <li  class="hm-wishlist">
                                            <a style="background-color:#7E918E" href="kullanici.php">
                                                    <i class="fa fa-user-o"></i>
                                            </a>
                                            
                                        </li>
                                        <li class="hm-minicart">
                                            <div style="background-color:#7E918E" class="hm-minicart-trigger">
                                                <span class="item-icon"></span>
                                                <span class="item-text">Sepetim
                                                </span>
                                            </div>
                                            
                                            <span></span>
                                            <div class="minicart">
                                                <ul class="minicart-product-list">

                                                <?php

                        foreach($_COOKIE['sepet'] as $key => $value)
                        {
                      $urunler=$baglanti->prepare("SELECT * FROM  urunler where urun_id=:urun_id order by urun_sira ASC");
                    $urunler->execute(array(
                  'urun_id'=>$key
                     ));
                @$urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);
                @$sepettoplam+=$value * $urunlercek['urun_fiyat'];
                                        ?>                                         
                                                    <li>
                                                        <a href="single-product.html" class="minicart-product-image">
                                                            <img src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim']?>" >
                                                        </a>
                                                        <div class="minicart-product-details">
                                                            <h6><a href="single-product.html"><?php echo $urunlercek['urun_baslik'] ?></a></h6>
                                                            <span><?php echo $urunlercek['urun_fiyat']?> TL x <?php echo $value ?></span>
                                                        </div>
                                                      <a href="islem.php?sepetsil&id=<?php echo $key?>"><button class="close" title="Remove">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </a>
                                                    </li>
                            <?php } ?>



                                                </ul>
                                                <p class="minicart-total">Toplam Fiyat: <span><?php echo $sepettoplam ?> TL</span></p>
                                                <div class="minicart-button">
                                                    <a style="background-color:#7E918E" href="sepet.php" class="li-button li-button-fullwidth li-button-dark">
                                                        <span>Sepeti Görüntülü</span>
                                                    </a>
                                                    <a style="background-color:black" href="alisveris.php" class="li-button li-button-fullwidth">
                                                        <span>Alışverişi Tamamla</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div style="background-color:#00ffff" class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div  class="col-lg-12">
                                <div  class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li><a href="index.php">Anasayfa</a></li>
                                            <li class="megamenu-holder"><a href="#">Kategorİler</a>
                                                <ul class="megamenu hb-megamenu">
                                                    <li><a href="#">İlaçlar</a>
                                                        <ul>
                                                        <?php
                    $kategori=$baglanti->prepare("SELECT * FROM kategori where kategori_durum=:kategori_durum and kategori_sira between 1 and 20 limit 6");
                    $kategori->execute(array(

                        'kategori_durum'=>1


                    ));
                    while($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                                                            <li><a href="urunler-<?=seolink($kategoricek['kategori_adi']).'-'.$kategoricek['kategori_id'] ?>"><?php echo $kategoricek['kategori_adi'] ?></a></li> 
                                                        <?php } ?>                                                      
                                                     </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="bilgi.php">Hakkımızda</a></li>
                                            <li><a href="iletisim.php">İletİşİm</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
            </header>