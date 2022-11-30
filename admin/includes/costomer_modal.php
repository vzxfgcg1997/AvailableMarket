<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>اضافة زبون جديد</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="costomer_add.php">
              <input required type="hidden" class="corid" name="id">
                <div class="form-group">
                    <label for="add_name" class="col-sm-3 control-label">اسم الزبون</label>
                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="add_name" name="add_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="add_custd" class="col-sm-3 control-label">عنوان الزبون</label>
                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="add_custd" placeholder="المدينة" name="add_custd">
                      <input required type="text" class="form-control" id="add_custd" placeholder="الشارع" name="add_custs">
                      <input required type="text" class="form-control" id="add_custd" placeholder="zip كود" name="add_custz">
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_email" class="col-sm-3 control-label">البريد الإلكتروني</label>
                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="add_email" name="add_email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="add_phone" class="col-sm-3 control-label">الهاتف</label>
                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="add_phone" name="add_phone">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> الغاء</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> حفظ</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>تعديل زبون</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="costomer_edit.php">
                <input required type="hidden" class="corid" name="id">
                <div class="form-group">
                    <label for="edit_name" class="col-sm-3 control-label">اسم الزبون</label>
                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="edit_name" name="edit_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="edit_custd" class="col-sm-3 control-label">صفة الزبون</label>

                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="edit_custd" placeholder="المدينة" name="edit_custd">
                      <input required type="text" class="form-control" id="edit_custs" placeholder="الشارع" name="edit_custs">
                      <input required type="text" class="form-control" id="edit_custz" placeholder="zip كود" name="edit_custz">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">البريد الإلكتروني</label>
                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="edit_email" name="edit_email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_phone" class="col-sm-3 control-label">الهاتف</label>
                    <div class="col-sm-9">
                      <input required type="text" class="form-control" id="edit_phone" name="edit_phone">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> اغلاق</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> حفظ التعديلات</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>يتم الحذف...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="costomer_delete.php">
                <input required type="hidden" class="corid" name="id">
                <div class="text-center">
                    <p>هل أنت متأكد من حذف هذا الزبون؟</p>
                    <h2 id="del_code" class="bold"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> الغاء</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> تأكيد الحذف</button>
              </form>
            </div>
        </div>
    </div>
</div>