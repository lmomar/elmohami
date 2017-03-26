@extends('layouts.master_page')

@section('content')

    <div class="container">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">لائحة الحسابات</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="card">
                            <div class="card-block">
                                <table class="table table-striped en">
                                    <thead>
                                    <tr>
                                        <th>الإسم الكامل</th>
                                        <th>إسم المستعمل</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>رقم الهاتف</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($users)
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->user_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">

                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"> إنشاء حساب</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                                <input id="name" placeholder="الإسم الكامل" type="text" class="form-control"
                                       name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                                <input id="user_name" placeholder="إسم المستعمل" type="text" class="form-control"
                                       name="user_name"
                                       value="{{ old('user_name') }}" required autofocus>

                                @if ($errors->has('user_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i>@</i>
                            </span>
                                <input id="email" placeholder="البريد الإلكتروني" type="email" class="form-control"
                                       name="email"
                                       value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-call-in"></i>
                            </span>
                                <input id="phone" placeholder="رقم الهاتف" type="text" class="form-control en"
                                       name="phone"
                                       value="{{ old('phone') }}" required>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group m-b-1">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                                <input id="password" placeholder="كلمة المرور" type="password" class="form-control"
                                       name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group m-b-2">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                                <input id="password-confirm" placeholder="تأكيد كلمة المرور" type="password"
                                       class="form-control" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="icon-user-follow"></i>
                                إنشاء حساب
                            </button>

                            <input id="office_id" hidden type="text" class="form-control"
                                   name="office_id" required value="{{ Auth::guard('office')->user()->id }}">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection