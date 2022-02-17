<div class="card card-primary col-md-12">
    <div class="card-header">
        <h3 class="card-title">Genel Uyarı</h3>
    </div>

    <form action="işlem/islem.php" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Site Başlığı</label>
                <input name="baslik"type="email" class="form-control" place_holder="Site Başlığı Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Açıklama</label>
                <input name="aciklama"type="email" class="form-control" place_holder="Site Açıklaması Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Anahtar Kelime</label>
                <input name="anahtarkelime"type="email" class="form-control" place_holder="Site Anahtar Kelimesini Giriniz">
            </div>
        </div>

        <div class="card-footer">
            <button name="ayarkaydet" type="submit" class="btn btn-primary">Gönder</button>
        </div>
    </form>
</div>
            
