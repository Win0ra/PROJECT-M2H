// AJOUT DE LA PHOTO DE PROFIL DANS LA PAGE MON COMPTE

document.getElementById('avatar').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('.photo-profil').style.backgroundImage = `url(${e.target.result})`;
        };
        reader.readAsDataURL(file);
    }
});