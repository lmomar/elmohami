<!-- Modal -->

<div class="modal fade" id="modalAddFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" v-show="show_modal" transition="modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">إضافة ملف</h4>
            </div>
            <div class="modal-body">


                <form method="POST" enctype="multipart/form-data" class="form-horizontal" id="formAdd"  v-on:submit.prevent="createItem()" >
                    {{ csrf_field() }}
                    <input type="hidden" name="office_id" value="1" v-model="newItem.office_id">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <label for="city">المحكمة</label>
                        </div>
                        <div class="col-sm-5">
                            <select id="courts" name="courts" class="form-control" @change="getSubCourts($event.target.value)">
                                <option selected="selected">------------</option>
                                <option :value="c.id" v-for="c in courts" @click="getSubCourts(c.id)" >@{{ c.name }}</option>
                            </select>
                        </div>
                        <div class="col-sm-5">

                            <select id="court_id" name="court_id" class="form-control" v-model="newItem.court_id">
                                <option selected="selected">------------</option>
                                <option :value="sub.id" v-for="sub in sub_courts">@{{ sub.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"><label>الرقم المرجعي </label></div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="reference" required="" v-model="newItem.reference">
                            <span
                                  class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"><label>نوع الملف</label></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="type" value="" v-model="newItem.type">
                            <span class="error text-danger"></span>
                        </div>
                        <div class="col-sm-1"><label>الشعبة</label></div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="division" v-model="newItem.division">
                            <span
                                  class="error text-danger"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-2"><label>الموضوع</label></div>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="subject" v-model="newItem.subject">
                            <span
                                  class="error text-danger"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2"><label> الرقم الابتدائي</label></div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="elementary_num" v-model="newItem.elementary_num" >
                            <span
                                  class="error text-danger"></span>
                        </div>
                        <div class="col-sm-1"><label>تاريخ التسجيل</label></div>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" name="registration_date" v-model="newItem.registration_date" value="" >
                            <span
                                  class="error text-danger"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2"><label>القاضي المقرر</label></div>
                        <div class="col-sm-10"><input type="text" class="form-control" v-model="newItem.decision_judge"
                                                      name="decision_judge"
                                                      value="">
                            <span
                                  class="error text-danger"></span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                        <button type="submit" class="btn btn-primary" @click=""show_modal = false>حفظ الملف</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>