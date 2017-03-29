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
                        {{ Form::open(['method' => 'PUT','route' => ['update_sitting',$sitting->sitting_id]]) }}

                        <div class="form-group row">
                            <div class="col-sm-2"><label>تاريخ الجلسة</label></div>
                            <div class="col-sm-10"><input type="date" class="form-control"
                                                          name="sitting_date"
                                                          value="{{ $sitting->sitting_date }}" required autofocus></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><label>الاجراء المقبل</label></div>
                            <div class="col-sm-10"> <input  type="text" class="form-control"
                                                            name="next_procedure"
                                                            value="{{ $sitting->next_procedure }}" required></div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><label>منطوق الحكم</label></div>
                            <div class="col-sm-10"><input type="text" class="form-control"
                                                          name="Verdict"
                                                          value="{{ $sitting->Verdict }}" required></div>

                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><label>الملف</label></div>
                            <div class="col-sm-10"> <select name="file_reference" class="form-control">

                                    @if ($files)
                                    @for ($i=0;$i < count($files) ;$i++)
                                    <option value="{{ $files[$i]->file_reference }}">{{ $files[$i]->file_reference}}</option>
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