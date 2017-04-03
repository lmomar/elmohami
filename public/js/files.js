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
                console.log(url);
                $('table#files tbody tr').remove();/* clear rows from table */
                console.dir(data);
                for (var key in data)
                {
                $('#count').html(Object.keys(data[key]['data']).length);
                //console.dir(data[key]['data']);
                    for (var i in data[key]['data']) {
                        $('table#files').append(
                                '<tr><td>' + data[key]['data'][i].reference + '</td><td>' + data[key]['data'][i].type + '</td><td>' + m.isNullAndUndef(data[key]['data'][i].devision) + '</td><td>' +
                               m.isNullAndUndef(data[key]['data'][i].subject) + '</td><td>' + m.isNullAndUndef(data[key]['data'][i].registration_date) + '<td class="action">' +
                                '<a class="btn btn-sm btn-primary btn-margin-left" href="file/edit/' + data[key]['data'][i].id + '"><i class="fa fa-pencil" ></i></a>' +
                                '<a class="btn btn-sm btn-danger" href="file/delete/' + data[key]['data'][i].id + '"><i class="fa fa-remove" ></i></a>' +
                                '</tr>'
                                );
                    }
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.dir(errorThrown);
                $('table#files tbody tr').remove();/* clear rows from table */
                $('table#files').append('<tr><td colspan="6">------</td></tr>');
            })
}

m.Pagination = function(elementHandler){
    $(elementHandler).on('click',function(event){
       event.preventDefault();
       page = $(this).attr('href');
       page = page.split('=');       
       m.getFiles('http://localhost:82/elmohami/public/files/liste?page='+page[1]);
    });
    
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
    m.getFiles('http://localhost:82/elmohami/public/files/liste');
    m.Pagination('ul.pagination a');
    m.storeModel('#FormAdd');/* form add models*/
    m.deleteModel('td.action a.btn-danger');

});