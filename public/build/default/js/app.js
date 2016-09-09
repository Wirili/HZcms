$(function(){
    //设置ajax，csrf令牌
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".right").css('min-height',($(window).height()-70)+'px');
    leftmu();
    $('.menu-btn').on('click',function(e){
        if($('.main').hasClass('active')){
            $('.main').removeClass('active');
        }else{
            $('.main').addClass('active');
        }
    });

    $('body').on('click','.main.active .right',function(e){
        if($('.main').hasClass('active')){
            $('.main').removeClass('active');
        }else{
            $('.main').addClass('active');
        }
    });
})

function leftmu(){
    //$(selector).toggle(speed,callback);
    $(".left [class='sub-menu']").each(function(){
        $(this).prev().click(function(e) {
            var zicd=$(this).next(".sub-menu");
            //$(this).next(".sub-menu").toggle(500);
            $(".sub-menu").not(zicd).prev().each(function(){
                $(this).next(".sub-menu").hide(400);
                $(this).find(".llong1").removeClass("glyphicon-menu-down");
                $(this).find(".llong1").addClass("glyphicon-menu-left")	;
            })
            if($(zicd).is(":hidden")){
                $(this).find(".llong1").removeClass("glyphicon-menu-left");
                $(this).find(".llong1").addClass("glyphicon-menu-down");
                $(zicd).show(400);
            }else{
                $(zicd).hide(400);
                $(this).find(".llong1").removeClass("glyphicon-menu-down");
                $(this).find(".llong1").addClass("glyphicon-menu-left");
            }
        });
    });
}

function mgo(x){
    var zcd=$("#m"+x.toString());
    var zcc=$(zcd).parent("li").parent(".sub-menu").prev();
    $(zcd).addClass("btn-long32");
    $(zcc).addClass("btn-long16");
    $(zcc).find(".llong1").removeClass("glyphicon-menu-left");
    $(zcc).find(".llong1").addClass("glyphicon-menu-down");
    $(zcd).parent("li").parent(".sub-menu").show();
    //alert($(zcd).parent("li").parent(".sub-menu").prev().html())
}