<?php 
/*     include 'header.php'; 
    include 'db.php';

    $query = $db->prepare("SELECT * FROM `donations` ORDER BY id DESC");
	$query->execute();
	$donations = $query->fetchAll(PDO::FETCH_ASSOC); */
?>
@include('header')
<section class="rotate"></section>
<section class="rotate-reverse"></section>
<section class="mt-15 mb-5">
    <div class="container">
        <h2 class="text-center color-text mb-5">Bağışlar Tablosu</h2>
<!--         <div class="row">
            <div class="col mb-4 donation-table shadow rounded-lg">
                <table id="myTable" class="display table table-striped">
                    <thead>
                        <tr> 
                            <label for="myInput"><b>Bağış Numarasına Göre Filtreleme</b></label>
                            <input type="text" class="form-control" id="myInput" onkeyup="filter()" placeholder="Bağış Numarası">
                        </tr>
                        <tr>
                            <th class="text-center" scope="col">#</th>
                            <th class="text-center" scope="col">Bağış Numarası</th>
                            <th class="text-center" scope="col">Bağış Türü</th>
                            <th class="text-center" scope="col">Bağış Adedi</th>
                            <th class="text-center" scope="col">Bağış Durumu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //$counter_donation = 1; foreach($donations as $donation){?>
                        <tr id="myUL" class="table-tr">
                            <th class="text-center" scope="row"><?php //echo $counter_donation.')';?></th>
                            <td name="li" class="text-center"><a href="<?php //echo 'donation_details.php?donation_id=' . $donation['donation_uniq_id']?>" target="_Blank"><?php //echo $donation['donation_uniq_id']?></a></td>
                            <td class="text-center"><?php //echo $donation['donation']?></td>
                            <td class="text-center"><?php //if($donation['status'] == 2) echo $donation['qty'] . ' Adet Yapıldı'; else echo $donation['qty_control'] . ' Adet Kaldı'?></td>
                            <td class="text-center"><?php //if($donation['status'] == 0) echo '<span style="width:100px" class="text-center badge badge-fail badge-pill">Beklemede</span>'; elseif($donation['status'] == 1) echo '<span style="width:100px" class="text-center badge-current badge-pill">Sıraya Alındı</span>'; elseif($donation['status'] == 2) echo '<span style="width:100px" class="text-center badge-complete badge-pill">Tamamlandı</span>';?></td>
                        </tr>
                        <?php //$counter_donation++; }?>
                    </tbody>
                </table>
            </div>
        </div> -->
        
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col col-sm-3 col-xs-12">
                                    <h4 class="title">Data <span>List</span></h4>
                                </div>
                                <div class="col-sm-9 col-xs-12 text-right">
                                    <div class="btn_group">
                                        <input type="text" class="form-control" id="myInput" onkeyup="filter()" placeholder="Bağış Numarası">
                                        <button class="btn btn-default" title="Reload"><i class="fa fa-sync-alt"></i></button>
                                        <button class="btn btn-default" title="Pdf"><i class="fa fa-file-pdf"></i></button>
                                        <button class="btn btn-default" title="Excel"><i class="fas fa-file-excel"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Age</th>
                                        <th>Job Title</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Vincent Williamson</td>
                                        <td>31</td>
                                        <td>iOS Developer</td>
                                        <td>Sinaai-Waas</td>
                                        <td>
                                            <ul class="action-list">
                                                <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                <li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Taylor Reyes</td>
                                        <td>22</td>
                                        <td>UI/UX Developer</td>
                                        <td>Baileux</td>
                                        <td>
                                            <ul class="action-list">
                                                <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                <li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Justin Block</td>
                                        <td>26</td>
                                        <td>Frontend Developer</td>
                                        <td>Overland Park</td>
                                        <td>
                                            <ul class="action-list">
                                                <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                <li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Sean Guzman</td>
                                        <td>26</td>
                                        <td>Web Designer</td>
                                        <td>Gloucester</td>
                                        <td>
                                            <ul class="action-list">
                                                <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                <li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Keith Carter</td>
                                        <td>20</td>
                                        <td>Graphic Designer</td>
                                        <td>Oud-Turnhout</td>
                                        <td>
                                            <ul class="action-list">
                                                <li><a href="#" data-tip="edit"><i class="fa fa-edit"></i></a></li>
                                                <li><a href="#" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col col-sm-6 col-xs-6">showing <b>5</b> out of <b>25</b> entries</div>
                                <div class="col-sm-6 col-xs-6">
                                    <ul class="pagination hidden-xs pull-right">
                                        <li><a href="#"><</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">></a></li>
                                    </ul>
                                </div>
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
    td = tr[i].getElementsByTagName("td")[0];
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








<?php //include 'footer.html';?>