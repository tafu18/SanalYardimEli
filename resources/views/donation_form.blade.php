@include('header')

<div class="mt-15">
    <div class="container mt-15 mb-5">
        <form action="{{ route('addDonation') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="donation_type">
                    <input type="text"  name="donation_type_inp" value="{{request('donation_type')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Ad</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Adınız" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Soyad</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Soyadınız" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone">Telefon Numarası</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="5XXXXXXXXX" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Mail Adresi</label>
                    <input type="mail" class="form-control" name="email" id="email" placeholder="Mail Adresiniz" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="qty">Adet Sayısı</label>
                    <input type="text" class="form-control" name="qty" id="qty" placeholder="Adet Sayısı" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="type">Bağış Şekli</label>
                    <select onchange="OnSelectionChange()" id="type" class="form-select form-control" name="type" required>
                        <option selected="true" disabled value="">Bağış Şekli Seçin</option>
                        <option disabled value="0" >Nakit (Geçici Olarak Devre Dışı)</option>
                        <option value="1">Ürün</option>
                    </select>
                </div>

                <div style="margin-left: 8px;" class="detail">
                    <span id="typeText"></span>
                </div><br>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Adres</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Adresiniz" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="diger">Diğer İstekler</label>
                    <input type="text" class="form-control" name="another" id="another" placeholder="Diğer İstekler">
                </div>    
            </div>  

            <div id="typeDiv1" class="form-row">
                <div class="form-group col-md-6">
                    <label for="cardno">Kart Numarası</label>
                    <input type="text" class="form-control" name="cardno" id="cardno" placeholder="Kart Numarası">
                </div>
                <div class="form-group col-md-6">
                    <label for="skty">Son Kullanma Tarihi - Yıl</label>
                    <input type="number" class="form-control" name="skty" id="skty" placeholder="23">
                </div>
            </div>
            <div id="typeDiv2" class="form-row">
                <div class="form-group col-md-6">
                    <label for="skta">Son Kullanma Tarihi - Ay</label>
                    <input type="number" class="form-control" name="skta" id="skta" placeholder="05">
                </div>
                <div class="form-group col-md-6">
                    <label for="cvv">CVV</label>
                    <input type="number" class="form-control" name="cvv" id="cvv" placeholder="CVV">
                </div>
            </div>

            <button type="submit" class="btn btn-special" >Gönder</button>
        </form>

    </div>
</div>
<script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }//Tarayıcının input geçmişini siler.

    function OnSelectionChange()
    {
        var e = document.getElementById("type");
        var value = e.value;                    
        if(value == 1) {
            const typeDiv1 = document.getElementById("typeDiv1");
            const typeDiv2 = document.getElementById("typeDiv2");

            typeDiv1.style.display = 'none';

            typeDiv2.style.display = 'none';

            document.getElementById("typeText").innerHTML = "Bağışlarınızı Tayfun Taşdemir Adına NEÜ Seydişehir Ahmet Cengiz Mühendislik Fakültesine Getirebilirsiniz. Eğer Bağışı Getirme İmkanınız Yoksa Bizimle İletişime Geçiniz.(Sayfanın En Üst Kısmında Telefon Numarası Mevcuttur.)";

        }
        else if(value == 0){
            document.getElementById("typeText").innerHTML = "";
            const typeDiv1 = document.getElementById("typeDiv1");
            const typeDiv2 = document.getElementById("typeDiv2");

            typeDiv1.style.display = 'flex';

            typeDiv2.style.display = 'flex';
        }
    }
</script>

@include('footer')