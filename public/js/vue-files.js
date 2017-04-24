Vue.http.headers.common['X-CSRF-TOKEN'] = $("#csrf-token").attr("content");
let parties = {
    props: {
        parties: {type: Array},
        file_id: {type: Number},
        pagination: '',
        offset: {type: Number, default: 4},
        count: {type: Number, default: 0}
    },
    template: ` <div class="card-block">
              <table class="table table-bordered table-striped table-condensed"
                                                       id="parties">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>الصفة</th>
                                                        <th>الاسم الكامل</th>
                                                        <th>الهاتف</th>
                                                        <th>أضيف يوم</th>
                                                        <th>#</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="p in parties">
                                                        <td>{{ p.id }}</td>
                                                        <td>{{ p.full_name }}</td>
                                                        <td>etat</td>
                                                        <td>{{ p.part_phone }}</td>
                                                        <td>{{ p.created_at }}</td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm">تعديل</button>
                                                            <button class="btn btn-danger btn-sm">حدف</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="7">عدد الأطراف :<b id="parties-count">{{ count }}</b></td>
                                                    </tr>
                                                    </tfoot>
                                                </table>

                                                <nav>
                                                    <ul class="pagination">
                                                        <li v-if="pagination.current_page > 1">
                                                            <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                                                                <span aria-hidden="true">«</span>
                                                            </a>
                                                        </li>
                                                        <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                                                            <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
                                                        </li>
                                                        <li v-if="pagination.current_page < pagination.last_page">
                                                            <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                                                                <span aria-hidden="true">»</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>

                                            </div>`,
    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },
    methods: {
        changePage: function (page) {
            this.pagination.current_page = page;
            this.$parent.getParties(this.file_id, page);
        },
    }
}
var vfile = new Vue({

        el: '#app',
        components: {parties},
        data: {
            parent_court_id: 0,
            file_id: 0,
            files: [],
            files_count: 0,
            file: {},
            items: [],
            pagination: {
                total: 0,
                per_page: 2,
                from: 1,
                to: 0,
                current_page: 1
            },
            offset: 4,
            formErrors: {},
            formErrorsUpdate: {},
            newItem: {
                'reference': '',
                'type': '',
                'division': '',
                'subject': '',
                'elementary_num': '',
                'registration_date': '',
                'decision_judge': '',
                'court_id': '',
                'office_id': '1'
            },
            fillItem: {
                'reference': '',
                'type': '',
                'division': '',
                'subject': '',
                'elementary_num': '',
                'registration_date': '',
                'decision_judge': '',
                'court_id': '',
                'appellate_num': '',
                'appellate_judge': '',
                'verdict': '',
                'verdict_date': '',
                'name': name
            },
            /* parties variables */
            parties: [],
            parties_pagination: {},
            parties_count: 0,

            /* courts veriables */
            courts: [],
            sub_courts: []
        },
        computed: {
            isActived: function () {
                return this.pagination.current_page;
            },
            pagesNumber: function () {
                if (!this.pagination.to) {
                    return [];
                }
                var from = this.pagination.current_page - this.offset;
                if (from < 1) {
                    from = 1;
                }
                var to = from + (this.offset * 2);
                if (to >= this.pagination.last_page) {
                    to = this.pagination.last_page;
                }
                var pagesArray = [];
                while (from <= to) {
                    pagesArray.push(from);
                    from++;
                }
                return pagesArray;
            }
        },
        mounted: function () {
            this.getVueItems(this.pagination.current_page);
            this.getCourts();
        },
        methods: {

            getVueItems: function (page) {
                this.$http.get('/files?page=' + page).then((response) => {
                    this.files = response.data.data.data;
                    this.pagination = response.data.pagination;
                    this.files_count = response.data.data.total;
                });
            },
            createItem: function () {
                var input = this.newItem;
                console.dir(input);
                this.$http.post('http://elmohami.dev/files/store', input).then((response) => {
                    this.changePage(this.pagination.current_page);
                    console.dir(input);
                    this.newItem = {
                        'reference': '',
                        'type': '',
                        'division': '',
                        'subject': '',
                        'elementary_num': '',
                        'registration_date': '',
                        'decision_judge': '',
                        'court_id': '',
                        'office_id': ''
                    };
                    //$("#modalAddFile").modal('hide');
                    this.show_modal = false;
                    toastr.success('تمت اضافة الملف بنجاح', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    this.formErrors = response.data;
                    console.error(response);
                });
            },
            deleteItem: function (item) {
                this.$http.delete('/vueitems/' + item.id).then((response) => {
                    this.changePage(this.pagination.current_page);
                    toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
                });
            },
            editItem: function (item) {
                //console.dir(item.court_id);
                this.$http.get('/courts/parent/' + item.court_id).then((response) => {
                    this.parent_court_id = response.body.parent_id;
                    this.getSubCourts(this.parent_court_id);
                });
                this.fillItem.reference = item.reference;
                this.fillItem.id = item.id;
                this.fillItem.court_id = item.court_id;
                this.fillItem.type = item.type;
                this.fillItem.division = item.division;
                this.fillItem.subject = item.subject;
                this.fillItem.elementary_num = item.elementary_num;
                this.fillItem.registration_date = item.registration_date;
                this.fillItem.decision_judge = item.decision_judge;
                this.fillItem.appellate_num = item.appellate_num;
                this.fillItem.appellate_judge = item.appellate_judge;
                this.fillItem.verdict = item.verdict;
                this.fillItem.verdict_date = item.verdict_date;
                var c = new Date(item.verdict_date);
                $('#verdict_time').text(c.getHours() + ':' + c.getMinutes());
                this.fillItem.verdict_time = c.getHours() + ':' + c.getMinutes();
                $(document).ready(function () {
                    $("#myModalEdit").modal('show')
                })
            },
            updateItem: function (id) {
                var input = this.fillItem;
                console.dir(input);
                this.$http.put('/files/update/' + id, input).then((response) => {
                    this.changePage(this.pagination.current_page);
                    this.fillItem = {
                        'reference': '',
                        'type': '',
                        'division': '',
                        'subject': '',
                        'elementary_num': '',
                        'registration_date': '',
                        'decision_judge': '',
                        'court_id': ''
                        ,
                        'appellate_num': '',
                        'appellate_judge': '',
                        'verdict': '',
                        'verdict_date': ''
                    };
                    $(document).ready(function () {
                        $("#myModalEdit").modal('hide');
                    });
                    toastr.success('تم تعديل الملف بنجاح.', 'Success Alert', {timeOut: 5000});
                }, (response) => {
                    this.formErrorsUpdate = response.data;
                    console.dir(response.data);
                });
            }
            ,
            showFileInfo: function (item) {
                this.file = item;
                /* file info */
                this.$data.file_id = item.id;
                this.file = item;
                this.file_id = item.id;
                this.getParties(this.file_id, 1)
            }
            ,
            changePage: function (page) {
                this.pagination.current_page = page;
                this.getVueItems(page);
            }
            ,
            /* courts in add form */
            getCourts: function () {
                this.$http.get('/courts/all').then((response) => {
                    this.courts = response.body.courts;
                })
            }
            ,
            getSubCourts: function (parent_id) {
                this.$http.get('/courts/get/' + parent_id).then((response) => {
                    this.sub_courts = response.body.courts;

                }).catch(function () {
                    this.sub_courts = [];
                })
            }
            ,

            /* get parent court of sub */
            getParentCourt: function (subcourt) {
                this.$http.get('/courts/parent/' + subcourt).then((response) => {
                    this.parent_court_id = response.body.parent_id;
                    //console.log('parent',this.parent_court_id);
                });
            },
            /* parties function */
            /* methods for parties */
            getParties: function (file_id, page) {
                this.$http.get('/parties/all/' + file_id + '/?page=' + page).then((response) => {
                    //console.dir(response.data);
                    this.parties = response.data.data.data;
                    this.parties_pagination = response.data.Parties_pagination;
                    this.parties_count = response.data.data.data.length;
                    console.info(this.parties_pagination);
                    //console.warn(this.parties);
                });
            }

        }

    })
;
