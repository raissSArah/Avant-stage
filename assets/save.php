<? php
// Don't
var message = [
    '<form id="userForm">',
        '<input type="text" name="email" value="..." />',
    '</form>'
].join('');

bootbox.dialog({
    message: message
});
// Do
<form id="userForm" method="post" style="display: none;">
    <input type="text" name="email" />
</form>
$('#userForm').find('[name="email"]').val(...);

bootbox.dialog({
    message: $('#userForm')
});
$('#userForm')
    .formValidation({
        ...
    })
    .on('success.form.fv', function(e) {
        // Save the form data via an Ajax request
        e.preventDefault();

        $.ajax({
            url: '/path/to/api/endpoint/',
            data: $form.serialize()
        }).success(function(response) {
            // ... Process the result
        });
    });
?>