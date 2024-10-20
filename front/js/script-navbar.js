// DROPDOWN NAVBAR

$(document).ready(function () {
    $(".arrow-dropdown").click(function () {
        $(".arrow-dropdown").css("transform", "rotate(90deg)");
        $(".dropdown").css("opacity", "1");
        if($(".dropdown").css("opacity") == "1"){
            $(".arrow-dropdown").css("transform", "rotate(0deg)");
            $(".dropdown").css("opacity", "0");
        }
    });
});
