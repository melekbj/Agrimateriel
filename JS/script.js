function verife() {
    if (document.inscri.nom.value.length < 4) {
        //fema fonction t9olk bara emchi l javascript ektebli f div el flenya el msg hedha 

        var div = document.getElementById('myDiv');
        div.innerHTML += "vérifier votre nom";
        document.inscri.nom.focus();
        return false;
    }


    if (document.inscri.prenom.value.length < 4) {
        var div = document.getElementById('divPrenom');
        div.innerHTML += "vérifier votre prenom";
        document.inscri.prenom.focus();
        return false;
    }


    if (
        document.inscri.sexe[0].checked == 0 &&
        document.inscri.sexe[1].checked == 0
    ) {

        var div = document.getElementById('divSexe');
        div.innerHTML += "cocher sexe";
        document.inscri.radio.focus();
        return false;


    }



    if (document.inscri.telephone.value == "" || document.inscri.telephone.value.length != 8) {

        var div = document.getElementById('divTel');
        div.innerHTML += "vérifier votre numéro de téléphone";
        document.inscri.telephone.focus();
        return false;

    }

    var nb = 1;
    for (i = 0; i < document.inscri.telephone.value.length; ++i)
        if (
            document.inscri.telephone.value.charAt(i) < "0" ||
            document.inscri.telephone.value.charAt(i) > "9"
        )
            nb = -1;
    if (nb == -1) {
        var div = document.getElementById('divTel');
        div.innerHTML += "vérifier votre numéro de téléphone";
        document.inscri.telephone.focus();
        return false;
    }




    if (document.inscri.emailClient.value == "") {
        var div = document.getElementById('divEmail');
        div.innerHTML += "Ajouter votre email";
        document.inscri.emailClient.focus();
        return false;
    }
    if (document.inscri.emailClient.value.indexOf("@") == -1) {
        var div = document.getElementById('divEmail');
        div.innerHTML += "vérifier votre email";
        document.inscri.emailClient.focus();
        return false;
    }
    if (document.inscri.emailClient.value.indexOf(".") == -1) {
        var div = document.getElementById('divEmail');
        div.innerHTML += "vérifier votre email";
        document.inscri.emailClient.focus();
        return false;
    }


}

function test() {

    if (document.commande.nbrHeure.selectedIndex == 0) {
        var div = document.getElementById('divHeure');
        div.innerHTML += "sélectionner nombre d'heure ";
        document.inscri.nbrHeure.focus();
        return false;
    }


}

function verif_annonce() {
    if (document.inscritAnnonce.nom.value.length < 4 || document.inscritAnnonce.nom.value == "") {
        //fema fonction t9olk bara emchi l javascript ektebli f div el flenya el msg hedha 

        var div = document.getElementById('divNom');
        div.innerHTML += "vérifier le nom de la machine";
        document.inscritAnnonce.nom.focus();
        return false;
    }

    if (document.inscritAnnonce.adresse.selectedIndex == 0) {
        var div = document.getElementById('divAdresse');
        div.innerHTML += "sélectionner une ville ";
        document.inscritAnnonce.adresse.focus();
        return false;
    }
    if (document.inscritAnnonce.categorie.selectedIndex == 0) {
        var div = document.getElementById('divCateg');
        div.innerHTML += "sélectionner une categorie ";
        document.inscritAnnonce.categorie.focus();
        return false;
    }

    if (document.inscritAnnonce.description.value.length < 4 || document.inscritAnnonce.description.value == "") {
        //fema fonction t9olk bara emchi l javascript ektebli f div el flenya el msg hedha 

        var div = document.getElementById('divDescrip');
        div.innerHTML += "vérifier la description de la machine";
        document.inscritAnnonce.description.focus();
        return false;
    }

    if (document.inscritAnnonce.prixHeure.value == "") {
        //fema fonction t9olk bara emchi l javascript ektebli f div el flenya el msg hedha 

        var div = document.getElementById('divPrix');
        div.innerHTML += "vérifier le prix ";
        document.inscritAnnonce.prixHeure.focus();
        return false;
    }


}