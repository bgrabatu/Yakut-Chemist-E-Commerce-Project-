<?php 
require_once "header.php" ;
require_once "sidebar.php";

?>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
  
</div>
<div class="row">
    <?php
if(@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green">(Yükleme İşlemi Başarılı)</h6>
<?php }
elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
<h6 style="color:red">(Yükleme İşlemi Başarısız)</h6>
<?php } ?>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Slider Tablosu</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    <th>Sipariş İd</th>
                    <th>Kullanici İd</th>
                      <th>Ürün İd</th>
                      <th>Sipariş Zaman</th>
                      <th>Ürün Adet</th>
                      <th>Ürün Fiyat</th>
                      <th>Toplam Fiyat</th>
                      <th>Ödeme Türü</th>
                      <th>Sipariş Onay</th>
                      <th>Sipariş Red</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                    $siparis=$baglanti->prepare("SELECT * FROM siparisler order by siparis_id DESC");
                    $siparis->execute();
                    while($sipariscek=$siparis->fetch(PDO::FETCH_ASSOC))
                    { ?>
                    <tr>
                    <td><?php echo $sipariscek['siparis_id']?></td>
                      <td><?php echo $sipariscek['kullanici_id']?></td>
                      <td><?php echo $sipariscek['urun_id']?></td>
                      <td><?php echo $sipariscek['siparis_zaman']?></td>
                      <td><?php echo $sipariscek['urun_adet']?></td>
                      <td><?php echo $sipariscek['urun_fiyat']?></td>
                      <td><?php echo $sipariscek['toplam_fiyat']?></td>
                      
                      <td><span class="tag tag-success">
                      <?php
                            if( $sipariscek['odeme_turu']=="1")
                            {
                                echo "Kapıda Ödeme";
                            }
                            else if( $sipariscek['odeme_turu']=="2")
                            {
                                echo "Kart İle Ödeme";
                            }
                            
                    ?>
                    </span></td>

                    <?php 
                    if($sipariscek['siparis_onay']=="0")
                    {?>


                   
                      
                      <td><a href="işlem/işlem.php?siparisonayla&id=<?php echo $sipariscek['siparis_id']?>">
                      <button type="submit" class="btn btn-success ">ONAYLA</button></a></td>
                      
                    <td><a href="işlem/işlem.php?siparisreddet&id=<?php echo $sipariscek['siparis_id']?>"><button type="submit" class="btn btn-danger">REDDET</button></a> </td>
                       
                    
                    <?php } ?> 


                    </tr> 
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
</section>
</div>

  <?php require_once "footer.php" ?>