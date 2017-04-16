<!-- Modal -->
<div class="modal fade" id="modalEditPartie" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content panel panel-primary">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title panel-title" id="myModalLabel">إضافة طرف</h4>
            </div>
            <div class="modal-body panel-body">
                {!! Form::open(['route' => 'partie.update','method' => 'post','class' => 'form-horizontal','id' => 'FormEditPartie','role' => 'form']) !!}
                {{ csrf_field() }}
                <input type="hidden" name="e_partie_file_id" value="" id="e_partie_file_id">
                <input type="hidden" name="partie_id" value="" id="partie_id">

                <div class="form-group row">
                    <div class="col-sm-3"><label>الاسم الكامل </label></div>
                    <div class="col-sm-9"><input type="text" class="form-control" name="full_name"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"><label>الهاتف </label></div>
                    <div class="col-sm-9"><input type="text" class="form-control" name="part_phone"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"><label>النوع </label></div>
                    <div class="col-sm-9">
                        <input type="radio" name="type" value="0"><label for="type0">موكل</label>
                        <input type="radio" name="type" value="1"><label for="type1">خصم</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"><label>الطبيعة </label></div>
                    <div class="col-sm-9">
                        <input type="radio" name="nature" value="0"><label for="nature0">المدعي</label>
                        <input type="radio" name="nature" value="1"><label for="nature1">المدعى عليه</label>
                    </div>
                </div>
                
                <div class="modal-footer panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-primary">حفظ الطرف</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>