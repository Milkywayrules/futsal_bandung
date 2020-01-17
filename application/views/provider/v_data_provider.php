<!--  -->

<?php
  $members = array(
    'a' => 'd',
    'b' => 'e',
    'c' => 'f',
  );
  // $members = object($members);
  // echo "<pre>";
  // print_r($members);
  // die();
?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?php echo $heading ?> </h1>
            <button onclick="excel()" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Excel Report</button>
          </div>

          <!-- Content Row -->
          <!-- <div class="row"> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Total Penyedia Lapangan : <?php echo count($members) ?> Provider</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width='5%'>No</th>
                      <th width='21%'>Nama Provider</th>
                      <th width='20%'>E-mail</th>
                      <th width='20%'>No Telepon</th>
                      <th width='25%'>Keterangan</th>
                      <th width='10%'>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>78</td>
                      <td>Abang Futsal</td>
                      <td>abang.futsal@gmail.co.id</td>
                      <td>085623777162</td>
                      <td>Lapangan yang madep</td>
                      <td>1</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- </div> -->

        </div>
        <!-- /.container-fluid -->


<!--  -->

<script type="text/javascript">
  function excel(){
    location.href='<?php echo base_url('report/excel'); ?>';
  }
  function pdf(){
    location.href='<?php echo base_url('report/pdf'); ?>';
  }
  function confirm_delete(){
    var yakin = confirm("You are going to DELETE this data PERMANENTLY, are you sure ?");
    // if (yakin == true) {
    //   window.location.href = 'delete_url';
    // }
    return yakin;
  }
</script>
