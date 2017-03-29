$(document).ready(function () {
    $('tbody tr td a.btn-danger').on('click', function (event) {
        event.preventDefault();
        //console.log('ok');
        $.ajax({
            url: $(this).attr('href'),
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $(event.target).closest('tr').fadeOut();
                //console.log('test');
                $('#alertmsg').html('<p>تم حدف الجلسة بنجاح</p>');
                $('#alertmsg').removeClass('hidden');
                setTimeout(location.reload.bind(location), 2000);
            }
        })
    });

    $('#FormAdd').submit(function (event) {
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
                    //window.location.reload();
                    setTimeout(location.reload.bind(location), 2000);
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#FormAdd input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                });


    });
});