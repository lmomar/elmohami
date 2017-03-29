$(document).ready(function(){
    $('tbody tr td a.btn-danger').on('click',function(event){
       event.preventDefault();
       //console.log('ok');
       $.ajax({
           url : $(this).attr('href'),
           type: 'GET',
           dataType : 'json',
           success:function(response){
               $(event.target).closest('tr').fadeOut();
               //console.log('test');
               $('#alertmsg').html('<p>تم حدف الجلسة بنجاح</p>');
               $('#alertmsg').removeClass('hidden').delay(1500).queue(function(){
                   $(this).addClass('hidden').dequeue();
               });
           }
       })
    });
});