@extends('layouts.master_page')

@section('content')

<div class="container">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">محاكم الإستئناف</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="card">
                        <div class="card-block">
                            <table class="table table-responsive table-bordered table-striped table-condensed">
                                <thead>
                                    <tr>
                                        <th>رقم الجلسة</th>
                                        <th>الملف</th>
                                        <th>الاجراء المقبل</th>
                                        <th>منطوق الحكم</th>
                                        <th>تاريخ الجلسة</th>
                                        <th>تاريخ الاضافة</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sittings as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>
                                        <td>{</td>
                                    </tr>
                                    @endforeach
                                    
                                        <td>
                                            <p data-placement="top" data-toggle="tooltip" title="تعديل" data-original-title="Edit" class="p-btn">
                                                <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit">
                                                    <span class="glyphicon glyphicon-pencil"></span></button></p>
                                            <p data-placement="top" data-toggle="tooltip" title="حذف" data-original-title="Delete" class="p-btn">
                                                <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                                                    <span class="glyphicon glyphicon-trash"></span></button></p>
                                        </td>
                                    

                                </tbody>
                                <tfoot><tr>
                                        <td colspan="7">عدد الجلسات :<b>5</b></td>

                                    </tr></tfoot>
                            </table>
                            <a class="btn btn-link" href="{{ route('court.create') }}">
                                <button type="submit" class="btn btn-primary p-x-2">إضافة محكمة</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">المحاكم الإبتدائية</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">المحاكــم الإداريــة
                        والتجارية</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">أقســام قضــاء الأســرة</a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </div>
            </div>
        </div>
    </div>

    <!--/col-->
</div>
</div>
@endsection