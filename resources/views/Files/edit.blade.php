<!-- Modal -->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تعديل ملف</h4>
            </div>
            <div class="modal-body">
                <form method="put" enctype="multipart/form-data" id="FormEdit" class="form-horizontal"
                      v-on:submit.prevent="updateItem(fillItem.id)">
                <input type="hidden" name="file_id" value="" >
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="city">المحكمة</label>
                    </div>
                    <div class="col-sm-5">
                        <select id="ecourts" name="courts" class="form-control" required="" @change="getSubCourts($event.target.value)">
                            <option>------------</option>
                            <option :value="c.id" v-for="c in courts" @click="getSubCourts(c.id)"
                            :selected="c.id === parent_court_id ? true : false">@{{ c.name }}</option>
                        </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="col-sm-5">

                        <select id="esub_courts" name="sub_courts" class="form-control" required="">
                            <option>------------</option>
                            <option :value="sub.id" v-for="sub in sub_courts"
                                    :selected="sub.id == fillItem.court_id ? true : false" >@{{ sub.name }}</option>
                        </select>
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>الرقم المرجعي </label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="reference" required="" ></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>نوع الملف</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control"
                                                 name="type"
                                                 value="" ></div>
                    <div class="col-sm-1"><label>الشعبة</label></div>
                    <div class="col-sm-5"><input type="text" class="form-control" name="division" ></div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-2"><label>الموضوع</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="subject" ></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label> الرقم الابتدائي</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control" name="elementary_num" ></div>
                    <div class="col-sm-1"><label>تاريخ التسجيل</label></div>
                    <div class="col-sm-5"><input type="date" class="form-control"
                                                 name="registration_date"
                                                 value=""> </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"><label>القاضي المقرر</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control"
                                                 name="decision_judge"
                                                 value="" ></div>
                    <div class="col-sm-2"><label>الرقم الاستئنافي</label></div>
                    <div class="col-sm-4"><input type="text" class="form-control"
                                                 name="appellate_num"
                                                 value="" ></div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"><label>القاضي المستشار</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="appellate_judge" ></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>قرار الحكم</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" name="verdict"></div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>تاريخ قرار الحكم</label></div>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="verdict_date" >
                    </div>
                    <div class="col-sm-2">
                        <label id="verdict_time" name="verdict_time" ></label>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" id="timepicker-24-hr" name="timepicker-24-hr" class="timepicker-24-hr form-control">
                    </div>
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-primary">حفظ الملف</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>