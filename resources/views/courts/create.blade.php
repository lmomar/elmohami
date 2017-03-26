@extends('layouts.master_page')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 m-x-auto pull-xs-none vamiddle">
                <div class="card">
                    <div class="card-block p-a-2">
                        <h1>إضافة محكمة</h1>

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('court.store') }}">
                            {{ csrf_field() }}

                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                                <input id="court_name" placeholder="إسم المحكمة" type="text" class="form-control"
                                       name="court_name"
                                       value="{{ old('court_name') }}" required autofocus>

                            </div>
                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i>@</i>
                            </span>
                                <input id="court_address" placeholder="العنوان البريدي" type="text" class="form-control"
                                       name="court_address"
                                       value="{{ old('court_address') }}" required autofocus>

                            </div>
                           <div class="input-group m-b-1">
                            <span class="input-group-addon"><i>@</i>
                            </span>
                                <input id="court_city" placeholder="المدينة" type="text" class="form-control"
                                       name="court_city"
                                       value="{{ old('court_city') }}" required autofocus>

                            </div>

                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-call-in"></i>
                            </span>
                                <input id="court_phone" placeholder="رقم الهاتف" type="text" class="form-control en"
                                       name="court_phone"
                                       value="{{ old('court_phone') }}" required>

                            </div>

                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-call-in"></i>
                            </span>
                                <select name="court_parent" id="court_parent" class="form-control">
                                    <optgroup label="المحكمة">المحكمة</optgroup>
                                    <option></option>
                                </select>

                            </div>

                            <button type="submit" class="btn  btn-success">
                                <i class="icon-user-follow"></i>
                                إنشاء حساب
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
