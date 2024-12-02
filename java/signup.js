const form = document.querySelector(".signup form"),
signupBtn = document.querySelector(".button input");
errorText = document.querySelector(".error-text");
radio_student = document.querySelector(".signup form .radio_student");
radio_teacher = document.querySelector(".signup form .radio_teacher");
permeation_branch = document.querySelector(".signup form .permeation_branch");

radio_student.onclick = ()=>{
	console.log("dilesh");
	permeation_branch.classList.add("act");
}
radio_teacher.onclick = ()=>{
	console.log("dilesh");
	permeation_branch.classList.remove("act");
}

form.onsubmit = (e)=>{
	e.preventDefault();
}

signupBtn.onclick = ()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST","signup.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status ===200){
				let data = xhr.response;
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