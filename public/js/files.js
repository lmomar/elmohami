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

m.getFiles = function () {
    $.ajax({
        url: 'http://localhost:82/elmohami/public/files/liste',
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                $('table#files tbody tr').remove();/* clear rows from table */
        
                for (var key in data)
                {
                $('#count').html(Object.keys(data[key]).length);
                    for (var i in data[key]) {
                        $('table#files').append(
                                '<tr><td>' + data[key][i].reference + '</td><td>' + data[key][i].type + '</td><td>' + m.isNullAndUndef(data[key][i].devision) + '</td><td>' +
                                data[key][i].subject + '</td><td>' + data[key][i].registration_date + '<td class="action">' +
                                '<a class="btn btn-sm btn-primary btn-margin-left" href="file/edit/' + data[key][i].id + '"><i class="fa fa-pencil" ></i></a>' +
                                '<a class="btn btn-sm btn-danger" href="file/delete/' + data[key][i].id + '"><i class="fa fa-remove" ></i></a>' +
                                '</tr>'
                                );
                    }
                }
            })
            .fail(function (data) {
                $('table#files').append('<tr><td colspan="4">________</td></tr>');
            })
}

m.isNullAndUndef = function(variable){
    if(variable !== null && variable !== undefined)
    {
        return variable;
    }else
    {
        return '-----';
    }
}

/* set function to dom */
$(document).ready(function () {
    m.getFiles();
    m.storeModel('#FormAdd');/* form add models*/
    m.deleteModel('td.action a.btn-danger');

});