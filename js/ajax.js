
/* This JavaScript is provided to using XHR object and send data to php. */

var xhr = createRequest();

function getLogin(dataSource, divID, Username, Password){
	if(xhr){
		var obj = document.getElementById(divID);
		var requestbody = "username="+encodeURIComponent(Username)
						+"&password="+encodeURIComponent(Password);
		xhr.open("POST", dataSource, true);
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			obj.innerHTML = xhr.responseText;
			}
	}
		xhr.send(requestbody);
	}
}

