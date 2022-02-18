$(document).ready(function () {
    $(document).on('submit','#addUser', function (e) {
        e.preventDefault();
        $.ajax({
            url: '/users/add',
            method: 'POST',
            data: $(this).serialize(),
        });
    })
});