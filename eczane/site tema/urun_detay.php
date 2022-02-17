            
            <?php 
            require_once 'header.php';
                  
            $urunler=$baglanti->prepare("SELECT * FROM  urunler where urun_id=:urun_id order by urun_sira ASC");
            $urunler->execute(array(
                'urun_id'=>$_GET['urun_id']
            ));
           $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);
                   $katsid=$urunlercek['kategori_id']; 


            ?>
           
          
            
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                            <div class="product-details-left">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <img src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>">
                                    </div>
                                   
                                </div>
                               
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="product-details-view-content sp-normal-content pt-60">
                                <div class="product-info">
                                    <i></i>
                                    <h2><?php echo $urunlercek['urun_baslik']?></h2>
                                    
                                
                                    <div class="price-box pt-20">
                                        <span class="new-price new-price-2"><?php echo $urunlercek['urun_fiyat']?></span>
                                    </div>
                                    <div class="product-desc">
                                        <p>
                                            <span> <?php echo $urunlercek['urun_aciklama']?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="single-add-to-cart">
                                        <form action="islem.php" method="POST" class="cart-quantity">
                                            <div class="quantity">
                                                <label>Adet</label>
                                                <div class="cart-plus-minus">
                                                    <input name="adet" class="cart-plus-minus-box" value="1" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="urunid" value="<?php echo $urunlercek['urun_id']?>">
                                            <button name="sepeteekle" class="add-to-cart" type="submit">Sepete Ekle</button>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            
            <div class="product-area pt-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#description"><span>Açıklama</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Yorumlar</span></a></li>
                                </ul>               
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="description" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span><?php echo $urunlercek['urun_aciklama']?></span>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                    
                                <?php


                    $yorumlar=$baglanti->prepare("SELECT * FROM yorumlar where urun_id=:urun_id and yorum_onay=:yorum_onay order by yorum_id DESC");
                    $yorumlar->execute(array(


                        'urun_id'=>$_GET['urun_id'],
                        'yorum_onay'=>1




                    ));
                    while($yorumlarcek=$yorumlar->fetch(PDO::FETCH_ASSOC))
                    { ?> 
                    <?php

                    $yorumyapanid=$yorumlarcek['kullanici_id']; 
                    
                    $kullanicilar=$baglanti->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id ");
                    $kullanicilar->execute(array(


                        'kullanici_id'=>$yorumyapanid

                    ));
                    $kullanicilarcek=$kullanicilar->fetch(PDO::FETCH_ASSOC);   

                    ?>

                                    <div class="comment-author-infos pt-25">
                                        <span><?php echo $kullanicilarcek['kullanici_adsoyad']; ?></span>
                                        <em style="color:red;"><?php echo $yorumlarcek['yorum_detay']?></em>
                                        <hr>
                                    </div>
                        <?php } ?>
                                    
                                    <div class="review-btn">
                                        <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Yorum Yaz</a>
                                    </div>
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="modal-inner-area row">
                                                       
                                                        <div class="col-lg-12">
                                                            <div class="li-review-content">
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <form action="../admin/admin panel/işlem/işlem.php" method="POST">
                                                                            <input type="hidden" name="kullaniciid" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                                                                            <input type="hidden" name="urunid" value="<?php echo $urunlercek['urun_id']?>">
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Yorumunuz</label>
                                                                                <textarea name="yorum" cols="45" rows="8"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                               
                                                                                
                                                                                <div class="feedback-btn pb-16">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Kapat</a>
                                                                                    <button class="btn btn-danger" type="submit" name="yorumkaydet">Gönder</button>
                                                                                    </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Benzer Ürünler</span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    
                                <?php
                    $urunler=$baglanti->prepare("SELECT * FROM  urunler where kategori_id=:kategori_id and urun_durum =:urun_durum order by urun_sira ASC");
                    $urunler->execute(array(
                        'kategori_id'=>$katsid,
                        'urun_durum'=>1
                    ));
                    while($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC))
                    { ?>
                                    
                                    <div class="col-lg-12">
                                        <div class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">
                                                    <img src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim'] ?>" >
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        
                                                       
                                                    </div>
                                                    <h4><a class="product_name" href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>"><?php echo $urunlercek['urun_baslik']?> </a></h4>
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2"><?php echo $urunlercek['urun_fiyat']?></span>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active"><a href="urun-detay-<?=seolink($urunlercek['urun_baslik']).'-'.$urunlercek['urun_id'] ?>">Sepete Ekle</a></li>
                                                        
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
           <?php require_once 'footer.php ' ?>