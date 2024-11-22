// SELECTION DES CENTRES D'INTERETS

$(document).ready(function () {
  $(".card-ci").click(function () {
    if ($(this).css("background-color") === "rgb(255, 255, 255)") {
      $(this).css("box-shadow", "none");
      $(this).css("border", "3px inset rgb(237 194 103 / 20%)");
      $(this).css("background", "linear-gradient(45deg, rgb(158 223 0 / 49%) 0%, rgba(255, 255, 255, 0.2) 100%)");
    }
    else {
      $(this).css("box-shadow", "0px 4px 4px rgba(0, 0, 0, 0.25)");
      $(this).css("border", "none");
      $(this).css("background", "rgb(255, 255, 255)");
    }
  });
});
