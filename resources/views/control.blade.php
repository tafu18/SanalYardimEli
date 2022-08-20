@include('header')
<section class="rotate"></section>
<section class="rotate-reverse"></section>
<section class="mt-15 mb-5">
    <div class="container">
        <h2 class="text-center color-text mb-5">Kontrol Tablosu</h2>
        <div class="row">
            <div class="col control-table shadow rounded-lg">
            
                <table id="myTable" class="display table table-striped">
                    <thead>
                        <tr> 
                            <label for="myInput">Bağış Numarasına Göre Filtreleme</label>
                            <input type="text" class="form-control" id="myInput" onkeyup="filter()" placeholder="Bağış Numarası">
                        </tr>
                        <tr>
                            <th style="color: black;" class="text-left" scope="col">#</th>
                            <th style="color: black;" class="text-left" scope="col">Bağış Numarası</th>
                            <th style="color: black;" class="text-left" scope="col">Talep Numarası</th>
                            <th style="color: black;" class="text-left" scope="col">Kontrol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($controls as $control)
                        <tr id="myUL" class="table-tr">
                        <form action="{{ route('controlPost') }}" method="POST">
                            @csrf
                                <th style="color: black;" class="text-left" scope="row">{{$counterControl}}</th>
                                <td style="color: black;" class="text-left"><input style="background-color: transparent; width: 80px;" type="text" name="donationid{{$counterControl}}" value="{{$control->donation_id}}" readonly></td>
                                <td style="color: black;" class="text-left"><input style="background-color: transparent; width: 80px;" type="text" name="demandid{{$counterControl}}" value="{{$control->demand_id}}"  readonly></td>
                                <input type="hidden" name="input{{$counterControl}}" value="input{{$counterControl}}" class="btn btn-special" style="margin-bottom: 0px!important;">
                                <td class="text-left"><button type="submit" name="button{{$counterControl}}"  class="btn btn-special" style="margin-bottom: 0px!important;">Onayla</button></td>
                                </form>
                        </tr>
                            @if($counterControl <= $counter[0]->Counter) {{$counterControl++}}@endif
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
        <div class="mt-5 form-row">
            <button type="button" onclick="window.location.href='admin'" class="btn btn-special col-12" >Admin Panel</button>
            <button type="button" onclick="window.location.href='last_donation'" class="btn btn-special col-12" >Geçmiş Bağışlar ve Talepler</button>
        </div>
    </div>
</section>

@include('footer')

<script> 
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}//Tarayıcının input geçmişini siler.
function filter() {
    
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
        }
    }
}
</script>