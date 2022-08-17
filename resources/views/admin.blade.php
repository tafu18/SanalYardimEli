<?php 
/* ob_start();
session_start();
if($_SESSION['name'] == null) header("Location:login.php");
require_once 'header.php';  require_once 'db.php';

$query_donations = $db->prepare("SELECT * FROM `donations` WHERE `status` != 2  ORDER BY id DESC");
$query_donations->execute();
$donations = $query_donations->fetchAll(PDO::FETCH_ASSOC);

$query_demands = $db->prepare("SELECT * FROM `demands` WHERE `status` != 2 ORDER BY id DESC");
$query_demands->execute();
$demands = $query_demands->fetchAll(PDO::FETCH_ASSOC);



 */
?>
@include('header')
<section class="rotate"></section>
<section class="rotate-reverse"></section>
<section class="mt-15 mb-5">
    <div class="container">
        <div class="justify-content-right form-row">
            <button onclick="logout()" name="close" class="btn btn-special col-2" >Çıkış Yap</button>
        </div>
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{session('message')}}
                {{$sessionLogin}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h2 class="text-center color-text mb-5"><b>Genel Bilgi Düzenleme Tabloları</b></h2>
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
                                            <td>@if($counterDonation <= $donationsToplam[0]->Counter) {{$counterDonation++}}@endif</td>
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


<section class="mt-15 mb-5">
    <div class="container">
        <h2 class="text-center color-text mb-5"><b>Genel Bilgi Düzenleme Tabloları</b></h2>
        <div class="container">
            <div class="row justify-content-center-2">
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-3 col-xs-12">
                                    <h4 class="title">Talepler <span>Listesi</span></h4>
                                </div>
                                <div class="col-sm-9 col-xs-12 text-right">
                                    <div class="btn_group">
                                        <input type="text" class="form-control" id="myInput2" onkeyup="filter2()" placeholder="Talep Numarası">
                                        <button class="btn btn-default" onclick="reloadPage()" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                        <button class="btn btn-default" onclick="createPDF2()" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                        <button class="btn btn-default" disabled title="Excel"><i class="fas fa-file-excel"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive" id="tab2">
                            <table class="table text-center" id="myTable2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Talep Numarası</th>
                                        <th>Talep Türü</th>
                                        <th>Cinsiyet Ve Beden</th>
                                        <th>Talep Durumu</th>
                                        <th>Talep Detayı</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($demands as $demand)
                                        <tr>
                                        <td>@if($counterDemand <= $demandsToplam[0]->Counter) {{$counterDemand++}}@endif</td>
                                            <td>{{$demand->demand_uniq_id}}</td>
                                            <td>{{$demand->demand}}</td>

                                            <td>
                                                @if($demand->gender == null) --- - 
                                                @else {{$demand->gender}} - 
                                                @endif
                                                @if($demand->demand == "Ayakkabı Yardımı") {{$demand->shoes_size}}
                                                @elseif($demand->demand == "Elbise Yardımı") {{$demand->size}}
                                                @else ---
                                                @endif
                                            </td>
                                            <td>
                                                @if($demand->status == 0)<span style="width:100px" class="text-center badge badge-fail badge-pill">Beklemede</span>
                                                @elseif($demand->status == 1)<span style="width:100px" class="text-center badge-current badge-pill">Sıraya Alındı</span>
                                                @elseif($demand->status == 2)<span style="width:100px" class="text-center badge-complete badge-pill">Tamamlandı</span>
                                                @endif
                                            </td>
                                            <td>
                                                <ul class="action-list">
                                                    <li><a href="demand_details?demand_id={{$demand->demand_uniq_id}}" target="_Blank" data-tip="Talep Detayı"><i class="fa fa-info-circle info-ico"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                            <div class="col col-sm-6 col-xs-6">Toplamda <b>{{$demandsToplam[0]->Counter}}</b> adet <b>talep</b> oluşturuldu.</div>
                                <!--<div class="col-sm-6 col-xs-6">
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

<section class="mb-5">
    <div class="container">
        <h2 class="text-center color-text mb-5">Bağış Talep Eşleştirmesi</h2>
        <div class="row">
            <form action="" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="donation_id">Bağış Numarası</label>
                        <input type="text" class="form-control" name="donation_id" id="donation_id" placeholder="Bağış Numarası" required disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="demand_id">Talep Numarası</label>
                        <input type="text" class="form-control" name="demand_id" id="demand_id" placeholder="Talep Numarası" required disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="img_src">Resim Linki</label>
                        <input type="text" class="form-control" name="img_src" id="img_src" placeholder="Resim Linki" required disabled>
                    </div>
                </div>
                <div class="form-row">
                    <button type="submit" class="btn btn-special col-md-12 mb-3" disabled>Gönder</button>
                </div>
                <div class="form-row">
                    <button type="button" onclick="window.location.href='last_donation'" class="btn btn-special col-12" >Geçmiş Bağışlar ve Talepler</button>
                    <button type="button" onclick="window.location.href='control'" class="btn btn-special col-12" >Kontrol Tablosu</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include('footer')
<script>
    function logout() {
        window.location.href = "/";
    }

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

    function filter2() {
        
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput2");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable2");
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

    function createPDF2() {
        var sTable = document.getElementById('tab2').innerHTML;

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