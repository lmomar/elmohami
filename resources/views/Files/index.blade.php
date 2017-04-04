@extends('layouts.master_page')

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="alert alert-success hidden" id="alertmsg">
            <p>تمت اضافة الملف بنجاح</p>
        </div>
        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1files" data-toggle="tab">الملفات</a></li>
                    <li><a href="#tab5infoFile" data-toggle="tab">بطاقة الملف</a></li>
                    <li><a href="#tab2parties" data-toggle="tab">الأطراف</a></li>
                    <li><a href="#tab3procedures" data-toggle="tab">الاجراءات</a></li>
                    <li><a href="#tab4sittings" data-toggle="tab">الجلسات</a></li>

                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1files">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-align-justify"></i> الملفات 
                                        <a class="btn btn-xs btn-success pull-left" href="#" data-toggle="modal" data-target="#myModal">اضافة ملف
                                            <i class="fa fa-plus-square"></i>
                                        </a>
                                    </div>

                                    <div class="card-block">
                                        <table class="table table-bordered table-striped table-condensed" id="files">
                                            <thead>
                                                <tr>                                        
                                                    <th>الرقم المرجعي</th>
                                                    <th>الرقم بالمحكمة</th>
                                                    <th>نوع الملف</th>
                                                    <th>القاضي المقرر</th>
                                                    <th>تاريخ التسجيل</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot><tr>
                                                    <td colspan="7">عدد الملفات :<b id="count"></b></td>
                                                </tr></tfoot>
                                        </table>
                                        <nav>
                                            <ul id="pagination" class="pagination">

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                            <!--/col-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab5infoFile">بطاقة الملف</div>
                    <div class="tab-pane fade" id="tab2parties">الأطراف</div>
                    <div class="tab-pane fade" id="tab3procedures">الاجراءات</div>
                    <div class="tab-pane fade" id="tab4sittings">الجلسات</div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">إضافة ملف</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'file.store','method' => 'post','class' => 'form-horizontal','id' => 'FormAdd','role' => 'form']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="city">المحكمة</label>
                    </div>
                    <div class="col-sm-5">
                        <select id="courts" name="courts" class="form-control">
                            <option value="0">------------</option>
                            @if($courts)
                            @foreach($courts as $court)
                            <option value="{{ $court->id }}">{{ $court->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-5">

                        <select id="sub_courts" name="sub_courts" class="form-control">
                            <option value="0">------------</option>

                        </select>
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
                    <div class="col-sm-10"><input type="text" class="form-control"
                                                  name="decision_judge"
                                                  value="{{ old('decision_judge') }}"></div>
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
@endsection
@section('script')
<script src="{{ asset('js/twbsPagination.min.js') }}"></script>
<script src="{{ asset('js/files.js') }}"></script>

<script>
$('#courts').on('change', function (e) {
    var parent_id = e.target.value;

    $.get('/files/sub_courts?parent_id=' + parent_id, function (data) {
        $('#sub_courts').empty();
        $.each(data, function (index, subCatObj) {
            $('#sub_courts').append('<option value="' + subCatObj.id + '">' + subCatObj.name + '</option>');
        });
    });
});
</script>
@stop