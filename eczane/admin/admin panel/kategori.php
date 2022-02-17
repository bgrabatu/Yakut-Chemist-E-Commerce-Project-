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
                <h3 class="card-title">Kategori Tablosu</h3>
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
                      <th>Kategori Numara</th>
                      <th>Kategori Adı</th>
                      <th>Kategori Sırası</th>
                      <th>Kategori Durum</th>
                        <th>Düzenle</th>
                      <th>Sil</th>
                      <th>Ürünler</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                    $kategori=$baglanti->prepare("SELECT * FROM kategori order by kategori_id ASC");
                    $kategori->execute();
                    while($kategoricek=$kategori->fetch(PDO::FETCH_ASSOC))
                    { ?>
                    <tr>
                      <td><?php echo $kategoricek['kategori_id']?></td>
                      <td><?php echo $kategoricek['kategori_adi']?></td>
                      <td><?php echo $kategoricek['kategori_sira']?></td>
                      <td><span class="tag tag-success">
                        <?php
                            if( $kategoricek['kategori_durum']=="1")
                            {
                                echo "Aktif";
                            }
                            else if( $kategoricek['kategori_durum']=="0")
                            {
                                echo "Pasif";
                            }



                        ?>
                      </span></td>
                      <td><a href="kategori-duzenle.php?id=<?php echo $kategoricek['kategori_id']?>">
                      <button type="submit" class="btn btn-success ">DÜZELT</button></a></td>
                      <td><a href="işlem/işlem.php?kategorisil&id=<?php echo $kategoricek['kategori_id'] ?>">
                      <button type="submit" class="btn btn-danger">SİL</button></a></td>
                      <td><a href="urunler.php?katid=<?php echo $kategoricek['kategori_id']?>"><button type="submit" class="btn btn-secondary">Git</button></a></td>
                    </tr>
            <?php } ?>
                  </tbody>
                </table>
              </div>
              <a href="kategori-ekle.php"><button style="width:100%" type="submit" class="btn btn-info">Kategori Ekle</button></a>
            </div>
          </div>
        </div>


   

</section>
</div>

  <?php require_once "footer.php" ?>