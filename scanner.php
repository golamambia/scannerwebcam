<?php

session_start();
if(!$_SESSION['id']){
    header("Location: index.php");
 }

include "connect.php";

$select = mysqli_query($conn, "select * from adhar");


include "sidebar.php";

?>

<style>
    hr {
        margin-top: 32px;
    }
    input[type="file"] {
        display: block;
        margin-bottom: 16px;
    }
   
    #flash-toggle {
        display: none;
    }
	.logout{
		float:right;
		margin-left: 10px;
	}
	.adharlist{
		float:right;
	}
    .form-control{
        width: 60%;
    }
    .row {
        margin-right: 0;
        margin-left: 0;
    }
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3 class="m-0">Scan from WebCam </h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 mt-1">
              <video id="video" style="border:5px inset #ececec;" class="mr-3" width="300"
                  height="300"></video>
              <canvas class="d-none" id="canvas"></canvas>
              <br>
              <button id="start" class="btn btn-secondary mt-1 mr-3 d-inline">Start Camera</button>
              <button id="take-pic" class="btn btn-success mt-1 mr-3 d-none" disabled>Capture QR Code</button>
              <h1>Scan from File:</h1>
              <input type="file" accept="image/png, image/jpeg," id="file-selector"> 
              <button id="scanObject" class="btn btn-primary mr-3">Get QR Code</button>
              <div class="col-12">
                  Decoded QR Code : <p id="qr-result"></p>
              </div>
            </div>
            <div class="col-md-6 mt-1" >
              <img width="300" height="300" class="d-inline" id="image" style="border:2px inset #ececec;">
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer"> 
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- DataTables  & Plugins -->
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <script src='capture.js'></script>
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script type="module">
        import QrScanner from "./qr-scanner.min.js";
        QrScanner.WORKER_PATH = './qr-scanner-worker.min.js';
        const fileSelector = document.getElementById('file-selector');
        const fileQrResult = document.getElementById('qr-result');
        const scanQrCodeBtn = document.getElementById('scanObject');
        scanQrCodeBtn.addEventListener('click', event => {
            //console.log("sgh");
            scanQrCode();
        });
        fileSelector.addEventListener('change', event => {
            const file = fileSelector.files[0];
            if (!file) {
                return;
            }
            snapShot = file;
            //console.log('amb '+file);
        });
        function setResult(label, result) {
            label.textContent = result;
        }
        function scanQrCode() {
          //console.log(snapShot);
            if (!snapShot) {
                alert("Select file or capture from camera");
                return;
            }
            QrScanner.scanImage(snapShot)
                .then(result => {
                    //console.log("ssss");
                    dbwrite(result);
                    setResult(fileQrResult, result)
                })
                .catch(e => setResult(fileQrResult, e || 'No QR code found.'));
        }
        function dbwrite(data) { 
          //console.log(data);
          var r = confirm("Do you want save details!");
          if (r == true) {
            var name = 'user';
            var password = 'pwd';
            $.ajax({
                type: "POST",
                url: "dbinsert.php",
                data: {"name":name,"password":password,"data":data},
                success: function (resp) {
                    //console.log(resp);
                    var res=resp.trim();
                    if(res=='success'){
                      alert("success, Record successfully saved");
                    }else{
                      alert("Sorry, Something went wrong try again");
                    }
                    
                }
            });
          }

        }
    </script>
</body>

</html>
          
