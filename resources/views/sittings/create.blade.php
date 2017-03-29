@extends('layouts.master_page')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 m-x-auto pull-xs-none vamiddle">
            <div class="card">
                <div class="card-block p-a-2">
                    <h1>إضافة جلسة</h1>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('sitting.store') }}">
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

                        <button type="submit" class="btn  btn-success">
                            <i class="icon-user-follow"></i>
                            اضافة الجلسة
                        </button>
                        <a class="btn btn-primary" href="{{ route('sittings') }}">
                            الرجوع الى القائمة
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
