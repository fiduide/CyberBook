
    function verif() { //Vérification du formulaire
        if (document.getElementById("ge").value=="") {
			alert("Pensez à taper un genre !");
			
            document.getElementById("ge").style.borderColor = "red";
			return false;
        }else{
            document.getElementById("ge").style.borderColor = "";
        }   
    }
    function verifLivre(){
        if (document.getElementById("isbn").value=="") {
			alert("Pensez à taper un isbn !");
			
            document.getElementById("isbn").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("isbn").style.borderColor = "";
        }
		if (document.getElementById("titre").value=="") {
			alert("Pensez à taper un titre !");
			
            document.getElementById("titre").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("titre").style.borderColor = "";
        }
        	if (document.getElementById("annee").value=="") {
			alert("Penser à taper une année valide !");
			
            document.getElementById("annee").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("annee").style.borderColor = "";
        }
		if (document.getElementById("editeur").value=="") {
			alert("Veuillez sélectionner un éditeur !");
			
            document.getElementById("editeur").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("editeur").style.borderColor = "";
        }
        if (document.getElementById("auteur").value=="") {
			alert("Veuillez sélectionner un auteur !");
			
            document.getElementById("auteur").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("auteur").style.borderColor = "";
        }
        if (document.getElementById("genre").value=="") {
			alert("Veuillez sélectionner un genre !");
			
            document.getElementById("genre").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("genre").style.borderColor = "";
        }
        if (document.getElementById("l").value=="") {
			alert("Veuillez sélectionner une langue !");
            document.getElementById("l").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("l").style.borderColor = "";
        }
        if (document.getElementById("nbpages").value < 4 && document.getElementById("nbpages").value != 0 ){
			alert("Veuillez mettre un nombre de page supérieur à 4 !");
            document.getElementById("nbpages").style.borderColor = "red";
			return false;
		}else{
            document.getElementById("nbpages").style.borderColor = "";
        }
        if (document.getElementById("nbpages").value == 0 || document.getElementById("nbpages").value == "")
        { // si le nb de page est zero ou rien alors ça deviendra null 
			return true;
        }
       
    }
    function verifAuteur(){
        if (document.getElementById("prenom").value=="") {
			alert("Pensez à taper un prenom !");
			
            document.getElementById("prenom").style.borderColor = "red";
			return false;
        }else{
            document.getElementById("prenom").style.borderColor = "";
;        }
        if (document.getElementById("nom").value=="") {
			alert("Pensez à taper un nom !");
			
            document.getElementById("nom").style.borderColor = "red";
			return false;
        }else{
            document.getElementById("nom").style.borderColor = "";
;        }
    }

    function verifEdit(){
        if (document.getElementById("edit").value=="") {
			alert("Pensez à taper un editeur !");
			
            document.getElementById("edit").style.borderColor = "red";
			return false;
        }else{
            document.getElementById("edit").style.borderColor = "";
        }
    }

    function  verifLang(){
        if (document.getElementById("lang").value=="") {
			alert("Pensez à taper une langue !");
			
            document.getElementById("lang").style.borderColor = "red";
			return false;
        }else{
            document.getElementById("lang").style.borderColor = "";
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
    function verifModif(){
        if (document.getElementById("titre").value=="") {
            alert("Pensez à taper un titre !");
            
            document.getElementById("titre").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("titre").style.borderColor = "";
        }
            if (document.getElementById("annee").value=="") {
            alert("Penser à taper une année valide !");
            
            document.getElementById("annee").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("annee").style.borderColor = "";
        }
        if (document.getElementById("editeur").value=="") {
            alert("Veuillez sélectionner un éditeur !");
            
            document.getElementById("editeur").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("editeur").style.borderColor = "";
        }
        if (document.getElementById("auteur").value=="") {
            alert("Veuillez sélectionner un auteur !");
            
            document.getElementById("auteur").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("auteur").style.borderColor = "";
        }
        if (document.getElementById("genre").value=="") {
            alert("Veuillez sélectionner un genre !");
            
            document.getElementById("genre").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("genre").style.borderColor = "";
        }
        if (document.getElementById("langue").value=="") {
            alert("Veuillez sélectionner une langue !");
            document.getElementById("langue").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("langue").style.borderColor = "";
        }
        if (document.getElementById("nbpages").value < 4 && document.getElementById("nbpages").value != 0 ){
            alert("Veuillez mettre un nombre de page supérieur à 4 ou ne rien mettre!");
            document.getElementById("nbpages").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("nbpages").style.borderColor = "";
        }
        if (document.getElementById("nbpages").value == 0 || document.getElementById("nbpages").value == "")
        { // si le nb de page est zero ou rien alors ça deviendra null 
            return true;
        }
    }

    function verifDelCompte(){
        var reponse = confirm ("Etes vous sur de vouloir supprimer ce compte ?");
            if(reponse == true){
                return true;
            }else {
                return false;
            }
    }

    function verifCompte(){
        if (document.getElementById("email").value=="") {
            alert("Veuillez sélectionner un email !");
            
            document.getElementById("email").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("email").style.borderColor = "";
        }
        if (document.getElementById("mdp").value=="") {
            alert("Veuillez sélectionner un mot de passe !");
            
            document.getElementById("mdp").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("mdp").style.borderColor = "";
        }
        if (document.getElementById("role").value=="") {
            alert("Veuillez sélectionner un mot de passe !");
            
            document.getElementById("role").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("role").style.borderColor = "";
        }
    }

    function verifModifCompte(){
        var reponse = confirm ("Etes vous sur de vouloir modifier ce compte ?");
            if(reponse == true){
                return true;
            }else {
                return false;
            }
    }

    function ROOF(){
        alert("Ce livre n'est actuellement pas disponible");
    }