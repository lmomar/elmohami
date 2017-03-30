@extends('layouts.master_page')

@section('content')

    <div class="container">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">إضافة ملف</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <form>
                            <div class="panel-body">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>بطاقة </strong>
                                        <small>الملف</small>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="form-group col-sm-5">
                                                <label for="city">المحكمة</label>
                                                <select id="courts" name="courts" class="form-control">
                                                    <option value="0">------------</option>
                                                    @if($courts)
                                                        @foreach($courts as $court)
                                                            <option value="{{ $court->court_id }}">{{ $court->court_name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-5">
                                                <label for="sub_courts">&nbsp;</label>
                                                <select id="sub_courts" name="sub_courts" class="form-control">
                                                    <option value="0">------------</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <label for="city">الرقم المرجعي للملف</label>
                                                <input type="text" class="form-control" id="company"
                                                       placeholder="Enter your company name">
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="city">نوع الملف</label>
                                                <input type="text" class="form-control" id="company"
                                                       placeholder="Enter your company name">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="city">الموضوع</label>
                                                <input type="text" class="form-control" id="company"
                                                       placeholder="Enter your company name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <label for="city">رقم الملف بالمحكمة</label>
                                                <input type="text" class="form-control" id="company"
                                                       placeholder="Enter your company name">
                                            </div>
                                            <div class="form-group col-sm-3">
                                                <label for="city">تاريخ التسجيل</label>
                                                <input class="form-control en" type="date"
                                                       value="2011-08-19T13:45:00"
                                                       id="example-datetime-local-input">
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="city">المستشار/ القاضي المقرر</label>
                                                <input type="text" class="form-control" id="company"
                                                       placeholder="Enter your company name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-3">
                                                <input type="submit" class="btn btn-primary" value="إضافة ملف"
                                                       id="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> لائحة الأطراف</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    <table class="table table-striped en">
                        <thead>
                        <tr>
                            <th>النوع</th>
                            <th>الصفة</th>
                            <th>الإسم الكامل</th>
                            <th>الهاتف</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@if($courts)--}}
                        {{--@foreach($courts as $court)--}}
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        {{--@endforeach--}}
                        {{--@endif--}}
                        </tbody>
                    </table>
                    <a class="btn btn-link" href="{{ route('court.create') }}">
                        <button type="submit" class="btn btn-primary p-x-2">إضافة طرف</button>
                    </a>
                </div>
            </div>
        </div>


        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"> لائحة الإجراءات</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="card">
                        <div class="card-block">
                            <table class="table table-striped en">
                                <thead>
                                <tr>
                                    <th>تاريخ الإجراء</th>
                                    <th>نوع الإجراء</th>
                                    <th>القرار</th>
                                    <th>تاريخ الجلسة المقبلة</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@if($courts)--}}
                                {{--@foreach($courts as $court)--}}
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>

                                {{--@endforeach--}}
                                {{--@endif--}}
                                </tbody>
                            </table>
                            <a class="btn btn-link" href="{{ route('court.create') }}">
                                <button type="submit" class="btn btn-primary p-x-2">إضافة إجراء</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#courts').on('change', function (e) {
            console.log(e);
            var parent_id = e.target.value;

            $.get('/sub_courts?parent_id=' + parent_id, function (data) {
                $('#sub_courts').empty();
                $.each(data, function (index, subCatObj) {
                    $('#sub_courts').append('<option value="' + subCatObj.court_id + '">' + subCatObj.court_name + '</option>');
                });
            });
        });
    </script>
@endsection