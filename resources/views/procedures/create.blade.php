<!-- Modal -->
<div class="modal fade" id="modalAddProc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content panel panel-primary">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title panel-title" id="myModalLabel">إضافة إجراء</h4>
            </div>
            <div class="modal-body panel-body">
                {!! Form::open(['route' => 'procedure.store','method' => 'post','class' => 'form-horizontal','id' => 'FormAddProc','role' => 'form']) !!}
                {{ csrf_field() }}
                <input type="hidden" name="proc_file_id" value="" id="proc_file_id">
                <div class="form-group row">
                    <div class="col-sm-2"><label>تاريخ الإجراء </label></div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="proc_date" required="">  
                    </div>
                    <div class="col-sm-1"><label>الساعة</label></div>
                    <div class="col-sm-2">
                        {{ Form::selectRange('proc-1-heure', 00, 23, 00, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-sm-1"><label>الدقيقة</label></div>
                    <div class="col-sm-2">
                        {{ Form::selectRange('proc-1-minute', 00, 60, 00, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>نوع الإجراء </label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="type"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>القرار </label></div>
                    <div class="col-sm-10"><textarea class="form-control" rows="4" cols="8" name="decision"></textarea></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>الجلسة المقبلة </label></div>
                    <div class="col-sm-4"><input type="date" class="form-control" name="next_sitting"></div>
                    <div class="col-sm-1"><label>الساعة</label></div>
                    <div class="col-sm-2">
                        {{ Form::selectRange('proc-2-heure', 00, 23, 00, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-sm-1"><label>الدقيقة</label></div>
                    <div class="col-sm-2">
                        {{ Form::selectRange('proc-2-minute', 00, 60, 00, ['class' => 'form-control']) }}
                    </div>
                </div>


                <div class="modal-footer panel-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-primary">حفظ الإجراء</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>