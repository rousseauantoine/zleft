$( document ).ready(function() {
    init();
});

function init(){
    $('#clickMe').on('click',function(event){
        $.ajax({
            url: "ajaxIndex/getNumberEntries",
            type: "POST",
            dataType:'json',
            data: {
            },
            success: function(data){
                $('#numberEntries').html(data.output);
            },
            error: function (data) {
                alert('Failure');
            }
        });
    });
}