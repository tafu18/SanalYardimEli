@include('header')
    <div class="bagis">
        <div style="margin-bottom: 0!important;" class="jumbotron jumbotron-fluid pt-5">
            <div class="text-center d-block d-sm-none">
                <a href="#deneme"><button class="btn btn-special">Bağış Yap</button></a>
                <a href="#deneme"><button class="btn btn-special">Yardım Talep Et</button></a>
            </div>
            <div class="container">
                <h1 class="display-4">Bağışlar</h1>
                <p class="lead">Sizlerin Yapmış Olduğu Bağış Miktarları.</p>
            </div>
        </div>
        <div style="background-color: #253949!important;" class="nav justify-content-center-2 tabs color-theme row">
            @foreach ($donations as $donation)

                <div class="donation-total-table shadow rounded-lg align-items-center display-flex flex-column p-3 height">
                    <div class="display-flex flex-column justify-content-around align-items-center">
                        <img
                            width = 90
                            height = 100
                            class="mx-auto mx-md-0 align-items-center"
                            src="{{$donation->img_src}}"
                            alt=""
                        />
                        <div style="color: #526b84; margin: auto;"class="source-info media-body pt-3 text-center align-items-center h-100">
                            <h5 class="mb-2 deneme"> {{$donation->sum}} </h5>
                            <div class="deneme"> {{$donation->donation}}  </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container text-center">
    @if(session('message') == "Başarılı")

        <div class="alert alert-success alert_container d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                Form Gönderme İşlemi {{session('message')}}
            </div>
        </div>

        @elseif(session('message') == "Başarrısız!!!")

        <div class="alert alert-danger alert_container d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Form Gönderme İşlemi {{session('message')}}
            </div>
        </div>

        @elseif(session('message') == "Senelik 3 Talep Hakkınız Dolmuştur!!!")

        <div class="alert alert-danger alert_container d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                {{session('message')}}
            </div>
        </div>

    @endif
    </div>

    <Section id="deneme" class="menu" >
        <h3 class="text-center my-5 h3-color">Yardımda Bulunmak Ya Da Yardım Talep Etmek İçin Aşağıdan Bağış Türünü Seçiniz.</h3>
        <hr class="mb-5"> 
        <div class="container d-flex flex-wrap" style="height: auto; margin: auto;">         
            <div class="container">
                <div class="nav justify-content-center-2 tabs color-theme">
                    <ul class="nav nav-pills mb-3 mt-3 justify-content-center-2" id="pills-tab" role="tablist">
                        <li class="nav-item pad" role="presentation">
                            <button title="Yardım Etmek İstiyorum" class="nav-link wdth btn-spec" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                                <img src="images/worker.svg" alt="" width = "70" height = "80"><br>
                                Yardım Etmek İstiyorum
                            </button>
                        </li>
                        <li class="nav-item pad" role="presentation">
                            <button title="Yardım Talep Etmek İstiyorum" class="nav-link wdth btn-spec" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                                <img src="images/employer.svg" alt="" width = "70" height = "80"><br>
                                Yardım Talep Etmek İstiyorum
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class=" d-flex flex-wrap">
                        <h3 class="text-center h3-color col-12 pt-3">Yardım Etmek İstediğiniz Kategoriyi Seçiniz</h3>
                            @foreach($donationsType as $type)
                            <div class="width-donation donation-card shadow rounded-lg align-items-center display-flex flex-column p-3">
                                <a href = "donation_form?donation_type={{$type['donation_name']}}">
                                    <div class="display-flex flex-column justify-content-around align-items-center">
                                        <img
                                            width = 90
                                            height = 100
                                            class="mx-auto mx-md-0 align-items-center"
                                            src="{{$type['donation_img']}}"
                                            alt=""
                                        />
                                        <div style="color: #526b84; margin: auto;"class="source-info media-body pt-3 text-center align-items-center h-100">
                                            <h5 class="mb-2">{{$type['donation_name']}}</h5>
                                            <div>{{$type['donation_name']}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <div class=" d-flex flex-wrap">
                        <h3 class="text-center h3-color col-12 pt-3 ">Talep Etmek İstediğiniz Yardımın Kategorisini Seçiniz</h3>
                            @foreach($donationsType as $type)
                            <div class="width-donation donation-card shadow rounded-lg align-items-center display-flex flex-column p-3">
                                <a href = "demand_form?demand_type={{$type['donation_name']}}">
                                    <div class="display-flex flex-column justify-content-around align-items-center">
                                        <img
                                            width = 90
                                            height = 100
                                            class="mx-auto mx-md-0 align-items-center"
                                            src="{{$type['donation_img']}}"
                                            alt=""
                                        />
                                        <div style="color: #526b84; margin: auto;"class="source-info media-body pt-3 text-center align-items-center h-100">
                                            <h5 class="mb-2">{{$type['donation_name']}}</h5>
                                            <div>{{$type['donation_name']}}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </Section>











    <div style="background: #eff2f5;" class="py-lg-5">
        <h3 class="mb-3 pt-3 text-center h3-color font-weight-bold">
            Yardım Sistemi Nasıl Çalışır?
        </h3>
        <table class="info-table">
            <tr>
                <td>  
                    <div class="card rounded border-0 shadow-lg mb-5">
                        <div class="card-body p-4">
                            <h5 class="card-title">
                                <i
                                    class="fas fa-file mr-2 mr-lg-3 color-text fa-lg fa-fw"
                                ></i>
                            </h5>
                            <p class="card-text">
                                İlk önce yapmak istediğiniz işlemi seçiniz (Yardım etmek 
                                ya da yardım talep etmek).
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card rounded border-0 shadow-lg mb-5">
                        <div class="card-body p-4">
                            <h5 class="card-title">
                                <i
                                    class="fas fa-address-card mr-2 mr-lg-3 color-text fa-lg fa-fw"
                                ></i>
                            </h5>
                            <p class="card-text">
                                Sonra gelen ekrandan yapacağınız ya da talep edeceğiniz yardım
                                türünü seçiniz.
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card rounded border-0 shadow-lg mb-5">
                        <div class="card-body p-4">
                            <h5 class="card-title">
                                <i
                                    class="fas fa-th-list mr-2 mr-lg-3 color-text fa-lg fa-fw"
                                ></i>
                            </h5>
                            <p class="card-text">
                                Ardından gelen formda bizlerin sizinle iletişimini daha kolay
                                sağlayabilmemiz için eksiksiz ve doğru bir şekilde doldurunuz. 
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card rounded border-0 shadow-lg mb-5">
                        <div class="card-body p-4">
                            <h5 class="card-title">
                                <i
                                    class="fas fa-at mr-2 mr-lg-3 color-text fa-lg fa-fw"
                                ></i>
                            </h5>
                            <p class="card-text">
                                Formu doldurduktan sonra mail ile bilgilendirileceksiniz.
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="card rounded border-0 shadow-lg" style="margin-bottom: 4rem!important;">
                    <div class="card-body p-4">
                        <h5 class="card-title">
                            <i
                                class="fas fa-shopping-cart mr-2 mr-lg-3 color-text fa-lg fa-fw"
                            ></i>
                        </h5>
                        <p class="card-text">
                            En son olarak yardım talep edenlerle yardım isteyenleri sistem otomatik olarak eşleştirip
                            ihtiyaç sahibine yardımı ulaştırıyoruz.
                        </p>
                    </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
@include('footer')