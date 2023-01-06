var item_id = 0;
const add_item = () => {
    const qty = $("#qty").val();
    const item_name = $("#item").val();
    const unit = $("#unit").val();
    const needBy = $("#need_by").val();
    const newItem = `<div class="row" id="item_`+item_id+`"><div class="col-sm-1"></div><div class="col-sm-1"><h5>`+qty+`</h5></div><div class="col-sm-4"><h5>`+item_name+`</h5></div><div class="col-sm-2"><h5>`+unit+`</h5></div><div class="col-sm-2"><h5>`+needBy+`</h5></div><div class="col-sm-1"><button class="removeBtn" onclick="remove_item(`+item_id+`)">&#10060</button></div></div>`;
    $("ul.item_list").append(newItem);
    item_id++;
    $("#myModal").modal("hide")
}
const newItem = () => {
    $("#qty").val("");
    $("#item").val("");
    $("#myInput").val("");
    $("#unit").val("");
    $("#need_by").val("");
}
const remove_item = (id) => {
    $("#item_"+id).remove();
}

const dropDown = () => {
    document.getElementById("myDropdown").classList.toggle("show");
}

const select_item = (selected) =>{
    $("#item").val(selected);
    document.getElementById("myDropdown").classList.toggle("show");
}

$(document).ready(function() {
        
    $.ajax({
        type:"GET",
        url:'db_config.php',
        data:{type:"all"},
        success: function (response) {
            var filtered_html = "";
            response = JSON.parse(response);
            console.log(response);
            if(response != -1)
                for(var i=0;i<response.length;i++){
                    filtered_html+= '<a href="#" onclick="select_item(`'+response[i].invntryitm_nme+'`)" >'+response[i].invntryitm_nme+'</a>'
                }
            $('#filter_result').html(filtered_html);
            console.log((response));
        },
        error: function () {
            $('#players1').html('There was an error!');
        }
    });

    $("#myInput").on('keyup',function(event){
        var value = $('#myInput').val();
        var type = "";
        if(value =="")
            type = "all";
        else
            type="filter";
        $.ajax({
        type:"GET",
        url:'db_config.php',
        data:{type:type, filter:value},
        success: function (response) {
            var filtered_html = "";
            response = JSON.parse(response);
            if(response != -1)
                for(var i=0;i<response.length;i++){
                    filtered_html+= '<a href="#" onclick="select_item(`'+response[i].invntryitm_nme+'`)" >'+response[i].invntryitm_nme+'</a>'
                }
            $('#filter_result').html(filtered_html);
            console.log((response));
        },
        error: function () {
            $('#players1').html('There was an error!');
        }
    });
    });
   
});