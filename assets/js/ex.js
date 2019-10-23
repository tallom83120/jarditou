$(document).ready(function() 
{
    $("#ajout").click(function()         
    {
        alert("Vous avez cliqué sur le bouton");
    });
    var valeur = $("#monLien").attr("href"); 
    
   /* $("#p1").mouseover(function() {
    	  var a = $(this).text(); 
    	 
    	  alert(a);        
    	}); */
	
    $("#p1").mouseover(function() 
    {
        $(this).css("color", "green");         
    }); 
	
    $("#p1").mouseover(function() 
    {
       $(this).css({
                    "border" : "1px solid red",
                    "font-weight" : "bold",
                    "cursor" : "help"
    }); 
       
    }); 
    $("#p1").mouseout(function ()
    	       {
    	           $(this).css({'border' : 'none',
    	        	   'font-weight':'none',
    	        	   'cursor':'none'});
    	       });
  /*  $("#p1").mouseover(function() 
    		{   
    		   var a = $(this).css("background-color");
    		 
    		   // Affiche, par exemple, rgba(0, 0, 255) si fond rouge 
    		   alert(a);      
    		}); */
	
    $("#monLien").click(function() 
    {
       // On récupère le texte de div1  
       var letexte = $("#p1").text();     
     
       // Changer le texte (ici, copie le texte de div1 dans div2) :      
       $("#p2").text(letexte);                              
    }); 
    $('#p1').html("coucou c'est moi");
    
    var valeur = 'thibaut';  
    $("#prenom").val(valeur);

    $("#prenom").blur(function() 
    {
        // Récupère la valeur saisie dans le champ input #champ     
        var valeur = $(this).val();                              
    }); 
       
	
    function verif() 
    {     
         var envoi = true;
     
         // Récupère la valeur saisie dans le champ input #prenom     
         var leprenom = $("#prenom").val();
     
         if (leprenom == "") 
         {
             envoi = false;
             alert("Le prénom doit être renseigné"); 
         }     
     
         // +++ Ici contrôles pour d'autres champs +++
     
         // Si envoi est toujours à true, on peut soumettre le formulaire
         if (envoi == true) 
         { 
             document.forms[0].submit();
         } 
         else 
         {
             return false;
         }
    } 
     
    $("#btn_envoyer").click(function(e) 
    {
        /* On doit bloquer l'èvènement par défaut avec l'instruction 
        * ci-dessous
        * 'e' est un objet nommé librement représentant l'évènement
        */         
        e.preventDefault();
     
        // Appel de la fonction verif()
        verif();             
    });     
    
    
    
    
    
    
    
    
    
    
    
	
});