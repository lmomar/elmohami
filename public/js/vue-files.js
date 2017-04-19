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
    fillItem : {'reference':'','type':'','division':'','subject':'','elementary_num':'','registration_date':'','decision_judge':'','court_id':''
        ,'appellate_num':'','appellate_judge':'','verdict':'','verdict_date':'','name':name}
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
            this.$set('files_count',response.data.data.total)
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
          
          $("#myModalEdit").modal('show');
      },

      updateItem: function(id){
        var input = this.fillItem;
        console.dir(input);
        this.$http.put('/files/update/'+id,input).then((response) => {
            this.changePage(this.pagination.current_page);
            this.fillItem = {'reference':'','type':'','division':'','subject':'','elementary_num':'','registration_date':'','decision_judge':'','court_id':''
        ,'appellate_num':'','appellate_judge':'','verdict':'','verdict_date':''};
            $("#myModalEdit").modal('hide');
            toastr.success('تم تعديل الملف بنجاح.', 'Success Alert', {timeOut: 5000});
          }, (response) => {
              this.formErrorsUpdate = response.data;
              console.dir(response.data);
          });
      },
      
      showFileInfo: function(item){
          this.$set('file',item);/* file info */
          this.$http.get('/parties/all/'+item.id).then((response) => {
              console.dir(response.data.parties);
              this.$set('parties_count',response.data.parties.length);
              this.$set('parties',response.data.parties);
          })
      },
      
      

      changePage: function (page) {
          this.pagination.current_page = page;
          this.getVueItems(page);
      }

  }

});