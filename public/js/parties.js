partie.getData = function (url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                $('#parties tbody tr').remove();
                console.log('data length');
                console.dir(data['parties'].length);
                if (data['parties'].length === 0) {
                    $('#parties tbody').append('<tr><td coolspan="6">----------------------</td></tr>');
                } else
                {
                    $('#parties-count').html(data['parties'].length);
                    part = data['parties'];
                    for (i = 0; i < part.length; i++) {
                        $('#parties tbody').append(
                                '<tr>' +
                                '<td>' + part[i].id + '</td>' +
                                '<td>' + 'type|nature' + '</td>' +
                                '<td>' + m.isNullAndUndef(part[i].full_name) + '</td>' +
                                '<td>' + m.isNullAndUndef(part[i].part_phone) + '</td>' +
                                '<td>' + m.isNullAndUndef(part[i].created_at) + '</td>' +
                                '<td>' +
                                '<a id="part-' + part[i].id + '" data-id="' + part[i].id + '" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalEditPartie">تعديل<i class="fa fa-pencil"></i></a>' +
                                '<a data-id="' + part[i].id + '" class="btn btn-warning btn-xs">حدف<i class="fa fa-remove"></i></a>' +
                                '</td>' +
                                '</tr>'
                                );
                    }
                }

            })
            .fail(function (data) {
                console.log('error:');
                console.dir(data);
            })
}


partie.storePartie = function (elementhandler) {

    $(elementhandler).submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json'
        })
                .done(function (data) {
                    $('#alertmsg').html('<p>تمت إضافة الطرف بنجاح</p>')
                    $('#alertmsg').removeClass('hidden');
                    $('#modalAddPartie').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    url = 'http://elmohami.dev/parties/all/' + file_id;
                    console.log('URL:');
                    console.log(url);
                    partie.getData(url);/* get parties by file_id*/
                    //setTimeout(location.reload.bind(location), 2000);
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#FormAddPartie input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                })
    });
}



partie.bindEditForm = function (elementhandler) {
    $(document).on('click', elementhandler, function (event) {
        event.preventDefault();
        $.ajax({
            url: 'http://elmohami.dev/parties/info/' + $(this).attr('data-id'),
            type: 'GET',
            dataType: 'json'
        })
                .done(function (data) {
                    $('#FormEditPartie input[name="full_name"]').attr('value', data['partie'].full_name);
                    $('#FormEditPartie input[name="part_phone"]').attr('value', data['partie'].part_phone);
                })
                .fail(function (data) {
                    console.dir(data);
                })
    });

}


$(document).ready(function () {
    $('#modalAddPartie').on('shown.bs.modal', function () {
        procedure.setFileId("#partie_file_id");
        $(this).find('form').trigger('reset');
    });
    $('#modalEditPartie').on('shown.bs.modal', function () {
        procedure.setFileId("#e_partie_file_id");
    });
    partie.bindEditForm("#parties a[id*='part-']");
    partie.storePartie("#FormAddPartie");
});