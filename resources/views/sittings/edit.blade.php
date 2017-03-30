@extends('layouts.master_page')

@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> تعديل الجلسة 

                    </div>

                    <div class="card-block">
                        {{ Form::open(['method' => 'PUT','route' => ['update_sitting',$sitting->id]]) }}

                        <div class="form-group row">
                            <div class="col-sm-2"><label>تاريخ الجلسة</label></div>
                            <div class="col-sm-8"><input type="date" class="form-control"
                                                          name="sitting_date"
                                                          value="{{ $sitting->sitting_date }}" required autofocus></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><label>الشعبة</label></div>
                            <div class="col-sm-10"> <input  type="text" class="form-control"
                                                            name="devision"
                                                            value="{{ $sitting->devision }}"></div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><label>الطبيعة</label></div>
                            <div class="col-sm-10"><input type="text" class="form-control"
                                                          name="nature"
                                                          value="{{ $sitting->nature }}"></div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><label>القاعة</label></div>
                            <div class="col-sm-10"><input type="text" class="form-control"
                                                          name="hall"
                                                          value="{{ $sitting->hall }}"></div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><label>الملف</label></div>
                            <div class="col-sm-10"> <select name="file_id" class="form-control">

                                    @if ($files)
                                    @for ($i=0;$i < count($files) ;$i++)
                                    <option value="{{ $files[$i]->id }}">{{ $files[$i]->file_reference}}</option>
                                    @endfor
                                    @endif
                                </select></div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-check-square"></i> حفظ الجلسة</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> الغاء</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/col-->
        </div>
    </div>
</div>

@stop