
//var file_id = 0;
procedure.storeProcedure = function (elementhandler) {

    $(elementhandler).submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json'
        })
                .done(function (data) {
                    $('#alertmsg').html('<p>تمت إضافة الإجراء بنجاح</p>')
                    $('#alertmsg').removeClass('hidden');
                    $('#modalAddProc').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    procedure.getData('http://elmohami.dev/procedures/all/' + file_id);
                    //setTimeout(location.reload.bind(location), 2000);
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#FormAddProc input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                })
    });
}

procedure.setFileId = function (elementHandler) {
    $(elementHandler).attr('value', file_id);
}

procedure.getData = function (url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                $('#procedures tbody tr').remove();
                //console.dir(data);
                p = data['procedures']['data'];
                if(p.length === 0){
                    console.log('no data');
                    $('#procedures tbody').append('<tr><td colspan="6" class="text-center">----------</td></tr>');
                }
                for (i = 0; i < p.length; i++) {
                    $('#procedures tbody').append(
                            '<tr>' +
                            '<td>' + p[i].proc_date + '</td><td>' + m.isNullAndUndef(p[i].type) + '</td><td>' + m.isNullAndUndef(p[i].decision) + '</td><td>' + m.isNullAndUndef(p[i].next_sitting) + '</td><td>' + p[i].created_at + '</td>' +
                            '<td class="action">' +
                            '<a id="proc-' + p[i].id + '" class="btn btn-sm btn-primary btn-margin-left color-blank"> تعديل <i class="fa fa-pencil"></i></a>' +
                            '<a class="btn btn-sm btn-danger btn-margin-left color-black" href="procedures/delete/' + p[i].id + '">حذف <i class="fa fa-remove" ></i></a>' +
                            '</td>' +
                            '</tr>'
                            );
                }
                $('#proc-count').html(data['count']);
            })
                    .fail(function(){
                        $('#procedures tbody').append('<tr></td colspan="6">Error</td></tr>')
            })
}

procedure.Paginate = function (id) {
    $.ajax({
        url: 'http://elmohami.dev/procedures/all/' + id,
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                //console.dir(data);
                total_page = data['procedures'].last_page;
                current_page = data['procedures'].current_page;
                /* refreshing pagination when file_id is changed */
                if($('#proc-pagination').data("twbs-pagination")){
                    $('#proc-pagination').twbsPagination('destroy');
                }
                $('#proc-pagination').twbsPagination({
                    totalPages: total_page,
                    visiblePages: current_page,
                    onPageClick: function (event, pageL) {
                        page = pageL;
                        url='http://elmohami.dev/procedures/all/' + file_id + '/?page=' + page;
                        console.log('pagination');
                        console.log(url);
                        procedure.getData(url);

                    }
                });
            })
}

$(document).ready(function () {
    $('#modalAddProc').on('shown.bs.modal', function () {
        //console.log(file_id);
        procedure.setFileId("#proc_file_id");
    });
    procedure.storeProcedure('#FormAddProc');
});