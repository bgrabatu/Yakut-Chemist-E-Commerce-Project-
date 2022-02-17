<?php 
require_once "header.php" ;
require_once "sidebar.php";

?>

  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
  
</div>
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Üyeler Tablosu</h3>
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
                      <th>Kullanıcı Numara</th>
                      <th>Kullanıcı Adı</th>
                      <th>Katılım Tarihi</th>
                      <th>Yetki Mertebesi</th>
                      <th>Kullanıcı Ad Soyad</th>
                      <th>Kullanıcı Adres</th>
                      <th>Kullanıcı İl</th>
                      <th>Kullanıcı İlçe</th>
                      <th>Kullanıcı Telefon</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                    $kullanici=$baglanti->prepare("SELECT * FROM kullanici order by kullanici_id ASC");
                    $kullanici->execute();
                    while($kullanicicek=$kullanici->fetch(PDO::FETCH_ASSOC))
                    { ?>
                    <tr>
                      <td><?php echo $kullanicicek['kullanici_id']?></td>
                      <td><?php echo $kullanicicek['kullanici_ad']?></td>
                      <td><?php echo $kullanicicek['kullanici_zaman']?></td>
                      <td><span class="tag tag-success">
                        <?php
                            if( $kullanicicek['kullanici_yetki']=="2")
                            {
                                echo "Admin";
                            }
                            else if( $kullanicicek['kullanici_yetki']=="1")
                            {
                                echo "Müşteri";
                            }



                        ?>
                      </span></td>
                      <td><?php echo $kullanicicek['kullanici_adsoyad']?></td>
                      <td><?php echo $kullanicicek['kullanici_adres']?></td>
                      <td><?php echo $kullanicicek['kullanici_il']?></td>
                      <td><?php echo $kullanicicek['kullanici_ilce']?></td>
                      <td><?php echo $kullanicicek['kullanici_tel']?></td>
                      <td><button type="submit" class="btn btn-success ">DÜZELT</button</td>
                      <td><a href="işlem/işlem.php?kullanicisil&id=<?php echo $kullanicicek['kullanici_id'] ?>"><button type="submit" class="btn btn-danger">SİL</button></a></td>
                    </tr>
            <?php } ?>
                  </tbody>
                </table>
              </div>
              <a href="uyeler-ekle.php"><button style="width:100%" type="submit" class="btn btn-info">Kullanıcı Ekle</button></a>
            </div>
          </div>
        </div>


   

</section>
</div>

  <?php require_once "footer.php" ?>