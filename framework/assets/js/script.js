$(document).ready(function () {
    $(document).on('submit','#add', function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
        }).done(function (response) {
             console.log(response)
             alert(response.text);
             window.location.reload();
        }).fail(function (response) {
             alert(response.text);
             window.location.reload();
        });
    });

    $(document).on('click','#deleteUser', function (e) {
        e.preventDefault();
         $.ajax({
             url: $(this).attr('href'),
             method: 'GET',
         }).done(function (response) {
             alert(response.text);
             window.location.reload();
         }).fail(function (response) {
             alert(response.text);
             window.location.reload();
         });
    })
    $(document).on('submit','#date', function (e) {
        e.preventDefault();
        var data = $(this).attr('date');
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
        }).done(function (response) {
            $("input[name="+data+"]").val(response.value)
        }).fail(function (response) {

        });
    });

});