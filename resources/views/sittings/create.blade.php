<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    اضافة جلسة
                </h4>
            </div>
            <div class="modal-body">

                <form method="post" enctype="multipart/form-data" action="{{ route('sittings.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="sitting_date">تاريخ الجلسة:</label>
                        <input type="date" name="sitting_date" class="form-control" v-model="newItem.sitting_date"/>

                    </div>

                    <div class="form-group">
                        <label for="nature">طبيعة الجلسة:</label>
                        <input type="text" name="nature" class="form-control" v-model="newItem.nature"/>

                    </div>

                    <div class="form-group">
                        <label for="hall">القاعة:</label>
                        <input type="text" name="hall" class="form-control" v-model="newItem.hall"/>

                    </div>

                    <div class="form-group">
                        <label for="file_id">الملف:</label>
                        <input type="text" name="file_id" class="form-control" v-model="newItem.file_id"/>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">حفظ الجلسة</button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>