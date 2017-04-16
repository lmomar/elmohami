@extends('layouts.master_page')

@section('content')

    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="container" id="manage-vue">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> الجلسات
                    <a class="btn btn-xs btn-success pull-left" href="#" data-toggle="modal" data-target="#create-item"> اضافة جلسة
                        <i class="fa fa-plus-square"></i>
                    </a>
                </div>
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12 margin-tb">--}}
                        {{--<div class="pull-left">--}}
                            {{--<h2> </h2>--}}
                        {{--</div>--}}
                        {{--<div class="pull-right">--}}
                            {{--<button type="button" class="btn btn-success" data-toggle="modal"--}}
                                    {{--data-target="#create-item">--}}

                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <!-- Item Listing -->

                <div class="card-block">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                        <tr>
                            <th>الملف</th>
                            <th>تاريخ الجلسة</th>
                            <th>الطبيعة</th>
                            <th>القاعة</th>
                            <th>تاريخ الاضافة</th>
                            <th>#</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr v-for="item in items">
                            <td>@{{ item.file_id }}</td>
                            <td>@{{ item.sitting_date }}</td>
                            <td>@{{ item.nature }}</td>
                            <td>@{{ item.hall }}</td>
                            <td>@{{ item.created_at }}</td>
                            <td>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal"
                                        @click.prevent="editItem(item)">تعديل
                                </button>
                                {{--                                <a class="btn btn-sm btn-success btn-margin-left color-black" href="{{ route('sittings.edit', ['sitting' => @{{ item.file_id }}]) }}" title="لائحة الجلسات">edit <i class="fa fa-gear" ></i></a>--}}
                                <button class="btn btn-danger" type="button" @click.prevent="deleteItem(item)">حذف</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav>
                    <ul class="pagination">
                        <li v-if="pagination.current_page > 1">
                            <a href="#" aria-label="Previous"
                               @click.prevent="changePage(pagination.current_page - 1)">
                                «
                            </a>
                        </li>
                        <li v-for="page in pagesNumber"
                            v-bind:class="[ page == isActived ? 'active' : '']">
                            <a href="#"
                               @click.prevent="changePage(page)">@{{ page }}</a>
                        </li>
                        <li v-if="pagination.current_page < pagination.last_page">
                            <a href="#" aria-label="Next"
                               @click.prevent="changePage(pagination.current_page + 1)">
                                »
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Create Item Modal -->


                <!-- Edit Item Modal -->

                <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
                            </div>
                            <div class="modal-body">
{{--                                {{ Form::open(['method' => 'PUT','route' => ['sittings.update','1'], 'v-on:submit.prevent' => 'updateItem(fillItem.id)','class' => 'form-horizontal','id' => 'FormEdit','role' => 'form']) }}--}}

                                <form method="put" enctype="multipart/form-data"
                                      v-on:submit.prevent="updateItem(fillItem.id)">


                                    <div class="form-group">
                                        <label for="sitting_date">تاريخ الجلسة:</label>
                                        <input type="date" name="sitting_date" class="form-control en"
                                               v-model="fillItem.sitting_date"/>

                                    </div>

                                    <div class="form-group">
                                        <label for="nature">طبيعة الجلسة:</label>
                                        <input type="text" name="nature" class="form-control"
                                               v-model="fillItem.nature"/>

                                    </div>

                                    <div class="form-group">
                                        <label for="hall">القاعة:</label>
                                        <input type="text" name="hall" class="form-control en" v-model="fillItem.hall"/>

                                    </div>

                                    <div class="form-group">
                                        <label for="file_id">الملف:</label>
                                        <input type="text" name="file_id" class="form-control en"
                                               v-model="fillItem.file_id"/>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">حفظ الجلسة</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    @include('sittings.create')
    {{--@include('sittings.edit')--}}

@endsection
@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>

    <script type="text/javascript" src="/js/sittings.js"></script>

@stop

