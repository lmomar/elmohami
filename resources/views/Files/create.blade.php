<!-- Modal -->
<div class="modal fade" id="modalAddFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">إضافة ملف</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'file.store','method' => 'post','class' => 'form-horizontal','id' => 'FormAdd','role' => 'form','v-on:submit.prevent' => 'createItem','v-on:submit.prevent' => 'createItem']) !!}
                {{ csrf_field() }}
                <input type="hidden" name="office_id" value="1">
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="city">المحكمة</label>
                    </div>
                    <div class="col-sm-5">
                        <select id="courts" name="courts" class="form-control">
                            <option value="0">------------</option>
                            @if($courts)
                            @foreach($courts as $court)
                            <option value="{{ $court->id }}">{{ $court->name }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-sm-5">

                        <select id="court_id" name="court_id" class="form-control">
                            <option value="0">------------</option>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>الرقم المرجعي </label></div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="reference" required="" v-model="newItem.reference">
                        <span v-if="formErrors['reference']" class="error text-danger">@{{ formErrors['reference'] }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label>نوع الملف</label></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="type"  value="{{ old('type') }}" v-model="newItem.type">
                        <span v-if="formErrors['type']" class="error text-danger">@{{ formErrors['type'] }}</span>
                    </div>
                    <div class="col-sm-1"><label>الشعبة</label></div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="division" v-model="newItem.division">
                        <span v-if="formErrors['division']" class="error text-danger">@{{ formErrors['division'] }}</span>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-2"><label>الموضوع</label></div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject" v-model="newItem.subject">
                        <span v-if="formErrors['subject']" class="error text-danger">@{{ formErrors['subject'] }}</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"><label> الرقم الابتدائي</label></div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="elementary_num" v-model="newItem.elementary_num">
                        <span v-if="formErrors['elementary_num']" class="error text-danger">@{{ formErrors['elementary_num'] }}</span>
                    </div>
                    <div class="col-sm-1"><label>تاريخ التسجيل</label></div>
                    <div class="col-sm-5">
                        <input type="date" class="form-control" name="registration_date" value="{{ old('registration_date') }}" v-model="newItem.registration_date">
                        <span v-if="formErrors['registration_date']" class="error text-danger">@{{ formErrors['registration_date'] }}</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"><label>القاضي المقرر</label></div>
                    <div class="col-sm-10"><input type="text" class="form-control" v-model="newItem.decision_judge"
                                                  name="decision_judge"
                                                  value="{{ old('decision_judge') }}">
                        <span v-if="formErrors['decision_judge']" class="error text-danger">@{{ formErrors['decision_judge'] }}</span>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-primary">حفظ الملف</button>
                </div>
                {{-- {!! Form::close() !!} --}}
                </form>
            </div>

        </div>
    </div>
</div>