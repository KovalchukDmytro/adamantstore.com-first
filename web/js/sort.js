
$("#sort_price_pop_up").on("change", function () {

    var select_id = $('#sort_price_pop_up')[0].selectedIndex;
    // var select_value = $("#sort_price_pop_up").children()[select_id].value;
    var product_list = $("#product_items");
    var product_items = $("#product_items").children().get();

    if(select_id==0)
    {
        product_items.sort(function(a,b) {
                var compA = $(a).children()[1].children[2].attributes[2].value;
                var compB = $(b).children()[1].children[2].attributes[2].value;
                return (compA > compB) ? -1 : (compA < compB) ? 1 : 0;
            }

        );
        $.each(product_items, function(idx, itm) { product_list.append(itm); });
    }

    if(select_id==1)
    {
        product_items.sort(function(a,b) {
                var compA = $(a).children()[1].children[2].attributes[2].value;
                var compB = $(b).children()[1].children[2].attributes[2].value;
                return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
            }

        );
        $.each(product_items, function(idx, itm) { product_list.append(itm); });
    }

    //console.log(product_items[0].children[0].children[2].attributes[2].value);

});

$("#sort_me").on("click", function () {
    var product_list = $("#product_items");
    var product_items = $("#product_items").children().get();

    product_items.sort(function(a,b) {
            var compA = $(a).children()[1].children[0].children[2].attributes[2].value;
            var compB = $(b).children()[1].children[0].children[2].attributes[2].value;
            return (compA > compB) ? -1 : (compA < compB) ? 1 : 0;
        }

    );
    $("#sort_span")[0].textContent=this.textContent;
    $.each(product_items, function(idx, itm) { product_list.append(itm); });
    $(".sort_by_list").removeClass("show_hide_1");

});

$("#sort_le").on("click", function () {
    var product_list = $("#product_items");
    var product_items = $("#product_items").children().get();
    product_items.sort(function(a,b) {
            var compA = $(a).children()[1].children[0].children[2].attributes[2].value;
            var compB = $(b).children()[1].children[0].children[2].attributes[2].value;
            return (compA < compB) ? -1 : (compA > compB) ? 1 : 0;
        }

    );
    $.each(product_items, function(idx, itm) { product_list.append(itm); });
    $("#sort_span")[0].textContent=this.textContent;
    $(".sort_by_list").removeClass("show_hide_1");
});