<?php
    function validerDonneesFormInscription($data ) { // Création de la fonction qui va nous permettre de verifier les données
        $champs = [                                  // Ici on crée un tableau ou l'on récupere les champs dans notre formulaire
          array("key" => "username", "libele" => "Nom d'utilisateur"),
          array("key" => "password", "libele" => "Mot de passe"),
          array("key" => "nom", "libele" => "Nom"),           
          array("key" => "prenom", "libele" => "Prenom"), 
          array("key" => "email", "libele" => "Email"),
          array("key" => "numero", "libele" => "Numéro de télephone"),
          array("key" => "dob", "libele" => "Date de naissance"),
        ];  
        
        
        foreach ($champs as $value){ // à l'aide de la fonction foreach je parcours le tableau pour verifier les données insérer dans les champs
          if ( !isset($data[$value["key"]]) || $data[$value["key"]] == "" ) {
            return array("valide" => false, "message" => 'Renseignez le champ : "'.$value["libele"].'"');   
          }
          if(in_array($value["key"], array("nom", "prenom" , )) && !preg_match("/[A-Za-z - ]+/", $data[$value["key"]])){
            return array("valide" => false, "message" => 'Le champ : "'.$value["libele"].'" doit être verifié');
          }
          if ( $value["key"] == "password" && strlen($data[$value["key"]]) <= 8 )  {
            return array("valide" => false, "message" => 'votre mot de passe est trop faible');
          }
          
          if ( in_array($value["key"], array("password","username","email" )) && !preg_match("/[0-9a-z - ' @ ( ) ! # é è ]+/", $data[$value["key"]]) )  {
            return array("valide" => false, "message" => 'Renseignez le champ : "'.$value["libele"].'"');
          }
          if(in_array($value["key"], array("numero", "dob")) && !preg_match("/[0-9 - ' @ ( ) ! # é è ]+/", $data[$value["key"]])){
            return array("valide" => false, "message" => 'Le champ : "'.$value["libele"].'" doit être verifié');
          }
        } 
        return array("valide" => true);
      }



?>

