@extends('layouts.master_page')

@section('content')

    <div class="container">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">محاكم الإستئناف</a>
                    </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="card">
                            <div class="card-block">
                                <table class="table table-striped en">
                                    <thead>
                                    <tr>
                                        <th>إسم المحكمة</th>
                                        <th>العنوان البريدي</th>
                                        <th>المدينة</th>
                                        <th>الهاتف</th>
                                        <th>المحكمة</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($courts)
                                        @foreach($courts as $court)
                                            <tr>
                                                <td>{{ $court->court_name }}</td>
                                                <td>{{ $court->court_address }}</td>
                                                <td>{{ $court->court_city }}</td>
                                                <td>{{ $court->court_phone }}</td>
                                                <td>{{ $court->court_parent }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <a class="btn btn-link" href="{{ route('court.create') }}">
                                    <button type="submit" class="btn btn-primary p-x-2">إضافة محكمة</button>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">المحاكم الإبتدائية</a>
                    </h4>
                </div>
                <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">المحاكــم الإداريــة
                            والتجارية</a>
                    </h4>
                </div>
                <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">أقســام قضــاء الأســرة</a>
                    </h4>
                </div>
                <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
        </div>

        <!--/col-->
    </div>
    </div>
@endsection