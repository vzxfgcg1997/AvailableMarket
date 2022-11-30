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
      <h1>المستخدمين</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li>المستخدمين</li>
        <li class="active">ادارة المستخدمين</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> اضافة مستخدم جديد</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th style="text-align: right;">اسم المسؤول</th>
                  <th style="text-align: right;">اسم المستخدم</th>
                  <th style="text-align: right;">كلمة المرور</th>
                  <th style="text-align: right;">صورة المسؤول</th>
                  <th style="text-align: right;">عمليات</th>
                </thead>
                <tbody>
                  <?php
                    $sql =$pdo->prepare("SELECT * FROM user") ;
                    $sql->execute();
                    while($row = $sql->fetch(PDO::FETCH_OBJ)){
                        $img = (!empty($row->imgeuser)) ? '../images/'.$row->imgeuser : '../images/profile.jpg';
                      echo "
                        <tr>
                        <td>".$row->nameuser."</td>
                          <td>".$row->username."</td>
                          <td>".$row->password."</td>
                          <td>
                            <img src='".$img."' width='30px' height='30px'>
                            <a href='#edit_photo' data-toggle='modal' class='pull-right photo' data-id='".$row->id."'><span class='fa fa-edit'></span></a>
                          </td>
                          <td>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row->id."'><i class='fa fa-trash'></i> حذف</button>
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
  <?php include 'includes/useras_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
    
  $(document).on('click', '.photo', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

  $(document).on('click', '.delete', function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'userad_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.userid').val(response.id);
      $('#del_code').html(response.nameuser);
    }
  });
}
</script>
</body>
</html>
