<?php include 'includes/session.php'; ?>
<?php
  $catid = 0;
  $where = '';
  if(isset($_GET['category'])){
    $catid = $_GET['Category'];
    $where = 'WHERE Category = '.$catid;
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ادارة الكتب
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li>الكتب</li>
        <li class="active">ادارة الكتب</li>
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
              <div class="box-tools pull-right">
                <form class="form-inline">
                  <div class="form-group">
                    <select class="form-control input-sm" id="select_category">
                      <option value="0">ALL</option>
                      <?php
                        $sql =$pdo->prepare("SELECT * FROM 	catgories") ;
                        $sql->execute();
                        while($catrow = $sql->fetch(PDO::FETCH_OBJ)){
                          $selected = ($catid == $catrow->id) ? " selected" : "";
                          echo "
                            <option value='".$catrow->id."' ".$selected.">".$catrow->name."</option>
                          ";
                        }
                      ?>
                    </select>
                  </div>
                </form>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>الفئة</th>
                  <th>ISBM</th>
                  <th>اسم الكتاب ( عنوانه)</th>
                  <th>المؤلف</th>
                  <th>تأريخ النشر</th>
                  <th>الكمية في المخزن</th>
                  <th>عمليات</th>
                </thead>
                <tbody>
                  <?php
                    $sql =$pdo->prepare("SELECT *, book.id AS bookid FROM book LEFT JOIN catgories ON catgories.id=book.Category $where") ;
                    $sql->execute();
                    while($row = $sql->fetch(PDO::FETCH_OBJ)){
                      if($row->status <=0 ){
                        $status = '<span class="label label-danger">غير متوفر</span>';
                      }
                      else{
                        $status = '<span class="label label-success">متوفر</span>'."$row->status";
                      }
                      echo "
                        <tr>
                          <td>".$row->name."</td>
                          <td>".$row->ISBM."</td>
                          <td>".$row->Namebook."</td>
                          <td>".$row->AuthorId."</td>
                          <td>".$row->PublishDate."</td>
                          <td>".$status."</td>
                          <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row->bookid."'><i class='fa fa-edit'></i> تعديل</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row->bookid."'><i class='fa fa-trash'></i> حذف</button>
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
  <?php include 'includes/book_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('#select_category').change(function(){
    var value = $(this).val();
    if(value == 0){
      window.location = 'book.php';
    }
    else{
      window.location = 'book.php?Category='+value;
    }
  });

  $(document).on('click', '.edit', function(e){
    e.preventDefault();
    $('#edit').modal('show');
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
    url: 'book_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.bookid').val(response.bookid);
      $('#edit_isbn').val(response.ISBM);
      $('#edit_title').val(response.Namebook);
      $('#catselect').val(response.category_id).html(response.name);
      $('#edit_author').val(response.AuthorId);
      $('#edit_publisher').val(response.PublishDate);
      $('#datepicker_edit').val(response.PublishDate);
      $('#del_book').html(response.Namebook);
    }
  });
}
</script>
</body>
</html>
