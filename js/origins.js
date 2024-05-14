$(document).ready(function(){
    $.ajax({
        url: '../script/fetch-origins.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            data.forEach(function(origin) {
                $('#origin').append('<option value="' + origin.originID + '">' + origin.originName + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
});
