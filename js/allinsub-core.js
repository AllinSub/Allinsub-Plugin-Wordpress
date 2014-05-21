function showAuthDialog()
{
	// window.alert("Test");
	var dialog = jQuery( "#dialog" );
	initAuthDialog(dialog);
	dialog.dialog({ width: "450px", title: "Je soutiens, je m'abonne", modal: true, resizable: false });
}

function initAuthDialog(dialog){
	dialog.html("" +
			'<div class="EPframe">' +
			'	<div class="EPframeTitle">Je crée mon compte</div>' +
			'	<div class="buttonsDiv">' +
			'		<button id="loginFacebook" onClick="loginFacebook()">Facebook</button><button id="loginAllinsub" onClick="loginAllinsub()">Allinsub</button>' +
			'	</div>' +
			'</div>' +
			'<button id="createAllinsub" onClick="createAllinsub()">J\'ai déjà un compte</button>');
}

function loginAllinsub()
{
	// window.alert("Test");
	var dialog = jQuery( "#dialog" );
	dialog.html("" +
			'<fieldset class="EPframe" align="left">' +
			'	<legend>Nouvel utilisateur</legend>' +
			'	<p><label for="name">Nom complet</label> : <input type="text" name="name" /></p>' +
			'	<p><label for="email">Email</label> : <input type="email" name="email" /></p>' +
			'	<p><label for="password">Mot de passe</label> : <input type="password" name="password" /></p>' +
			'	<p><label for="passwordConfirmation">Confirmation</label> : <input type="password" name="passwordConfirmation" /></p>' +
			'	<p>Genre : <input type="radio" name="gender" value="woman" id="woman" /> <label for="woman">Femme</label> <input type="radio" name="gender" value="man" id="man" /> <label for="man">Homme</label></p>' +	
			'	<p><label for="birthday">Date de naissance</label> : <input type="date" name="birthday" /></p>' +		
			'	<p><input type="checkbox" name="confirmationCGU" id="confirmationCGU" /> <label for="confirmationCGU">J\accepte les <a href="">conditions d\'utilisation</a></label></p>' +	
			'</fieldset>' +
			'<div class="buttonsDiv">' +
			'	<button onClick="clearDialog()">Annuler</create><button>Créer</create>' +
			'</div>' +
			'');
}

function clearDialog() {
	var dialog = jQuery( "#dialog" );
	initAuthDialog(dialog);
}