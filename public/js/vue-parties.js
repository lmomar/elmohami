//Vue.http.headers.common['X-CSRF-TOKEN'] = $("#csrf-token").attr("content");
Vue.component('parties',{
    props: {
        file_id : 0,
        liste:{}
    },
    template:   '<li><button @click="test">click</button></li>'
    
})
partie = new Vue({

    el: '#tab2parties',

    data: {
        items: [],
        liste:{},
        Parties_pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        newItem: {'full_name': '', 'part_phone': ''},
        fillItem: {'full_name': '', 'part_phone': ''}
    },

    computed: {
        isActived: function () {
            return this.Parties_pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.Parties_pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.Parties_pagination.last_page) {
                to = this.Parties_pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    ready: function () {
        //this.getVueItems(this.Parties_pagination.current_page);
    },

    methods: {

        getVueItems: function (page, file_id) {
            this.$http.get('/parties/all/' + file_id + '?' + page).then((response) => {
                this.$data.items = response.data.data.data;
                //console.dir(this.$data.items);
                this.$set('parties', response.data.data.data);
                this.$set('Parties_pagination', response.data.pagination);
                this.$set('parties_count', response.data.data.total);
                console.log('okkk')
            });
        },

        createItem: function () {
            var input = this.newItem;

            this.$http.post('/files/store', input).then((response) => {
                this.changePage(this.Parties_pagination.current_page);
                console.dir(input);
                this.newItem = {'reference': '', 'type': '', 'division': '', 'subject': '', 'elementary_num': '', 'registration_date': '', 'decision_judge': '', 'court_id': '', 'office_id': ''};
                $("#modalAddFile").modal('hide');
                toastr.success('تمت اضافة الملف بنجاح', 'Success Alert', {timeOut: 5000});
            }, (response) => {
                this.formErrors = response.data;
            });
        },

        deleteItem: function (item) {
            this.$http.delete('/vueitems/' + item.id).then((response) => {
                this.changePage(this.Parties_pagination.current_page);
                toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            });
        },

        editItem: function (item) {

            

            $("#myModalEdit").modal('show');
        },

        updateItem: function (id) {
            var input = this.fillItem;
            console.dir(input);
            this.$http.put('/files/update/' + id, input).then((response) => {
                this.changePage(this.Parties_pagination.current_page);
                this.fillItem = {'reference': '', 'type': '', 'division': '', 'subject': '', 'elementary_num': '', 'registration_date': '', 'decision_judge': '', 'court_id': ''
                    , 'appellate_num': '', 'appellate_judge': '', 'verdict': '', 'verdict_date': ''};
                $("#myModalEdit").modal('hide');
                toastr.success('تم تعديل الملف بنجاح.', 'Success Alert', {timeOut: 5000});
            }, (response) => {
                this.formErrorsUpdate = response.data;
                console.dir(response.data);
            });
        },

        changePage: function (page) {
            this.Parties_pagination.current_page = page;
            this.getVueItems(page);
        }

    }

});