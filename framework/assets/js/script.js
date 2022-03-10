$(document).ready(function () {
    $(document).on('submit','#addUser', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/users/add',
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
});