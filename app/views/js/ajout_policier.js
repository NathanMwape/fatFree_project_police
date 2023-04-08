nom          = document.getElementById('nom');
postnom      = document.getElementById('postnom');
prenom       = document.getElementById('prenom');
age          = document.getElementById('age');

function check() {
    if( nom.value == '' || postnom.value == '' || prenom.value == '' ||
        age.value == '')
    {
        alert("Veuillez remplir tous les champs");
        return false;
    }
    else if(isNaN(age.value) == true)
    {
        alert('Age : doit etre un nombre.');
        return false;
    }
    return true;
}
function imprimer(){
    window.print();
}