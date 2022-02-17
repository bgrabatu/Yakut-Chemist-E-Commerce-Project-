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
                    <th>Slider Resim</th>
                      <th>Slider Başlık</th>
                      <th>Slider Açıklama</th>
                      <th>Slider Button İsmi</th>
                      <th>Slider Durum</th>
                      <th>Slider Sıra</th>
                      <th>Slider Banner</th>
                        <th>Düzenle</th>
                      <th>Sil</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                    $slider=$baglanti->prepare("SELECT * FROM slider order by slider_id ASC");
                    $slider->execute();
                    while($slidercek=$slider->fetch(PDO::FETCH_ASSOC))
                    { ?>
                    <tr>
                        <td><img src="resimler/slider/<?php echo $slidercek['slider_resim']?>">

                      <td><?php echo $slidercek['slider_baslik']?></td>
                      <td><?php echo $slidercek['slider_aciklama']?></td>
                      <td><?php echo $slidercek['slider_button']?></td>
                      
                      <td><span class="tag tag-success">
                        <?php
                            if( $slidercek['slider_durum']=="1")
                            {
                                echo "Aktif";
                            }
                            else if( $slidercek['slider_durum']=="0")
                            {
                                echo "Pasif";
                            }
                        ?></span></td>

                      <td><?php echo $slidercek['slider_sira']?></td>
                      <td> <?php
                            if( $slidercek['slider_banner']=="1")
                            {
                                echo "Slider";
                            }
                            else if( $slidercek['slider_banner']=="0")
                            {
                                echo "Banner";
                            }
                        ?></td>
                      
                      <td><a href="slider-duzenle.php?id=<?php echo $slidercek['slider_id']?>">
                      <button type="submit" class="btn btn-success ">DÜZELT</button></a></td>
                      <form action="işlem/işlem.php" method="POST">
                      <td>
                        <input type="hidden" name="id" value="<?php echo $slidercek['slider_id'] ?>">
                      <input type="hidden" name="resim" value="<?php echo $slidercek['slider_resim'] ?>">
                      <button name="slidersil" type="submit" class="btn btn-danger">SİL</button></td>
                        </form>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <a href="slider-ekle.php"><button style="width:100%" type="submit" class="btn btn-info">Slider Ekle</button></a>
            </div>
          </div>
        </div>


   

</section>
</div>

  <?php require_once "footer.php" ?>