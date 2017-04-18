Vue.http.headers.common['X-CSRF-TOKEN'] = $("#csrf-token").attr("content");

new Vue({

    el: '#manage-vue',

    data: {
        sortKey: '',
        items: [],
        pagination: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1,
            last_page: 0
        },
        offset: 4,
        formErrors: {},
        formErrorsUpdate: {},
        newItem: {'sitting_date': '', 'nature': '', 'hall': '', 'file_id': ''},
        fillItem: {'sitting_date': '', 'nature': '', 'hall': '', 'file_id': '', 'id': ''}
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

    ready: function () {
        this.getVueItems(this.pagination.current_page);
    },

    methods: {

        sortBy: function (sortKey) {
            this.sortKey = sortKey;
        },

        getVueItems: function (page) {
            this.$http.get('/sittings?page=' + page).then((response) => {
                this.$set('items', response.data.data.data);
            this.$set('pagination', response.data.pagination); });
},



deleteItem: function(item) {
    var conf = confirm("etes vous sur");
    if (conf) {
    this.$http.delete('/sittings/delete/' + item.id).then((response) => {
        this.changePage(this.pagination.current_page);
    toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});

});
};
},

editItem: function(item) {
    this.fillItem.id = item.id;
    this.fillItem.sitting_date = item.sitting_date;
    this.fillItem.nature = item.nature;
    this.fillItem.hall = item.hall;
    this.fillItem.file_id = item.file_id;
    $("#edit-item").appendTo("body").modal('show');
}
,

updateItem: function(id){
    var input = this.fillItem;
    console.log(this.fillItem);
    this.$http.put('/sittings/update/'+id,input).then((response) => {
        this.changePage(this.pagination.current_page);
    this.fillItem = {'sitting_date': '', 'nature': '', 'hall': '', 'file_id': '','id':''};
    $("#edit-item").modal('hide');
    toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
}, (response) => {
    this.formErrorsUpdate = response.data;
});
},

    changePage: function(page) {
        this.pagination.current_page = page;
        this.getVueItems(page);
}
}

});
/**
 * Created by Anormal on 14/04/2017.
 */
