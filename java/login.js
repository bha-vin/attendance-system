const form = document.querySelector(".login form"),
signupBtn = document.querySelector(".button input");
errorText = document.querySelector(".error-text");

form.onsubmit = (e)=>{
	e.preventDefault();
}

signupBtn.onclick = ()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST","loginphp.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status ===200){
				let data = xhr.response;
				console.log(data);
				if (data == "succes") {
					location.href = "attendance2.php";
				}
				else if (data == "teachers") {
					location.href = "teachers.php";
				}
				else{
		    	errorText.textContent = data;
		    	errorText.style.display = "block";
		        }
			}
		    
		}
	}
	let formData = new FormData(form);
	xhr.send(formData);
}