
    function verif() { //Vérification du formulaire
        if (document.getElementById("ge").value=="") {
			alert("Pensez à taper un genre !");
			
            document.getElementById("ge").style.borderColor = "red";
			return false;
        }
        if (document.getElementById("edit").value=="") {
			alert("Pensez à taper un editeur !");
			
            document.getElementById("edit").style.borderColor = "red";
			return false;
        }
        if (document.getElementById("prenom").value=="") {
			alert("Pensez à taper un prenom !");
			
            document.getElementById("prenom").style.borderColor = "red";
			return false;
        }
        if (document.getElementById("nom").value=="") {
			alert("Pensez à taper un nom !");
			
            document.getElementById("nom").style.borderColor = "red";
			return false;
        }
        if (document.getElementById("isbn").value=="") {
			alert("Pensez à taper un isbn !");
			
            document.getElementById("isbn").style.borderColor = "red";
			return false;
		}
		if (document.getElementById("titre").value=="") {
			alert("Pensez à taper un titre !");
			
            document.getElementById("titre").style.borderColor = "red";
			return false;
		}
        	if (document.getElementById("annee").value=="") {
			alert("Penser à taper une année valide !");
			
            document.getElementById("annee").style.borderColor = "red";
			return false;
		}
		if (document.getElementById("editeur").value=="") {
			alert("Veuillez sélectionner un éditeur !");
			
            document.getElementById("editeur").style.borderColor = "red";
			return false;
		}
        if (document.getElementById("auteur").value=="") {
			alert("Veuillez sélectionner un auteur !");
			
            document.getElementById("auteur").style.borderColor = "red";
			return false;
		}
        if (document.getElementById("genre").value=="") {
			alert("Veuillez sélectionner un genre !");
			
            document.getElementById("genre").style.borderColor = "red";
			return false;
		}
        if (document.getElementById("l").value=="") {
			alert("Veuillez sélectionner une langue !");
            document.getElementById("l").style.borderColor = "red";
			return false;
		}
        if (document.getElementById("nbpages").value < 4 && document.getElementById("nbpages").value != 0 ){
			alert("Veuillez mettre un nombre de page supérieur à 4 !");
            document.getElementById("nbpages").style.borderColor = "red";
			return false;
		}
        if (document.getElementById("nbpages").value == 0 || document.getElementById("nbpages").value == "")
        { // si le nb de page est zero ou rien alors ça deviendra null 
			return true;
        }
       
	}

            function Delete(){
                var reponse = confirm ("Etes vous sur de vouloir supprimer ce livre ?");
            if(reponse == true){
                return true;
            }else {
                return false;
            }
            }

            function Modif(){
                var reponse = confirm ("Etes vous sur de vouloir modifier ce livre ?");
            if(reponse == true){
                return true;
            }else {
                return false;
            }
            }
    