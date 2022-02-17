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
                <h3 class="card-title">Yorumlar</h3>
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
                      <th>Yorum Zamanı</th>
                      <th>Yorum Detayları</th>
                      <th>Ürün İd</th>
                      <th>Kullanıcı İd</th>
                        <th>Onayla</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                    $yorumlar=$baglanti->prepare("SELECT * FROM yorumlar order by yorum_id DESC");
                    $yorumlar->execute();
                    while($yorumlarcek=$yorumlar->fetch(PDO::FETCH_ASSOC))
                    { ?>
                    <tr>
                      <td><?php echo $yorumlarcek['yorum_zaman']?></td>
                      <td><?php echo $yorumlarcek['yorum_detay']?></td>
                      <td><?php echo $yorumlarcek['urun_id']?></td>
                      <td><?php echo $yorumlarcek['kullanici_id']?></td>
                      
                      <form action="işlem/işlem.php" method="POST">
                          <input type="hidden" name="yorumid" value="<?php echo $yorumlarcek['yorum_id']?>">
                      <td><button <?php if($yorumlarcek['yorum_onay']==1)
                      {
                          echo "disabled";
                      }?>
                      name="yorumonayla" type="submit" class="btn btn-success ">ONAYLA</button></td>
                    </form>
                      <td><a href="işlem/işlem.php?yorumlarsil&id=<?php echo $yorumlarcek['yorum_id'] ?>">
                      <button type="submit" class="btn btn-danger">SİL</button></a></td>
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