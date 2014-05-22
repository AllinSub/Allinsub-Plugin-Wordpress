var COOKIE_ISUSERCONNECTED = "isUserConnected";
var isUserConnected = false;
var dialog;


// Root method called from "I subscribe"
function showAuthDialog()
{
	// window.alert("Test");
	initAuthDialog(dialog);
	dialog.dialog({ width: "450px", title: "Je soutiens, je m'abonne", modal: true, resizable: false });
}

// Use to add first content in dialog
function initAuthDialog(dialog){
	if (isUserConnected) {
	} else {
		// Ask for auth
		dialog.html("" +
				'<div class="EPframe">' +
				'	<div class="EPframeTitle">Je crée mon compte</div>' +
				'	<div class="buttonsDiv">' +
				'		<button id="loginFacebook" onClick="loginFacebook()">Facebook</button><button id="loginAllinsub" onClick="loginAllinsub()">Allinsub</button>' +
				'	</div>' +
				'</div>' +
				'<button id="createAllinsub" onClick="createAllinsub()">J\'ai déjà un compte</button>');
	}
}

function loginAllinsub()
{
	// window.alert("Test");
	dialog.html("" +
			'<fieldset class="EPframe" align="left">' +
			'	<legend>Nouvel utilisateur</legend>' +
			'	<p><label for="name">Nom complet</label> : <input type="text" name="name" /></p>' +
			'	<p><label for="email">Email</label> : <input type="email" name="email" /></p>' +
			'	<p><label for="password">Mot de passe</label> : <input type="password" name="password" /></p>' +
			'	<p><label for="passwordConfirmation">Confirmation</label> : <input type="password" name="passwordConfirmation" /></p>' +
			'	<p>Genre : <input type="radio" name="gender" value="woman" id="woman" /> <label for="woman">Femme</label> <input type="radio" name="gender" value="man" id="man" /> <label for="man">Homme</label></p>' +	
			'	<p><label for="birthday">Date de naissance</label> : <input type="date" name="birthday" /></p>' +		
			'	<p><input type="checkbox" name="confirmationCGU" id="confirmationCGU" /> <label for="confirmationCGU">J\'accepte les <a href="">conditions d\'utilisation</a></label></p>' +	
			'</fieldset>' +
			'<div class="buttonsDiv">' +
			'	<button onClick="clearDialog()">Annuler</create><button onClick="checkForCreateAccount()">Créer</create>' +
			'</div>' +
			'');
}

function checkForCreateAccount() {
	setCookie(COOKIE_ISUSERCONNECTED, true);
	alert("Save in cookie");
	location.reload();
}

function clearDialog() {
	initAuthDialog(dialog);
}

function logout () {
	clearCookie(COOKIE_ISUSERCONNECTED);
	isUserConnected = false;
	location.reload();
}

function setCookie(sName, sValue) {
	var today = new Date(), expires = new Date();
	expires.setTime(today.getTime() + (365*24*60*60*1000));
	document.cookie = sName + "=" + encodeURIComponent(sValue) + ";expires=" + expires.toGMTString();
}

function getCookie(sName) {
        var cookContent = document.cookie, cookEnd, i, j;
        var sName = sName + "=";
 
        for (i=0, c=cookContent.length; i<c; i++) {
                j = i + sName.length;
                if (cookContent.substring(i, j) == sName) {
                        cookEnd = cookContent.indexOf(";", j);
                        if (cookEnd == -1) {
                                cookEnd = cookContent.length;
                        }
                        return decodeURIComponent(cookContent.substring(j, cookEnd));
                }
        }       
        return null;
}

function clearCookie(sName) {
	var today = new Date(), expires = new Date();
	expires.setTime(today.getTime() - 1000);
	document.cookie = sName + "=" + encodeURIComponent("") + ";expires=" + expires.toGMTString();
}

function onPageLoaded () {
	// init dialog
	dialog = jQuery( "#dialog" );

	// Manage user connection
	isUserConnected = isUserConnectedFct();
	if (isUserConnected == true){
		var aisWidget = jQuery( "#EP_Widget" );
		aisWidget.html("" +
			'<h1>Bonjour Marc,</h1>' +
			'<br />' +
			'<div>Votre abonnement à '+ blogInfo.name +' est valable jusqu\'au 13/03/2014</div>' +
			'<br />' +
			'<div class="alignCenter">' +
				'<button onClick=\'window.location.href="http://www.allinsub.com/user/1"\'>Voir mon compte</button><button onClick="logout()">Déconnexion</button>' +
			'</ div>' +
			'<br />' +
			'<div id="textViaDiv">Via <a href="www.allinsub.com">Allinsub</a></div>' +
			'');
	} else {
	}
}

function isUserConnectedFct (){
	return getCookie(COOKIE_ISUSERCONNECTED) == "true";
}

window.onload = onPageLoaded;