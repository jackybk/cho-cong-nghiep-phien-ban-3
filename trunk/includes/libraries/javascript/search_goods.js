$(function(){
    $("#show_category").click(function(){
        $("ul[ectype='ul_category'] li").show();
        $(this).hide();
    });

    $("#show_brand").click(function(){
        $("ul[ectype='ul_brand'] li").show();
        $(this).hide();
    });

    $("#set_price_interval").click(function(){
        $("ul[ectype='ul_price'] li").show();
        $(this).hide();
    });

    $("#show_region").click(function(){
        $("ul[ectype='ul_region'] li").show();
        $(this).hide();
    });

    $("ul[ectype='ul_category'] a").click(function(){
        replaceParam('cate_id', this.id);
        return false;
    });
    $("ul[ectype='ul_brand'] a").click(function(){
        replaceParam('brand', this.id);
        return false;
    });
    $("ul[ectype='ul_price'] a").click(function(){
        replaceParam('price', this.title);
        return false;
    });
    $("#search_by_price").click(function(){
        replaceParam('price', $(this).siblings("input:first").val() + '-' + $(this).siblings("input:last").val());
        return false;
    });
    $("ul[ectype='ul_region'] a").click(function(){
        replaceParam('region_id', this.id);
        return false;
    });
    $("li[ectype='li_filter'] img").click(function(){
        dropParam(this.title);
        return false;
    });
    $("[ectype='order_by']").change(function(){
        replaceParam('order', this.value);
        return false;
    });

    $("li[ectype='dropdown_filter_title'] a").click(function(){
        var jq_li = $(this).parents("li[ectype='dropdown_filter_title']");
        var status = jq_li.find("img").attr("src") == upimg ? 'off' : 'on';
        switch_filter(jq_li.attr("ecvalue"), status)
    });

    $("[ectype='display_mode']").click(function(){
        $("[ectype='current_display_mode']").attr('class', $(this).attr('ecvalue'));
        $.setCookie('goodsDisplayMode', $(this).attr('ecvalue'));
    });
});

function switch_filter(filter, status)
{
    $("li[ectype='dropdown_filter_title']").attr('class', 'normal');
    $("li[ectype='dropdown_filter_title'] img").attr('src', downimg);
    $("div[ectype='dropdown_filter_content']").hide();

    if (status == 'on')
    {
        $("li[ectype='dropdown_filter_title'][ecvalue='" + filter + "']").attr('class', 'active');
        $("li[ectype='dropdown_filter_title'][ecvalue='" + filter + "'] img").attr('src', upimg);
        $("div[ectype='dropdown_filter_content'][ecvalue='" + filter + "']").show();
    }
}

function replaceParam(key, value)
{
    var params = location.search.substr(1).split('&');
    var found  = false;
    for (var i = 0; i < params.length; i++)
    {
        param = params[i];
        arr   = param.split('=');
        pKey  = arr[0];
        if (pKey == 'page')
        {
            params[i] = 'page=1';
        }
        if (pKey == key)
        {
            params[i] = key + '=' + value;
            found = true;
        }
    }
    if (!found)
    {
        value = transform_char(value);
        params.push(key + '=' + value);
    }
    location.assign(SITE_URL + '/index.php?' + params.join('&'));
}

function dropParam(key)
{
    var params = location.search.substr(1).split('&');
    for (var i = 0; i < params.length; i++)
    {
        param = params[i];
        arr   = param.split('=');
        pKey  = arr[0];
        if (pKey == 'page')
        {
            params[i] = 'page=1';
        }
        if (pKey == key)
        {
            params.splice(i, 1);
        }
    }
    location.assign(SITE_URL + '/index.php?' + params.join('&'));
}
