<?php require_once "header.php"; ?>
            
      <?php require_once "slider.php"?>
           
            <div class="product-area pt-60 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                <li><a class="active" name="yeniurunler" data-toggle="tab" href="#li-new-product"><span>Yeni ürünler</span></a></li>
                                </ul>               
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    
                                <?php 
$urunler=$baglanti->prepare("SELECT * FROM  urunler  order by urun_id DESC");
$urunler->execute();
 while ($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)) { 

 ?>



                                    <div class="col-lg-12">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                    <img style="height: 200px" src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>">
                                                </a>
                                                <span class="sticker">Yeni</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                       
                                                    </div>
                                                    <h4><a class="product_name" href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                    <?php echo $urunlercek['urun_baslik'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2"><?php echo $urunlercek['urun_fiyat'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">Detay</a></li>
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
           
            <section class="product-area li-laptop-product pt-60 pb-45">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                   <a name="onecikanlar"><span>Öne Çıkanlar</span></a>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">


                                <?php 
$urunler=$baglanti->prepare("SELECT * FROM  urunler where onecikan=:onecikan ");
$urunler->execute(array(
'onecikan'=>1
));
 while ($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)) { 

 ?>

                                    <div class="col-lg-12">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                <img style="height: 200px" src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>" >
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        
                                                        
                                                    </div>
                                                    <h4><a class="product_name" href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price"><?php echo $urunlercek['urun_fiyat'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">Detay</a></li>
                                                       
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
            </section>
            
            <section class="product-area li-laptop-product li-tv-audio-product pb-45">
                <div class="container">
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                <a name="ucuzfiyatlılar"><span>Ucuz Fiyatlılar</span></a>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php 
$urunler=$baglanti->prepare("SELECT * FROM  urunler order by urun_fiyat ASC");
$urunler->execute();
 while ($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC)) { 

 ?>

                                    <div class="col-lg-12">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                <img style="height: 200px" src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>" >
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        
                                                        
                                                    </div>
                                                    <h4><a class="product_name" href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik'] ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price"><?php echo $urunlercek['urun_fiyat'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">Detay</a></li>
                                                       
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
            </section>
           
<?php require_once "footer.php" ?>