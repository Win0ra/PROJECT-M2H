// AJOUT DE LA PHOTO DE PROFIL DANS LA PAGE MON COMPTE

document.getElementById("avatar").addEventListener("change", function (event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.querySelector(
        ".photo-profil"
      ).style.backgroundImage = `url(${e.target.result})`;
    };
    reader.readAsDataURL(file);
  }
});

// BOUTON ON/OFF PARAMETTRE SECURITE NOTIFICATIONS

$(document).ready(function () {
  $(".btn-securite").click(function () {
    if ($(this).css("padding-right") === "4px") {
      $(this).css("padding", "0px 40px 0px 0px"); // Déplacement vers la droite
      $(this).find(".cercle-jaune").css("background", "#253154");
      $(this).css("background", "#BFE3E7");
    } else {
      $(this).find(".cercle-jaune").css("background", "#EDC267");
      $(this).css("background", "#ffffff");
      $(this).css("padding", "0px 4px 0px 0px"); // Retour à gauche
    }
  });
});