
init();

function init(){
    console.log("OK");
    $(document).ready(function(){
        $(".dp, .greedy, .graph, .math, .string, .other").click(function(){
            var type = this.getAttribute('class').split(' ');
            getPage(type[0]);
        });
    });
}

function getPage(type){
    $.ajax({
        //做CSRF, 防止500 error
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "pageAjax",
        data: { type: type},
        success: function(data){
            console.log(data);
            console.log("success");
        }
    });
}
