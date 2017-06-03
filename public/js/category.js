
init();

function init(){
    console.log("OK");
    $(document).ready(function(){
        $(".dp, .greedy, .graph, .math, .string, .other").click(function(){
            var type = this.getAttribute('class').split(' ');
            getPage(type[0]);
        });
        $(".category-page").click(function(){
            location.href = "./probCategory";
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
            data = JSON.parse(data);
            showProblem(data);
            console.log("success");
        }
    });
}

function showProblem(data){
    var container = $(".container-fluid");
    console.log(container);
    var list = $("<ul>");
    list.prop('class', 'problem-wrap');
    for(var i = 0; i < data.length; i++){
        var li = $("<li>");
        var id = data[i]['id'];

        li.prop('class', 'problem-list');
        li.prop('id', id);
        var table = $("<div>");
        table.prop('class', 'wrap');
        var contest = $("<span>");
        contest.get(0).innerHTML = data[i]['contest'];
        var title = $("<a>");
        title.prop('class', 'probtitle');
        title.prop('href', './problem/'+id);
        title.get(0).innerHTML = data[i]['title'];
        table.append(contest);
        table.append(title);
        li.append(table);
        list.append(li);
    }
    container.get(0).innerHTML = "";
    container.append(list);
}
