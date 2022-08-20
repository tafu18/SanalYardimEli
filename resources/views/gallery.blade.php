@include('header')
<div class="container mt-15">
    <h2 class="text-center color-text mb-5">Gerçekleştirilen Bağışlar</h2>
    <div class="container-fluid">
        <div class="px-lg-5">
            <div class="row">
                @foreach($matches as $match)
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 gallery-width">
                        <div class="bg-white rounded shadow-sm"><a id="donation_img" target="_blank" href="{{$match->img_src}}"><img src="{{$match->img_src}}" width="120px!important" height="120px!important" alt="" class="img-fluid card-img-top"></a>
                            <div class="p-4">
                                <h5 class="text-center dotdotdot"> <a href="#" class="text-dark">{{$match->donation_name}}</a></h5>
                                <p class="small text-muted mb-0 text-center" style="font-size: 70%!important;">Bağış Numarası -> Talep Numarası</p>
                                <p class="small text-muted mb-0 text-center">{{$match->donation_id}} <b> -> </b> {{$match->demand_id}}</p>
                                <div style="border-radius: 50rem;" class="d-flex align-items-center justify-content-center-2 rounded-pill bg-light px-3 py-2 mt-4">
                                    <div style="border-radius: 50rem; color: #fff; background-color: black" class="badge px-3 rounded-pill font-weight-normal">{{substr($match->created_at, 0, 10)}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="panel-footer">
                <div class="row">
                    {{ $matches->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')