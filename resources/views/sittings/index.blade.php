@extends('layouts.master_page')

@section('content')

<div class="container">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">الجلسات</a>
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
                                        <td>{{ $s->sitting_id }}</td>
                                        <td>{{ $s->file_reference }}</td>
                                        <td>{{ $s->next_procedure }}</td>
                                        <td>{{ $s->Verdict }}</td>
                                        <td>{{ $s->sitting_date }}</td>
                                        <td>{{ $s->created_at }}</td>
                                        <td>
                                            <a href="{{ route('show_edit_sitting',$s->sitting_id)}}"
                                               class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a href="{{ route('delete_sitting',$s->sitting_id)}}"
                                               class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach




                                </tbody>
                                <tfoot><tr>
                                        <td colspan="7">عدد الجلسات :<b>5</b></td>

                                    </tr></tfoot>
                            </table>
                            <a class="btn btn-link" href="{{ route('sitting.create') }}">
                                <button type="submit" class="btn btn-primary p-x-2">إضافة جلسة</button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!--/col-->
</div>
</div>
@endsection