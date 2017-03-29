@extends('layouts.master_page')

@section('content')
<div class="alert alert-success hidden" id="alertmsg">
    <p>تمت اضافة الجلسة بنجاح</p>
</div>
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
                                               class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit" ></i></a>
                                            <a href="{{ route('delete_sitting',$s->sitting_id)}}"
                                               class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach




                                </tbody>
                                <tfoot><tr>
                                        <td colspan="7">عدد الجلسات :<b>{{ count($sittings)}}</b></td>

                                    </tr></tfoot>
                            </table>
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">
                                إضافة جلسة
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!--/col-->
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">اضافة جلسة</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'sitting.store','method' => 'post','class' => 'form-horizontal','id' => 'FormAdd','role' => 'form']) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-sm-2"><label>تاريخ الجلسة</label></div>
                    <div class="col-sm-10"><input type="date" class="form-control"
                                                  name="sitting_date"
                                                  value="{{ old('sitting_date') }}" required autofocus></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2"><label>الاجراء المقبل</label></div>
                    <div class="col-sm-10"> <input  type="text" class="form-control"
                                                    name="next_procedure"
                                                    value="{{ old('next_procedure') }}" required></div>

                </div>
                <div class="form-group">
                    <div class="col-sm-2"><label>منطوق الحكم</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control"
                                                  name="Verdict"
                                                  value="{{ old('Verdict') }}" required></div>

                </div>
                <div class="form-group">
                    <div class="col-sm-2"><label>الملف</label></div>
                    <div class="col-sm-10"> <select name="file_reference" class="form-control">
                            @if ($files)
                            @for ($i=0;$i < count($files) ;$i++)
                            <option value="{{ $files[$i]->file_reference }}">{{ $files[$i]->file_reference}}</option>
                            @endfor
                            @endif
                        </select></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-primary">حفظ الجلسة</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/function.js') }}"></script>
@stop