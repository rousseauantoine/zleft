$( document ).ready(function() {
    init();
});

function init(){
    $('#clickMe').on('click',function(event){
        $.ajax({
            url: "ajaxIndex",
            type: "POST",
            dataType:'json',
            data: {
                do: "getNumberEntries"
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