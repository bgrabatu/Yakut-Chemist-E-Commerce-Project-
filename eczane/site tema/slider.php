<div class="slider-with-banner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="slider-area">
                                <div class="slider-active owl-carousel">
                     <?php
                    $slider=$baglanti->prepare("SELECT * FROM slider  where slider_banner=:slider_banner and slider_durum=:slider_durum 
                    order by slider_sira ASC");
                    $slider->execute(array(
                        'slider_banner'=>1,
                        'slider_durum'=>1
                    ));
                    while($slidercek=$slider->fetch(PDO::FETCH_ASSOC))
                    { ?>     
                                    <div style="background-image:url(turkovac.png)"; 
                                    class="single-slide align-center-left  animation-style-01 bg-3">
                                        <div class="slider-progress"></div>
                                        <div class="slider-content">
                                            <h5><?php echo $slidercek['slider_baslik']?> <span>AŞISI</span></h5>
                                            <h2><?php echo $slidercek['slider_baslik']?></h2>
                                            <h3><?php echo $slidercek['slider_aciklama']?></h3>
                                            <div class="default-btn slide-btn">
                                                <a style="background-color:#7E918E" class="links" href="https://www.trthaber.com/haber/koronavirus/turkovac-ucuncu-dozda-antikoru-4-5-kat-artiriyor-638894.html">Habere Git</a>
                                            </div>
                                        </div>
                                    </div>

                        <?php } ?>            
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                            <div class="li-banner">
                                <a href="#">
                                    <img src="koronailac1.jpg" alt="">
                                </a>
                            </div>
                            <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                                <a href="#">
                                    <img src="koronailac2.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>