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
                <h3 class="card-title">Ürünler Tablosu</h3>
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
                    <th>Ürün Resim</th>
                      <th>Ürün Başlık</th>
                      <th>Ürün Model</th>
                      <th>Ürün Renk</th>
                      <th>Ürün Durum</th>
                      <th>Ürün Sıra</th>
                      <th>Ürün Adet Sayısı</th>
                        <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                    $urunler=$baglanti->prepare("SELECT * FROM  urunler where kategori_id=:kategori_id order by urun_id ASC");
                    $urunler->execute(array(
                        'kategori_id'=>@$_GET['katid']





                    ));
                    while($urunlercek=$urunler->fetch(PDO::FETCH_ASSOC))
                    { ?>
                    <tr>
                        <td><img src="resimler/urunler/<?php echo $urunlercek['urun_resim']?>"></td>
                      <td><?php echo $urunlercek['urun_baslik']?></td>
                      <td><?php echo $urunlercek['urun_model']?></td>
                      <td><?php echo $urunlercek['urun_renk']?></td>
                      <td><?php echo $urunlercek['urun_durum']?></td>
                      

                      <td><?php echo $urunlercek['urun_sira']?></td>
                      <td><?php echo $urunlercek['urun_adet']?></td>
                      
                      <td><a href="urunler-duzenle.php?id=<?php echo $urunlercek['urun_id']?>&katid=<?php echo $urunlercek['kategori_id']?>">
                      <button type="submit" class="btn btn-success ">DÜZELT</button></a></td>
                      <form action="işlem/işlem.php" method="POST">
                      <td>
                        <input type="hidden" name="id" value="<?php echo $urunlercek['urun_id'] ?>">
                      <input type="hidden" name="resim" value="<?php echo $urunlercek['urun_resim'] ?>">
                      <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                      <button name="urunlersil" type="submit" class="btn btn-danger">SİL</button></td>
                        </form>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <a href="urunler-ekle.php?katid=<?php echo @$_GET['katid'] ?>"><button style="width:100%" type="submit" class="btn btn-info">urunler Ekle</button></a>
            </div>
          </div>
        </div>


   

</section>
</div>

  <?php require_once "footer.php" ?>