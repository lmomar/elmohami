Vue.http.headers.common['X-CSRF-TOKEN'] = $("#csrf-token").attr("content");

new Vue({

  el: '#manage-vue',

  data: {
    items: [],
    pagination: {
        total: 0, 
        per_page: 2,
        from: 1, 
        to: 0,
        current_page: 1
      },
    offset: 4,
    formErrors:{},
    formErrorsUpdate:{},
    newItem : {'reference':'','type':'','division':'','subject':'','elementary_num':'','registration_date':'','decision_judge':'','court_id':'','office_id':''},
    fillItem : {'title':'','description':'','id':''}
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

  ready : function(){
  		this.getVueItems(this.pagination.current_page);
  },

  methods : {

        getVueItems: function(page){
          this.$http.get('/files?page='+page).then((response) => {
            this.$set('items', response.data.data.data);
            this.$set('pagination', response.data.pagination);
            $('#count').html(response.data.data.total);
          });
        },

        createItem: function(){
		  var input = this.newItem;

		  this.$http.post('/files/store',input).then((response) => {
		    this.changePage(this.pagination.current_page);
            console.dir(input);
			this.newItem = {'reference':'','type':'','division':'','subject':'','elementary_num':'','registration_date':'','decision_judge':'','court_id':'','office_id':''};
			$("#modalAddFile").modal('hide');
			toastr.success('تمت اضافة الملف بنجاح', 'Success Alert', {timeOut: 5000});
		  }, (response) => {
			this.formErrors = response.data;
	    });
	},

      deleteItem: function(item){
        this.$http.delete('/vueitems/'+item.id).then((response) => {
            this.changePage(this.pagination.current_page);
            toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        });
      },

      editItem: function(item){
          this.fillItem.title = item.title;
          this.fillItem.id = item.id;
          this.fillItem.description = item.description;
          $("#edit-item").modal('show');
      },

      updateItem: function(id){
        var input = this.fillItem;
        this.$http.put('/vueitems/'+id,input).then((response) => {
            this.changePage(this.pagination.current_page);
            this.fillItem = {'title':'','description':'','id':''};
            $("#edit-item").modal('hide');
            toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
          }, (response) => {
              this.formErrorsUpdate = response.data;
          });
      },

      changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueItems(page);
      }

  }

});