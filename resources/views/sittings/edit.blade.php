<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data" action="" v-on:submit.prevent="updateItem(fillItem.id)">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sitting_date">تاريخ الجلسة:</label>
                        <input type="date" name="sitting_date" class="form-control" v-model="fillItem.sitting_date"/>

                    </div>

                    <div class="form-group">
                        <label for="nature">طبيعة الجلسة:</label>
                        <input type="text" name="nature" class="form-control" v-model="fillItem.nature"/>

                    </div>

                    <div class="form-group">
                        <label for="hall">القاعة:</label>
                        <input type="text" name="hall" class="form-control" v-model="fillItem.hall"/>

                    </div>

                    <div class="form-group">
                        <label for="file_id">الملف:</label>
                        <input type="text" name="file_id" class="form-control" v-model="fillItem.file_id"/>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">حفظ الجلسة</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>

<script type="text/javascript" src="/js/sittings.js"></script>