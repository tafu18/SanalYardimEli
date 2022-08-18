@include('header')

<section class="mt-10">
    <div class="container">
        <div class="row">
            
            <div class="container" style="margin-top: 2rem; margin-bottom: 2rem;">
                <h1 class="display-4">{{$donations[0]->donation_uniq_id}}</h1>
                <p class="lead">Numaralı Bağışın Detayları</p>
            </div>
        </div>
        <div class="justify-content-center-2 row">
            <ul style="width: 75%; margin-bottom: 4rem;" class="list-group">

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Bağışçının Adı Soyadı:
                    <span class="badge badge-primary badge-detail">
                        {{$cryptic_name}}
                    </span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Bağış Miktarı:
                    <span class="badge badge-primary badge-detail">{{$donations[0]->qty}}</span>
                </li>
            @foreach($donation_control as $d_c)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Eşleşen Talep Numarası
                    <span class="badge badge-primary badge-detail">
                        {{$d_c->demand_id}}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="badge badge-primary badge-detail">{{$d_c->demand_id}} ile Eşleşme Tarihi</span> 
                    <span class="badge badge-primary badge-detail">
                        {{$d_c->created_at}}
                    </span>
                </li>
            @endforeach

            @foreach($donation_match  as $d_m)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="badge badge-primary badge-detail">{{$d_m->demand_id}} ile Gerçekleştrilen Bağış Tarihi</span> 
                    <span class="badge badge-primary badge-detail">
                        {{$d_m->created_at}}
                    </span>
                </li>
            @endforeach
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Bağışın Durumu:
                        @if($donations[0]->status == 0) <span style="width:20%" class="text-center badge badge-fail badge-pill">Beklemede</span>
                        @elseif($donations[0]->status == 1) <span style="width:20%" class="text-center badge-current badge-pill">Sıraya Alındı</span>
                        @elseif($donations[0]->status == 2) <span style="width:20%" class="text-center badge-complete badge-pill">Tamamlandı</span>
                        @endif
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Bağışın Verildiği Tarih:
                    <span class="badge badge-primary badge-detail">{{$donations[0]->created_at}}</span>
                </li>
            </ul>
        </div>

        
    </div>
</section>
        
@include('footer')