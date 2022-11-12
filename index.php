<?php include 'includes/session.php'; ?>
<?php
	$where = '';
	if(isset($_GET['category'])){
		$catid = $_GET['category'];
		$where = 'WHERE Category = '.$catid;
	}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>

        <div class="content-wrapper">
            <div class="container">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
                            <div class="box">
                                <div class="box-header with-border">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" id="searchBox"
                                            placeholder="اكتب للبحث">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-primary btn-flat btn-lg"><i
                                                    class="fa fa-search"></i> </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="input-group col-sm-5">
                                        <span class="input-group-addon">الفئة:</span>
                                        <select class="form-control" id="catlist">
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
                                    <table class="table table-bordered table-striped" id="booklist">
                                        <thead>
                                            <th>الفئة</th>
                                            <th>ISBM</th>
                                            <th>اسم الكتاب ( عنوانه)</th>
                                            <th>المؤلف</th>
                                            <th>تأريخ النشر</th>
                                            <th>السعر</th>
                                            <th>عمليات</th>
                                        </thead>
                                        <tbody>
                                            <?php
                    $sql =$pdo->prepare("SELECT * FROM book LEFT JOIN catgories ON catgories.id=book.Category $where") ;
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
                          <td>".date('M d, Y', strtotime($row->PublishDate))."</td>
                          <td>".$row->price."</td>
                          <td><form action='shopping.php' method='POST'><button type='submit' name = 'add' value='".$row->id."'><i class='fa fa-edit'></i> اضافة للسلة</button></form></td>
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
        </div>

        <?php include 'includes/footer.php'; ?>
    </div>

    <?php include 'includes/scripts.php'; ?>
    <script>
    $(function() {
        $('#catlist').on('change', function() {
            if ($(this).val() == 0) {
                window.location = 'index.php';
            } else {
                window.location = 'index.php?category=' + $(this).val();
            }

        });
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            $('#addcart').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'sohpping.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.idbook').val(response.id);
    }
  });
}
    </script>
</body>

</html>