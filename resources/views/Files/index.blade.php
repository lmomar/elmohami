@extends('layouts.master_page')

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="alert alert-success hidden" id="alertmsg">
            <p>تمت اضافة الملف بنجاح</p>
        </div>
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
                        <table class="table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>                                        
                                    <th>الملف</th>
                                    <th>المحكمة</th>
                                    <th>الشعبة</th>
                                    <th>الطبيعة</th>
                                    <th>القاعة</th>
                                    <th>تاريخ الاضافة</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($files as $f)
                                <tr>                          
                                    <td>{{ $f->file_reference }}</td>
                                    <td>{{ $f->sitting_date }}</td>
                                    <td>{{ $f->devision }}</td>
                                    <td>{{ $f->nature }}</td>
                                    <td>{{ $f->hall }}</td>
                                    <td>{{ $f->created_at }}</td>
                                    <td>
                                        <a href="{{ route('show_edit_sitting',$s->id)}}"
                                           class="btn btn-sm btn-primary"><i class="fa fa-pencil" ></i></a>
                                        <a href="{{ route('delete_sitting',$s->id)}}"
                                           class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                                @endforeach




                            </tbody>
                            <tfoot><tr>
                                    <td colspan="7">عدد الملفات :<b>{{ count($files)}}</b></td>

                                </tr></tfoot>
                        </table>
                        <nav>
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">السابق</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">التالي</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
    </div>
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
                <div class="form-group row">
                    <div class="col-sm-2"><label>الملف</label></div>
                    <div class="col-sm-10"> <select name="file_reference" class="form-control">
                            @if ($files)
                            @for ($i=0;$i < count($files) ;$i++)
                            <option value="{{ $files[$i]->id }}">{{ $files[$i]->file_reference}}</option>
                            @endfor
                            @endif
                        </select></div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>تاريخ الجلسة</label></div>
                    <div class="col-sm-10"><input type="date" class="form-control"
                                                  name="sitting_date"
                                                  value="{{ old('sitting_date') }}" required autofocus></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>الشعبة</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="devision"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>الطبيعة</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="nature"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>القاعة</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="hall"></div>
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

@stop