<?php include_once('../config.php'); ?>
<?php include_once('header.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>

<div class="container">
    <?php if(isset($_SESSION['username'])){ // Si l'utilisateur est connecté afficher un message de bienvenue
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<div class='text-center mt-3 alert alert-success'> Bonjour , $user </div>";
                } 
    ?>
    <div class="d-flex flex-column text-center mt-5">
        <h1>
            Feuille d'émargement
        </h1>
        </div>
        <p>Promotion :</p>

        <p>Date :</p>
        <a class="btn btn-outline-danger" href="#" role="button">Émargement</a>
        <a class="btn btn-outline-success" href="#" role="button">Emploi du temps</a>
    <section class="container text-center bg-light py-5">
        <form>
            
            <table class="table" id="test">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Présent(e)</th>
                        <th scope="col">Absent(e)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'dbh_co.php'; //accéder a la base de donnée
                    $sql = "SELECT * FROM utilisateur WHERE role_id = '2';" ; //selectionner la base de donnée UTILISATEUR
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) { 
                    while($row = $result->fetch_assoc()) 
                    echo    '<tr> 
                    <td>' .$row["nom"].'</td>
                    <td>' .$row["prenom"].'</td>
                    <td><input type="checkbox" value=""></td>
                    <td><input type="checkbox" value=""></td>
                    </tr>';
                    }
                    else {
                    echo "0 resultats trouvés";
                    }
                    $db->close();
                    ?>
                </tbody>
            </table>
            
            <input type="submit" class="btn btn-primary" value="Valider" name="valider_emargement">
            </form>
        </section>
            <p class="lead">
            <input type="button" id="create_pdf" value="Generate PDF">  
            <button id="txt" class="btn btn-success">EN .TEXT</button>
            </p>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>  
<script>  
    (function () {  
        var  
         form = $('.form'),  
         cache_width = form.width(),  
         a4 = [595.28, 841.89]; // for a4 size paper width and height  

        $('#create_pdf').on('click', function () {  
            $('body').scrollTop(0);  
            createPDF();  
        });  
        //create pdf  
        function createPDF() {  
            getCanvas().then(function (canvas) {  
                var  
                 img = canvas.toDataURL("image/png"),  
                 doc = new jsPDF({  
                     unit: 'px',  
                     format: 'a4'  
                 });  
                doc.addImage(img, 'JPEG', 20, 20);  
                doc.save('Bhavdip-html-to-pdf.pdf');  
                form.width(cache_width);  
            });  
        }  

        // create canvas object  
        function getCanvas() {  
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
            return html2canvas(form, {  
                imageTimeout: 2000,  
                removeContainer: true  
            });  
        }  

    }());  
</script>  
<script>  
    /* 
 * jQuery helper plugin for examples and tests 
 */  
    (function ($) {  
        $.fn.html2canvas = function (options) {  
            var date = new Date(),  
            $message = null,  
            timeoutTimer = false,  
            timer = date.getTime();  
            html2canvas.logging = options && options.logging;  
            html2canvas.Preload(this[0], $.extend({  
                complete: function (images) {  
                    var queue = html2canvas.Parse(this[0], images, options),  
                    $canvas = $(html2canvas.Renderer(queue, options)),  
                    finishTime = new Date();  

                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);  
                    $canvas.siblings().toggle();  

                    $(window).click(function () {  
                        if (!$canvas.is(':visible')) {  
                            $canvas.toggle().siblings().toggle();  
                            throwMessage("Canvas Render visible");  
                        } else {  
                            $canvas.siblings().toggle();  
                            $canvas.toggle();  
                            throwMessage("Canvas Render hidden");  
                        }  
                    });  
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);  
                }  
            }, options));  

            function throwMessage(msg, duration) {  
                window.clearTimeout(timeoutTimer);  
                timeoutTimer = window.setTimeout(function () {  
                    $message.fadeOut(function () {  
                        $message.remove();  
                    });  
                }, duration || 2000);  
                if ($message)  
                    $message.remove();  
                $message = $('<div ></div>').html(msg).css({  
                    margin: 0,  
                    padding: 10,  
                    background: "#000",  
                    opacity: 0.7,  
                    position: "fixed",  
                    top: 10,  
                    right: 10,  
                    fontFamily: 'Tahoma',  
                    color: '#fff',  
                    fontSize: 12,  
                    borderRadius: 12,  
                    width: 'auto',  
                    height: 'auto',  
                    textAlign: 'center',  
                    textDecoration: 'none'  
                }).hide().fadeIn().appendTo('body');  
            }  
        };  
    })(jQuery);  

</script>  
</body>
</html>

