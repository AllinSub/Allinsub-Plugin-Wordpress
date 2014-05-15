function showAuthDialog()
{
	// window.alert("Test");
	var dialog = jQuery( "#dialog" );
	dialog.html("" +
			'<div class="EPframe">' +
			'	<div class="EPframeTitle">Je crée mon compte</div>' +
			'	<div class="buttonsDiv">' +
			'		<button id="loginFacebook" onClick="loginFacebook()">Facebook</button><button id="loginEasyPremium" onClick="loginEasyPremium()">EasyPremium</button>' +
			'	</div>' +
			'</div>' +
			'<button id="createEasyPremium" onClick="createEasyPremium()">J\'ai déjà un compte</button>');
	dialog.dialog({ title: "", modal: true, resizable: false });
}

function loginEasyPremium()
{
	// window.alert("Test");
	var dialog = jQuery( "#dialog" );
	dialog.html("" +
			'<div class="EPframe">' +
			'	<div class="EPframeTitle">Nouvel utilisateur</div>' +
			'	<div class="buttonsDiv">' +
			'	</div>' +
			'</div>' +
			'');
}