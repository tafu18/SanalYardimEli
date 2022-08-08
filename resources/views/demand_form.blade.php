@include('header')
    <div class="container mt-15 mb-5">  
                <div style="margin-left: 8px;" class="detail">
                <span><img style="margin-right: 15px;" width="32px" height="32px" src="images/exclamation5.ico" alt="" >Senelik Olarak 3 Adet Talep Hakkınız Bulunmaktadır. Lütfen Bunu Göz Önüne Alarak Talepte Bulununuz!</span>
                </div><br>
        <form action="{{ route('addDemand') }}" method="POST">
        @csrf
                <div class="donation_type">
                    <input type="text"  name="demand_type_inp" value="{{request('demand_type')}}">
                </div>
            <div class="form-row">
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
            @if(request('demand_type') == "Elbise Yardımı")
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="gender">Cinsiyet</label>
                    <select class="form-select form-control" name="gender" required>
                        <option disabled selected value="0">Cinsiyetinizi Seçin</option>
                        <option value="Kadın">Kadın</option>
                        <option value="Erkek">Erkek</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="size">Beden</label>
                    <select id="clothes_size" class="form-select form-control" name="size" required>
                        <option disabled selected value="0">Beden Seçin</option>
                    </select>
                </div>
            </div>
            @endif
            @if(request('demand_type') == "Ayakkabı Yardımı")
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="gender">Cinsiyet</label>
                    <select class="form-select form-control" name="gender" required>
                        <option disabled selected value="0">Cinsiyetinizi Seçin</option>
                        <option value="Kadın">Kadın</option>
                        <option value="Erkek">Erkek</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="shoes_size">Ayakkabı Numara</label>
                    <select id="shoes_size" class="form-select form-control" name="shoes_size" required>
                        <option disabled selected value="0">Numara Seçin</option>
                    </select>
                </div>
            </div>
            @endif
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
            <button type="submit" class="btn btn-special">Gönder</button>
        </form>

    </div>
</div>
@include('footer')
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }//Tarayıcının input geçmişini siler.


    if(document.getElementById("clothes_size")){
        var sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
        var select_size = document.getElementById("clothes_size");
        var size_db = 0;
        for(size in sizes){
            size_db = size_db + 1;
            select_size.options[select_size.options.length] = new Option(sizes[size], size_db);
        }
    }

    if(document.getElementById("shoes_size")){
        var shoes_sizes = [];
        for (let i = 25;  i<= 47; i++) {
            shoes_sizes.push(i);
        }
        var select_shoes = document.getElementById("shoes_size");
        for(shoes_size in shoes_sizes) {
            select_shoes.options[select_shoes.options.length] = new Option(shoes_sizes[shoes_size], shoes_sizes[shoes_size]);
        }
    }

</script>