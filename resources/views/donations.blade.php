@include('header')
<section class="rotate"></section>
<section class="rotate-reverse"></section>
<section class="mt-15 mb-5">
    <div class="container">
        <h2 class="text-center color-text mb-5">Bağışlar Tablosu</h2>
        <div class="container">
            <div class="row justify-content-center-2">
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-3 col-xs-12">
                                    <h4 class="title">Bağışlar <span>Listesi</span></h4>
                                </div>
                                <div class="col-sm-9 col-xs-12 text-right">
                                    <div class="btn_group">
                                        <input type="text" class="form-control" id="myInput" onkeyup="filter()" placeholder="Bağış Numarası">
                                        <button class="btn btn-default" onclick="reloadPage()" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                        <button class="btn btn-default" onclick="createPDF()" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                        <button class="btn btn-default" disabled title="Excel"><i class="fas fa-file-excel"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive" id="tab">
                            <table class="table text-center" id="myTable">
                                <thead>
                                    <tr>
                                        <th >#</th>
                                        <th >Bağış Numarası</th>
                                        <th >Bağış Türü</th>
                                        <th >Bağış Adedi</th>
                                        <th >Bağış Durumu</th>
                                        <th >Bağış Detayı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($donations as $donation)
                                        <tr>
                                            <!-- <td>{{$donation->id}}</td> -->
                                            <td>@if($counter <= $donationsToplam[0]->Counter) {{$counter++}}@endif</td>
                                            <td>{{$donation->donation_uniq_id}}</td>
                                            <td>{{$donation->donation}}</td>

                                            @if($donation->status == 2)<td>{{$donation->qty}} Adet Yapıldı</td>
                                            @else<td>{{$donation->qty_control}} Adet Kaldı</td>
                                            @endif

                                            @if($donation->status == 0)<td><span style="width:100px" class="text-center badge badge-fail badge-pill">Beklemede</span></td>
                                            @elseif($donation->status == 1)<td><span style="width:100px" class="text-center badge-current badge-pill">Sıraya Alındı</span></td>
                                            @elseif($donation->status == 2)<td><span style="width:100px" class="text-center badge-complete badge-pill">Tamamlandı</span></td>
                                            @endif
                                            <td>
                                                <ul class="action-list">
                                                    <li><a href="donation_details?donation_id={{$donation->donation_uniq_id}}" target="_Blank" data-tip="Bağış Detayı"><i class="fa fa-info-circle info-ico"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col col-sm-6 col-xs-6">Toplamda <b>{{$donationsToplam[0]->Counter}}</b> adet <b>bağış</b> yapıldı.</div>
                               <!-- <div class="col-sm-6 col-xs-6">
                                    <ul class="pagination hidden-xs pull-right">
                                        <li><a href="#"><</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">></a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 







    </div>
</section>
@include('footer')

<script>
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

    function reloadPage(){
        location.reload();
    }

    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }

</script>