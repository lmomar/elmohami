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
        console.log('submited');
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

   $('select#court_parent').on('change',function(){
       //console.log('test');
       $.ajax({
           url:'courts/get/' + $(this).val(),
           type : 'get',
           dataType : 'json'
       })
               .done(function(data){
                   console.log('append data');
           $('table#courts tbody tr').remove();
           for(var key in data)
           {
               
              $('#count').html(Object.keys(data[key]).length);
               for(var i in data[key]){
                   //console.log(data[key][i]);
                    
                   //console.log(data[key][i].court_id);
                   
                   $('table#courts').append(
                      '<tr><td>' + data[key][i].court_id + '</td><td>' + data[key][i].court_name + '</td><td>' + data[key][i].created_at + '</td><td>' + 
                      '<a class="btn btn-sm btn-primary" href="edit/' + data[key][i].court_id +'"><i class="fa fa-pencil" ></i></a>' +
                      '<a class="btn btn-sm btn-danger" href="delete/' + data[key][i].court_id +'"><i class="fa fa-pencil" ></i></a>' +
                                   '</tr>'
                           );
               }
           }
           
       })
   });
});