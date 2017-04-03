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
                        <table class="table table-bordered table-striped table-condensed" id="files">
                            <thead>
                                <tr>                                        
                                    <th>الملف</th>
                                    <th>نوع الملف</th>
                                    <th>الشعبة</th>
                                    <th>الموضوع</th>
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
                            {{ $files->links() }}
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
                {!! Form::open(['route' => 'file.store','method' => 'post','class' => 'form-horizontal','id' => 'FormAdd','role' => 'form']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-2"><label>رقم الملف</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="reference"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>تاريخ التسجيل</label></div>
                    <div class="col-sm-10"><input type="date" class="form-control"
                                                  name="registration_date"
                                                  value="{{ old('registration_date') }}" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>المحكمة</label></div>
                    <div class="col-sm-10"> <select name="courts" class="form-control">
                            @if ($courts)
                            @for ($i=0;$i < count($courts) ;$i++)
                            <option value="{{ $courts[$i]->id }}">{{ $courts[$i]->name}}</option>
                            @endfor
                            @endif
                        </select></div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>نوع الملف</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control"
                                                  name="type"
                                                  value="{{ old('type') }}" required></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>الموضوع</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="subject"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label> الرقم الابتدائي</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="elementary_num"></div>
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
<script src="{{ asset('js/files.js') }}"></script>
@stop