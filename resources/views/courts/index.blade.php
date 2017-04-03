@extends('layouts.master_page')

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="alert alert-success hidden" id="alertmsg">
            <p>تمت اضافة المحكمة بنجاح</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> الجلسات 
                        <a class="btn btn-xs btn-success pull-left" href="#" data-toggle="modal" data-target="#myModal">اضافة محكمة
                            <i class="fa fa-plus-square"></i>
                        </a>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>اختيار الفرع</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @if($courts_parents)
                            <select name="filter_parent" id="filter_parent" class="form-control">
                                @foreach($courts_parents as $cp)
                                <option value="{{ $cp->id }}">{{ $cp->name }}</option>
                                @endforeach
                            </select>
                            @endif
                        </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-bordered table-striped table-condensed" id="courts">
                            <thead>
                                <tr>                                        
                                    <th>الرقم</th>
                                    <th>المحكمة</th>
                                    <th>تاريخ الاضافة</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot><tr>
                                    <td colspan="7">عدد المحاكم :<b id="count">0</b></td>

                                </tr></tfoot>
                        </table>
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
                <h4 class="modal-title" id="myModalLabel">اضافة محكمة</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'court.store','method' => 'post','class' => 'form-horizontal','id' => 'FormAdd','role' => 'form']) !!}
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="col-sm-2"><label>فرع المحكمة</label></div>
                    <div class="col-sm-10">
                        @if($courts_parents)
                        <select name="parent_id" id="court_parent">
                            @foreach($courts_parents as $cp)
                            <option value="{{ $cp->id }}">{{ $cp->name }}</option>
                            @endforeach
                        </select>
                        @endif
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>اسم المحكمة</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control"
                                                  name="name"
                                                  value="{{ old('name') }}">
                        <small></small>
                    </div>
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
<script src="{{ asset('js/function2.js') }}"></script>
@stop