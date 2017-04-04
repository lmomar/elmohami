var m = {};
/*
 * for modal to add object in database
 */
m.storeModel = function (elementhandler) {

    $(elementhandler).submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json'
        })
                .done(function (data) {
                    $('#alertmsg').removeClass('hidden');
                    $('#myModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    m.getFiles();
                    //setTimeout(location.reload.bind(location), 2000);
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#FormAdd input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                })
    });
}

m.deleteModel = function (elementhandler) {
    $(elementhandler).on('click', function (event) {
        event.preventDefault();
        alert($(this).attr('href'));
        console.log('delete');
        /*$.ajax({
         url: $(elementhandler).attr('href'),
         type: 'GET',
         dataType: 'json',
         success: function (data, textStatus, jqXHR) {
         $(event.target).closest('tr').fadeOut();
         $('#alertmsg').removeClass('hidden');
         $('#alertmsg').html('<p>لقد تم حدف المحكمة بنجاح</p>');
         //setTimeout(location.reload.bind(location), 2000);
         m.getCourtsByParent($('#court_parent').val());
         }
         })*/
    })
}

m.getFiles = function (url) {

    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                $('table#files tbody tr').remove();/* clear rows from table */
                $('#count').html(data['count']);
                for (i = 0; i < data['files']['data'].length; i++) {
                    //console.dir(data['files']['data'][i].id);
                    file = data['files']['data'][i];
                    $('table#files').append(
                            '<tr><td>' + file.reference + '</td><td>' + file.type + '</td><td>' + m.isNullAndUndef(file.devision) + '</td><td>' +
                            m.isNullAndUndef(file.subject) + '</td><td>' + m.isNullAndUndef(file.registration_date) + '<td class="action">' +
                            '<a class="btn btn-sm btn-primary btn-margin-left" href="file/edit/' + file.id + '"><i class="fa fa-pencil" ></i></a>' +
                            '<a class="btn btn-sm btn-danger btn-margin-left" href="file/delete/' + file.id + '"><i class="fa fa-remove" ></i></a>' +
                            '<a class="btn btn-sm btn-info " href="file/delete/' + file.id + '"><i class="fa fa-search" ></i></a>' +
                            
                            '</tr>'
                            );
                }

            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.dir(errorThrown);
                $('table#files tbody tr').remove();/* clear rows from table */
                $('table#files').append('<tr><td colspan="6">------</td></tr>');
            })
}


m.Paginate = function () {
    $.ajax({
        url: 'http://localhost:82/elmohami/public/files/liste',
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                total_page = data['files'].last_page;
                current_page = data['files'].current_page;
                $('#pagination').twbsPagination({
                    totalPages: total_page,
                    visiblePages: current_page,
                    onPageClick: function (event, pageL) {
                        page = pageL;
                        m.getFiles('http://localhost:82/elmohami/public/files/liste?page=' + page);

                    }
                });
            })
}

m.isNullAndUndef = function (variable) {
    if (variable !== null && variable !== undefined)
    {
        return variable;
    } else
    {
        return '-----';
    }
}

/* set function to dom */
$(document).ready(function () {
    // m.getFiles('http://localhost:82/elmohami/public/files/liste');
    m.Paginate();
    m.storeModel('#FormAdd');/* form add models*/
    m.deleteModel('td.action a.btn-danger');



});