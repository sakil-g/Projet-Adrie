<?php
                session_start();
                if(isset($_POST['deconnexion']))
                { 
                   if($_POST['deconnexion']==true)
                   {  
                      // On détruit les variables de notre session
                      session_unset();
                      // On détruit notre session
                      session_destroy ();
                      header("location:../index.php");
                   }
                } ?>