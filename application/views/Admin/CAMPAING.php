<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?=  base_url('../assets/Admin/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template-->
    <link href="<?=  base_url('../assets/Admin/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?=  base_url('../assets/Admin/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

</head>

<body id="page-top">

    <?php include('Header.php'); ?>

                             <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">CREATE CATAGORYES</h6>
                                </div>
                                <div class="card-body">
                                 <form action="<?= base_url('ADMIN/CATAGORY/create/') ?>" method="post" class="form-inline" style="display: flex; justify-content: right;">
                                   <!--  
                                    <div class="form-group mx-sm-3 mb-2">
                                    <label class="sr-only">Password</label>
                                    <input type="text" class="form-control" id="inputPassword2" placeholder="CATAGORY" name="catagary">
                                    </div> -->
                                    <button type="submit" class="btn btn-primary mb-2">ADD</button>
                                    </form>
                                </div>
                             </div>

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">SENDING MAILS</h6>
                                </div>
                                <div class="card-body">
                                   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th style="text-align: center;">EMAIL</th>
                                            <th style="text-align: center;">PASSWORD</th>
                                            <!-- <th style="text-align: center;">DETAILS</th> -->
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php foreach ($result as $author): ?>
                                        <tr>
                                            <?php $id =  $author['id']; ?>
                                            <td><?= $author['id']; ?></td>
                                            <td><?= $author['title'] ?></td>
                                            <td><?= $author['contant'] ?></td>
                                            <!-- <td><?= $author['pass'] ?></td> -->

                                            <th style="display: flex; justify-content: space-around;"><a href="<?= base_url('ADMIN/CAMPAING/edit/'.$id) ?>"><i class="fa-solid fa-pen-to-square"></i></a><a href="<?= base_url('ADMIN/CAMPAING/delete/'.$id) ?>"><i class="fa-solid fa-trash"></i></a></th>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                </table> 
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
          

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=  base_url('../assets/Admin/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?=  base_url('../assets/Admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    
    <script src="<?=  base_url('../assets/Admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=  base_url('../assets/Admin/js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?=  base_url('../assets/Admin/vendor/chart.js/Chart.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?=  base_url('../assets/Admin/js/demo/chart-area-demo.js'); ?>"></script>
    <script src="<?=  base_url('../assets/Admin/js/demo/chart-pie-demo.js'); ?>"></script>

    <script src="<?=  base_url('../assets/Admin/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?=  base_url('../assets/Admin/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?=  base_url('../assets/Admin/js/demo/datatables-demo.js'); ?>"></script>

</body>

</html>