

$(document).ready(function(){
    $("#dang_nhap").click(function(){
        $("#dang-nhap-form").slideToggle("slow");
    });
});

$(document).ready(function(){
    $("#dang_ky").click(function(){
        $("body").load("?menu=dang_ky");
    });
});
$(document).ready(function(){
    $(".menu2").click(function(){
        $(".item1").slideToggle("slow");
    });
});
$(document).ready(function(){
    $(".menu2").click(function(){
        $("ul").slideToggle("slow");
    });
});

