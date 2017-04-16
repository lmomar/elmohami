
//var file_id = 0;
/*
 * for modal to add object in database
 */
var parent_court_id = 0;
var sub_court_id = 0;
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
                    m.Paginate();
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
                            '<tr><td><a data-id="' + file.id + '" id="file-' + file.id + '" class="btn btn-sm btn-primary color-blank">' + file.reference + ' </a></td><td>' + m.isNullAndUndef(file.elementary_num) + '</td><td>' + m.isNullAndUndef(file.type) + '</td><td>' +
                            m.isNullAndUndef(file.decision_judge) + '</td><td>' + m.isNullAndUndef(file.registration_date) + '<td class="action">' +
                            '<a data-id="' + file.id + '" id="edit-' + file.id + '" data-toggle="modal" data-target="#myModalEdit" class="btn btn-sm btn-primary btn-margin-left color-blank" href="#edit-' + file.id + '">تعديل <i class="fa fa-pencil" ></i></a>' +
                            '</td></tr>'
                            );
                }

            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                $('table#files tbody tr').remove();/* clear rows from table */
                $('table#files').append('<tr><td colspan="6">------</td></tr>');
            })
}


m.Paginate = function () {
    $.ajax({
        url: 'http://elmohami.dev/files/liste',
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                //console.dir(data);
                total_page = data['files'].last_page;
                current_page = data['files'].current_page;
                $('#pagination').twbsPagination({
                    totalPages: total_page,
                    visiblePages: current_page,
                    onPageClick: function (event, pageL) {
                        page = pageL;
                        m.getFiles('http://elmohami.dev/files/liste?page=' + page);

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

m.getFileInfo = function (elementHandler) {
    $(document).on('click', elementHandler, function (event) {
        event.preventDefault();
        $.ajax({
            url: 'http://elmohami.dev/files/getFileInfo/' + $(this).attr('data-id'),
            type: 'GET',
            dataType: 'json'
        })
                .done(function (data) {
                    //console.dir(data['file']);
                    $('#collapseOne').attr('aria-expanded', 'true');
                    $('#collapseOne').attr('style', '');

                    $('#collapseOne').addClass('in');

                    $('#court_name').html(data['file'].court_id);
                    $('#elementary_num').html(data['file'].elementary_num);
                    $('#file_type').html(data['file'].type);
                    $('#division').html(data['file'].division);
                    $('#decision_judge').html(data['file'].decision_judge);
                    $('#registration_date').html(data['file'].registration_date);
                    $('#appellate_num').html(data['file'].appellate_num);
                    $('#appellate_judge').html(data['file'].appellate_judge);
                    $('#subject').html(data['file'].subject);
                    $('#verdict').html(data['file'].verdict);
                    $('#verdict_date').html(data['file'].verdict_date);

                    $('#card_info_file').removeClass('hidden');
                    //console.log('hidden');
                    //console.log('getting proc');
                    //console.log(file_id);
                    procedure.getData('http://elmohami.dev/procedures/all/' + file_id);
                    procedure.Paginate(file_id);

                    partie.getData('http://elmohami.dev/parties/all/' + file_id);
                })

    });
}

m.bindEditFileInfo = function (id) {

    $.ajax({
        url: 'http://elmohami.dev/files/getFileInfo/' + id,
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                console.dir(data['file']);
                //$('#court_name').html(data['file'].court_id);
                $("#FormEdit input[name='file_id']").attr('value', id);
                $("#FormEdit input[name='reference']").attr('value', data['file'].reference);
                $("#FormEdit input[name='elementary_num']").attr('value', data['file'].elementary_num);
                $("#FormEdit input[name='type']").attr('value', data['file'].type);
                $("#FormEdit input[name='division']").attr('value', data['file'].division);
                $("#FormEdit input[name='decision_judge']").attr('value', data['file'].decision_judge);
                $("#FormEdit input[name='registration_date']").attr('value', data['file'].registration_date);
                $("#FormEdit input[name='appellate_num']").attr('value', data['file'].appellate_num);
                $("#FormEdit input[name='appellate_judge']").attr('value', data['file'].appellate_judge);
                $("#FormEdit input[name='subject']").attr('value', data['file'].subject);
                $("#FormEdit input[name='verdict']").attr('value', data['file'].verdict);
                $("#FormEdit input[name='verdict_date']").attr('value', data['file'].verdict_date);
                sub_court_id = data['file'].court_id;
                m.selectedParentCourt(sub_court_id);
            });
}

m.getIdFromClik = function (elementHandler) {
    $(document).on('click', elementHandler, function (event) {
        event.preventDefault();
        file_id = $(this).attr('data-id');
        $('#files tbody tr').removeClass('selectedRow');
        $(this).closest('tr').addClass('selectedRow');

    });
}

m.updateModel = function (elementhandler) {
    $(elementhandler).submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json'
        })
                .done(function (data) {
                    $('#alertmsg').html('<p>تم تعديل الملف بنجاح</p>')
                    $('#alertmsg').removeClass('hidden');
                    $('#myModalEdit').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    m.Paginate();
                    //setTimeout(location.reload.bind(location), 2000);
                })
                .fail(function (data) {
                    $.each(data.responseJSON, function (key, value) {
                        var input = '#FormEdit input[name=' + key + ']';
                        $(input + '+small').text(value);
                        $(input).parent().addClass('has-error');
                    });
                })
    });
}

/*  select parent and sub court in edit file */

m.selectedParentCourt = function (sub_id) {
    $.ajax({
        url: 'http://elmohami.dev/courts/parent/' + sub_id,
        type: 'GET',
        dataType: 'json'
    })
            .done(function (data) {
                console.dir(data);
                parent_court_id = data['parent_id'];


                //console.log($('#ecourts option[value="' + data['parent_id'] + '"]').attr('value'));
                /* selecting parent_court */
                $('#ecourts option').removeClass('selectedOption');
                $('#ecourts option[value="' + data['parent_id'] + '"]').attr('selected', 'selected');
                $('#ecourts option[value="' + data['parent_id'] + '"]').addClass('selectedOption');

                m.selectedSubCourt(parent_court_id);



            })
            .fail(function (error) {
                console.dir(error);
            });
}
/* in edit */
m.selectedSubCourt = function (parent_id) {
    $.ajax({
        url: 'http://elmohami.dev/courts/get/' + parent_id,
        type: 'get',
        dataType: 'json'
    })
            .done(function (data) {
                /* selecting sub court*/
        console.log('sub:');
        console.dir(data['courts'].length);
        sub = data['courts'];
                $('#esub_courts option').remove();
                for (i = 0; i < sub.length; i++) {
                    $('#esub_courts').append(
                            '<option value="' + sub[i].id + '">' + sub[i].name + '</option>'
                            );
                }
                //$('#esub_courts option').removeClass('selectedOption');
                $('#esub_courts option[value="' + sub_court_id + '"]').attr('selected', 'selected');
                $('#esub_courts option[value="' + sub_court_id + '"]').addClass('selectedOption');
            })
}


/* set function to dom */
$(document).ready(function () {
    m.Paginate();
    m.storeModel('#FormAdd');/* form add models*/
    m.updateModel('#FormEdit');/* form add models*/
    m.deleteModel('td.action a.btn-danger');
    m.getFileInfo("a[id*='file-']");
    m.getIdFromClik("a[id*='edit-'],a[id*='file-']");
    $('#myModalEdit').on('shown.bs.modal', function () {
        m.bindEditFileInfo(file_id);
    });
    $('#myModal').on('shown.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });



});