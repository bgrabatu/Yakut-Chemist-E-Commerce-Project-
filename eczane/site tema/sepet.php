<?php require_once 'header.php'; ?>
           
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Anasayfa</a></li>
                            <li class="active">Sepet</li>
                        </ul>
                    </div>
                </div>
            </div>
         
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if(@$_GET['durum']=="eklendi"){ ?>
                                    <b style="color:green;">Ürününüz Eklendi</b> 
                               <?php } ?>
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove"></th>
                                                <th class="li-product-thumbnail">Resim</th>
                                                <th class="cart-product-name">Başlık</th>
                                                <th class="li-product-price">Fiyat</th>
                                                <th class="li-product-quantity">Adet</th>
                                                <th class="li-product-subtotal">Toplam Fiyat</th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php

foreach(@$_COOKIE['sepet'] as $key => $value)
{
    $urunler=$baglanti->prepare("SELECT * FROM  urunler where urun_id=:urun_id order by urun_sira ASC");
    $urunler->execute(array(
        'urun_id'=>$key
    ));
   $urunlercek=$urunler->fetch(PDO::FETCH_ASSOC);



?>

                                            <tr>
                                                <td class="li-product-remove">
                                                    
                                                <a href="islem.php?sepetsil&id=<?php echo $key?>"><i class="fa fa-times"></i></a>
                                            
                                                </td>
                                                <td class="li-product-thumbnail"><a href="#"><img style="width:200px;" src="../admin/admin panel/resimler/urunler/<?php echo $urunlercek['urun_resim']?>" ></a></td>
                                                <td class="li-product-name"><a href="#"><?php echo $urunlercek['urun_baslik'] ?></a></td>
                                                <td class="li-product-price"><span class="amount"><?php echo $urunlercek['urun_fiyat']?> TL</span></td>
                                                <td class="quantity">
                                                        <div class="cart-plus-minus">
                                                        <input value="<?php echo $value?>"class="cart-plus-minus-box" value="1" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount"><?php echo $value * $urunlercek['urun_fiyat'] ?> TL</span></td>
                                            </tr>
<?php

@$kdv=$sepettoplam * 18/100;
@$geneltoplam=$kdv + $sepettoplam;

?>


                                <?php } ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                               
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Toplam Fiyat</h2>
                                            <ul>
                                                <li>Toplam Tutar<span><?php echo $sepettoplam ?> TL</span> </li>
                                                <li>KDV<span><?php echo $kdv ?> TL</span></li>
                                                <li>Genel Tutar<span><?php echo $geneltoplam?> TL</span></li>

                                            </ul>
                                            <a href="alisveris.php?toplamfiyat=<?php echo $geneltoplam?>">Alışverişi Tamamla</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
           <?php require_once 'footer.php'; ?>