@include('header')

<section class="mt-10">
    <div class="container">
        <div class="row">
            
            <div class="container" style="margin-top: 2rem; margin-bottom: 3rem;">
                <h1 class="display-4">{{$demands[0]->demand_uniq_id}}</h1>
                <p class="lead">Numaralı Talebin Detayları</p>
            </div>
        </div>
        <div class="justify-content-center-2 row">
            <ul style="width: 75%; margin-bottom: 4rem;" class="list-group">

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Talep Edenin Adı Soyadı:
                    <span class="badge badge-primary badge-detail">
                        {{$cryptic_name}}
                    </span>
                </li>
                @if($demand_control != null)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Eşleşen Bağış Numarası
                    <span class="badge badge-primary badge-detail">
                         {{$demand_control[0]->donation_id}}
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Talebin Eşleşme Tarihi
                    <span class="badge badge-primary badge-detail">
                         {{$demand_control[0]->created_at}}
                    </span>
                </li>
                @endif 
                @if($demand_match != null) 
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Talebin Gerçekleştirilme Tarihi
                    <span class="badge badge-primary badge-detail">
                         {{$demand_match[0]->created_at}}
                    </span>
                </li>
                @endif
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Talebin Durumu:
                        @if($demands[0]->status == 0) <span style="width:20%" class="text-center badge badge-fail badge-pill">Beklemede</span>
                        @elseif($demands[0]->status == 1) <span style="width:20%" class="text-center badge-current badge-pill">Sıraya Alındı</span>
                        @elseif($demands[0]->status == 2) <span style="width:20%" class="text-center badge-complete badge-pill">Tamamlandı</span>
                        @endif
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Talebin Verildiği Tarih:
                    <span class="badge badge-primary badge-detail">{{$demands[0]->created_at}}</span>
                </li>
            </ul>
        </div>        
    </div>
</section>
@include('footer')