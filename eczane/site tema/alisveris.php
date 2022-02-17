<?php require_once 'header.php'; ?>
           
            <div class="breadcrumb-area">
            </div>
           
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <?php if(@$_GET['durum']=="eklendi"){ ?>
                                    <b style="color:green;">Ürününüz Eklendi</b> 
                               <?php } ?>
                            <form action="islem.php" method="POST">
                                <input type="hidden" name="toplamfiyat" value="<?php echo $_GET['toplamfiyat']?>">
                                <input type="hidden" name="kadi" value="<?php echo $kullanicicek['kullanici_id']?>">
                                Toplam Ödeme Tutarı: <?php echo @$_GET['toplamfiyat']?> TL
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                        <select name="odeme">
                                        <option value="1">Kapıda Ödeme</option>
                                        <option value="2">Kart İle Ödeme</option>



                                        </select>


                                    <br><br>        
                                    <button name="alisverisbitir" class="btn btn-info">Alışveriş Tamamla </button>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
           <?php require_once 'footer.php'; ?>