
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
                if (p.length === 0) {
                    console.log('no data');
                    $('#procedures tbody').append('<tr><td colspan="6" class="text-center">----------</td></tr>');
                }
                for (i = 0; i < p.length; i++) {
                    $('#procedures tbody').append(
                            '<tr>' +
                            '<td>' + p[i].id + '</td>' +
                            '<td>' + p[i].proc_date + '</td><td>' + m.isNullAndUndef(p[i].type) + '</td><td>' + m.isNullAndUndef(p[i].decision) + '</td><td>' + m.isNullAndUndef(p[i].next_sitting) + '</td>' +
                            '<td class="action">' +
                            '<a data-id="' + p[i].id + '" id="proc-' + p[i].id + '" class="btn btn-sm btn-primary btn-margin-left color-blank" data-toggle="modal" data-target="#modalEditProc"> تعديل <i class="fa fa-pencil"></i></a>' +
                            '<a class="btn btn-sm btn-danger btn-margin-left color-black" href="procedures/delete/' + p[i].id + '">حذف <i class="fa fa-remove" ></i></a>' +
                            '</td>' +
                            '</tr>'
                            );
                }
                $('#proc-count').html(data['count']);
            })
            .fail(function () {
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
                console.log('data:');
                console.dir(data);
                if (data.count !== 0)
                {
                    /* refreshing pagination when file_id is changed */
                    console.log('!==0')
                    if ($('#proc-pagination').data("twbs-pagination")) {
                        $('#proc-pagination').twbsPagination('destroy');
                    }

                    total_page = data['procedures'].last_page;
                    current_page = data['procedures'].current_page;
                    $('#proc-pagination').twbsPagination({
                        totalPages: total_page,
                        visiblePages: current_page,
                        onPageClick: function (event, pageL) {
                            page = pageL;
                            url = 'http://elmohami.dev/procedures/all/' + file_id + '/?page=' + page;
                            /*console.log('pagination');
                             console.log(url);*/
                            procedure.getData(url);

                        }
                    });
                } else {
                    console.log('00000');
                }





            })
}

procedure.getProcedureInfo = function (elementHandler) {
    $(document).on('click', elementHandler, function (event) {
        event.preventDefault();
        id = $(this).attr('data-id');/* id procedure*/
        console.log(id);
        $.ajax({
            url: 'http://elmohami.dev/procedures/get/' + id,
            type: 'GET',
            dataType: 'json'
        })
                .done(function (data) {
                    p = data['procedure'];
                    var proc_date = moment(p.proc_date).format("YYYY-MM-DD");
                    var next_sitting = moment(p.next_sitting).format("YYYY-MM-DD");
                    //console.log(p.next_sitting);
                    $("#FormEditProc #proc_id").attr('value', id);
                    $("#FormEditProc input[name='proc_date']").attr('value', proc_date);
                    $("#FormEditProc input[name='type']").attr('value', p.type);
                    $("#FormEditProc textarea[name='decision']").html(p.decision);
                    $("#FormEditProc input[name='next_sitting']").attr('value', next_sitting);
                })
                .fail(function (data) {
                    console.log(data.responseJSON);
                })
    })
}

procedure.updateModel = function (elementhandler) {
    $(elementhandler).submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json'
        })
                .done(function (data) {
                    $('#alertmsg').html('<p>تم تعديل الإجراء بنجاح</p>')
                    $('#alertmsg').removeClass('hidden');
                    $('#modalEditProc').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    procedure.Paginate(file_id);
                    //setTimeout(location.reload.bind(location), 2000);
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#FormEditProc input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                })
    });
}


$(document).ready(function () {
    $('#modalAddProc').on('shown.bs.modal', function () {
        //console.log(file_id);
        procedure.setFileId("#proc_file_id");
    });
    procedure.updateModel('#FormEditProc');
    procedure.storeProcedure('#FormAddProc');
    procedure.getProcedureInfo("#procedures a[id*='proc-']");
});