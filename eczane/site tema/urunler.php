<!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>YAKUT ECZANESİ</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/fontawesome-stars.css">
        <link rel="stylesheet" href="css/meanmenu.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/slick.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <link rel="stylesheet" href="css/venobox.css">
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
           
           <?php require_once 'header.php' ?>

            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Anasayfa</a></li>
                            <li class="active">İlaçlar</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                           
                                        </ul>
                                    </div>
                                    <div class="toolbar-amount">
                                        <span>Bütün İlaçlar</span>
                                    </div>
                                </div>
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sıralama</p>
                                        <select class="nice-select">
                                            <option value="trending">İsime Göre (A - Z)</option>
                                            <option value="sales">İsime Göre (Z - A)</option>
                                            <option value="rating">Fiyata Göre (Ucuz &gt; Pahalı)</option>
                                            <option value="rating">Fiyata Göre (Pahalı &gt; Ucuz)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">

                                            <?php
                    $urunler=$baglanti->prepare("SELECT * FROM  urunler where kategori_id=:kategori_id and urun_durum =:urun_durum order by urun_sira ASC");
                    $urunler->execute(array(
                        'kategori_id'=>$_GET['kategori_id'],
                        'urun_durum'=>1
                    ));
                    while($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC))
                    { ?>
                                               
                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <div class="single-product-wrap"> 
                                                        <div class="product-image">
                                                            <a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                                <img src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>">
                                                            </a>
                                                            <span class="sticker">Yeni</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                 

                                                                </div>
                                                                <h4><a class="product_name" href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik']?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price"><?php echo $urunlercek['urun_fiyat']?></span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">Detay</a></li>
                                                                    <li><a href="urunler-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>" title="İncele" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                                    <li><a  title="Favorilerine Ekle"class="links-details" href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php require_once 'footer.php' ?>
    </body>

</html>
