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
                    <li class="active"><a href="#tab1files">الملفات</a></li>

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
                </div>
            </div>
        </div>
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <div class="card">
                <div class="card-header" role="tab" id="headingOne">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            بطاقة الملف
                        </a>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="card-block">
                        <div class="form-group overflow-hidden">
                            <div class="col-lg-2 col-xs-6 label-color"><label>المحكمة</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="court_name"></span></div>
                            <div class="col-lg-2 col-xs-6 label-color"><label>رقم الملف بالمحكمة</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="elementary_num"></span></div>
                            <div class="col-lg-2 col-xs-6 label-color"><label>نوع الملف</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="file_type"></span></div>
                        </div>
                        <div class="form-group overflow-hidden">
                            <div class="col-lg-2 col-xs-6 label-color"><label>الشعبة</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="devision"></span></div>
                            <div class="col-lg-2 col-xs-6 label-color"><label>المستشار/القاضي المقرر</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="decision_judge"></span></div>
                            <div class="col-lg-2 col-xs-6 label-color"><label>تاريخ التسجيل</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="registration_date"></span></div>
                        </div>
                        <div class="form-group overflow-hidden">
                            <div class="col-lg-2 col-xs-6 label-color"><label>الرقم الاستئنافي</label></div>
                            <div class="col-lg-4 col-xs-6"><span class="form-control" id="appellate_num"></span></div>
                            <div class="col-lg-2 col-xs-6 label-color"><label>القاضي المستشار</label></div>
                            <div class="col-lg-4 col-xs-6"><span class="form-control" id="appellate_judge"></span></div>
                        </div>

                        <div class="form-group overflow-hidden">
                            <div class="col-lg-2 col-xs-6 label-color"><label>الموضوع</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="subject"></span></div>
                            <div class="col-lg-2 col-xs-6 label-color"><label>قرار الحكم</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="verdict"></span></div>
                            <div class="col-lg-2 col-xs-6 label-color"><label>تاريخ قرار الحكم</label></div>
                            <div class="col-lg-2 col-xs-6"><span class="form-control" id="verdict_date"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingTwo">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            الأطراف
                        </a>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="card-block">
                        <div class="card">
                            <header class="card-header">
                                <i class="fa fa-group"></i> الأطراف

                                <a href="#" class="btn btn-success btn-sm pull-left">إضافة طرف  <i class="fa fa-plus-square"></i></a></header>
                            <div class="panel-body"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingThree">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            الإجراءات
                        </a>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="card-block">
                        <div class="card">
                            <header class="card-header">
                                <i class="fa fa-table"></i> الإجراءات

                                <a href="#" class="btn btn-success btn-sm pull-left">إضافة إجراء  <i class="fa fa-plus-square"></i></a></header>
                            <div class="panel-body"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" role="tab" id="headingFour">
                    <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            الجلسات
                        </a>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour">
                    <div class="card-block">
                        <div class="card">
                            <header class="card-header">
                                <i class="fa fa-gear"></i> الجلسات

                                <a href="#" class="btn btn-success btn-sm pull-left">إضافة جلسة  <i class="fa fa-plus-square"></i></a></header>
                            <div class="panel-body"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('Files.create')
@include('Files.edit')
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