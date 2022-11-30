<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>ادارة الزبائن</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
                    <li>المستخدمين</li>
                    <li class="active">ادارة الزبائن</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content">
                <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i
                                        class="fa fa-plus"></i> اضافة مستخدم جديد</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th style="text-align: right;">رقم الزبون</th>
                                        <th style="text-align: right;">اسم الزبون</th>
                                        <th style="text-align: right;">البريد الإلكتورني</th>
                                        <th style="text-align: right;">رقم الهاتف</th>
                                        <th style="text-align: right;">عمليات</th>
                                    </thead>
                                    <tbody>
                                        <?php
                    $sql =$pdo->prepare("SELECT *, id_cust as 'idcust' FROM costomer");
                    $sql->execute();
                    while($row = $sql->fetch(PDO::FETCH_OBJ)){
                     echo "
                        <tr>
                          <td>".$row->id_cust."</td>
                          <td>".$row->name."</td>
                          <td>".$row->email."</td>
                          <td>".$row->phone."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row->id_cust."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row->id_cust."'><i class='fa fa-trash'></i> Delete</button>
                          </td>
                        </tr>
                      ";
                    }
                  ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/costomer_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
    $(function() {
        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $(document).on('click', '.photo', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

    });

    function getRow(id) {
        $.ajax({
            type: 'POST',
            url: 'costomer_row.php',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(response) {
                $('.corid').val(response.id_cust);
                $('#edit_custd').val(response.city);
                $('#edit_custs').val(response.st);
                $('#edit_custz').val(response.zip);
                $('#edit_name').val(response.name);
                $('#edit_email').val(response.email);
                $('#edit_phone').val(response.phone);
                $('#del_code').html(response.name);
            }
        });
    }
    </script>
</body>

</html>