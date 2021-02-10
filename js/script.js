// Navbar
   $('.nav-link').on('click', function() {
	$('.active-link').removeClass('active-link');
	$(this).addClass('active-link');
});

// Fonction pour supprimer un utilisateur
var supApp = function (id) {
    let validationFormApp = document.getElementById('validationFormApp');
    validationFormApp.setAttribute('action',"../includes/sup_app.php?id="+id);
      }

var supTut = function (id) {
   let validationFormTut = document.getElementById('validationFormTut');
       validationFormTut.setAttribute('action',"../includes/sup_tut.php?id="+id);
      }