$( document ).ready(function() {
    init();
});

function init(){
    $('#clickMe').on('click',function(event){
        $.ajax({
            url: "ajax",
            type: "POST",
            dataType:'json',
            data: {
                do: "getNumberEntries",
                message: "Hello"
            },
            success: function(data){
                $('#numberEntries').html(data.output);
            },
            error: function (data) {
                alert('non');
            }
        });
    });
}