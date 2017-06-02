
init();

function init(){
    console.log("OK");
    $(document).ready(function(){
        $(".dp, .greedy, .graph, .math, .string, .other").click(function(){
            getPage();
        });
    });
}

function getPage(){
    $.ajax({
        //做CSRF, 防止500 error
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "pageAjax",
        data: "",
        success: function(){
            console.log("success");
        }
    });
}
