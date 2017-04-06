<!-- Modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تعديل ملف</h4>
            </div>
            <div class="modal-body">
                {{ Form::open(['method' => 'PUT','route' => ['file.update','1'],'class' => 'form-horizontal','id' => 'FormEdit','role' => 'form']) }}
                <input type="hidden" name="file_id" value="">
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="city">المحكمة</label>
                    </div>
                    <div class="col-sm-5">
                        <select id="ecourts" name="courts" class="form-control" required="">
                            <option value="">------------</option>
                            @if($courts)
                            @foreach($courts as $court)
                            <option value="{{ $court->id }}">{{ $court->name }}</option>
                            @endforeach
                            @endif
                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="col-sm-5">

                        <select id="esub_courts" name="sub_courts" class="form-control" required="">
                            <option value="">------------</option>

                        </select>
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>الرقم المرجعي </label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="reference" required=""></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>نوع الملف</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control"
                                                 name="type"
                                                 value="{{ old('type') }}"></div>
                    <div class="col-sm-1"><label>الشعبة</label></div>
                    <div class="col-sm-5"><input type="text" class="form-control" name="division"></div>    
                </div>


                <div class="form-group row">
                    <div class="col-sm-2"><label>الموضوع</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="subject"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label> الرقم الابتدائي</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control" name="elementary_num"></div>
                    <div class="col-sm-1"><label>تاريخ التسجيل</label></div>
                    <div class="col-sm-5"><input type="date" class="form-control"
                                                 name="registration_date"
                                                 value="{{ old('registration_date') }}"></div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"><label>القاضي المقرر</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control"
                                                 name="decision_judge"
                                                 value="{{ old('decision_judge') }}"></div>
                    <div class="col-sm-2"><label>الرقم الاستئنافي</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control"
                                                 name="appellate_num"
                                                 value="{{ old('appellate_num') }}"></div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"><label>القاضي المستشار</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="appellate_judge"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>قرار الحكم</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="verdict"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>تاريخ قرار الحكم</label></div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="verdict_date">
                    </div>
                    <div class="col-sm-2">
                        {{ Form::selectRange('minute', 0, 60, 0, ['class' => 'form-control']) }}
                    </div>
                    <div class="col-sm-2">
                        {{ Form::selectRange('heure', 0, 24, 0, ['class' => 'form-control']) }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-primary">حفظ الملف</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>