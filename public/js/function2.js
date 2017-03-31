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
                    parent_id_modal = $('#court_parent').val();
                    $('#alertmsg').removeClass('hidden');
                    $('#myModal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('#filter_parent').find('option[value=' + parent_id_modal + ']').attr('selected','selected');/**/
                    m.getCourtsByParent(parent_id_modal);/* get id from modal */
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

m.getCourtsByParent = function (parent_id) {
    $.ajax({
        url: 'courts/get/' + parent_id,
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                $('table#courts tbody tr').remove();/* clear rows from table */
                for (var key in data)
                {
                    $('#count').html(Object.keys(data[key]).length);
                    for (var i in data[key]) {
                        $('table#courts').append(
                                '<tr><td>' + data[key][i].court_id + '</td><td>' + data[key][i].court_name + '</td><td>' + data[key][i].created_at + '</td><td class="action">' +
                                '<a class="btn btn-sm btn-primary btn-margin-left" href="courts/edit/' + data[key][i].court_id + '"><i class="fa fa-pencil" ></i></a>' +
                                '<a class="btn btn-sm btn-danger" href="courts/delete/' + data[key][i].court_id + '"><i class="fa fa-remove" ></i></a>' +
                                '</tr>'
                                );
                    }
                }
            })
                    .fail(function(data){
                        $('table#courts').append('<tr><td colspan="4">________</td></tr>');
            })
}


/* set function to dom */
$(document).ready(function(){
    parent_id = $('#filter_parent').find('option:first-child()').val();/* get courts by the first parent id at load*/
    m.getCourtsByParent(parent_id) ;
    /* get courts on change */
    $('#filter_parent').on('change',function(){
        m.getCourtsByParent($(this).val());
    });
    
    m.storeModel('#FormAdd');/* form add models*/
    m.deleteModel('td.action a.btn-danger');
    
});