const searchBar =  document.querySelector(".subject .search input"),
searchBtn =  document.querySelector(".subject header .searchicon");
search =  document.querySelector(".subject .search");
crosBtn =  document.querySelector(".subject .search button");
header =  document.querySelector(".subject header");
subject_icon =  document.querySelector(".subject .subject-icon");

uplode =  document.querySelector(".subject header .uplode");


searchBtn.onclick =()=>{
	search.classList.add("act");
	header.classList.add("act");
	searchBar.focus();
	searchBtn.classList.add("act");
	subject_icon.classList.add("act");
	uplode.classList.add("act");

}
crosBtn.onclick = ()=>{
	search.classList.remove("act");
	header.classList.remove("act");
	searchBtn.classList.remove("act");
	subject_icon.classList.remove("act");

	uplode.classList.remove("act");

}


setInterval(()=>{
searchBar.onkeyup =()=>{
	let searchTerm = searchBar.value;
	if (searchTerm != "") {
		searchBar.classList.add("active");
	}
	else{
		searchBar.classList.remove("active");
	}
	let xhr = new XMLHttpRequest();
	xhr.open("POST","searchphp.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				let data = xhr.response;
				subject_icon.innerHTML = data;
			}
		    
		}
	}
    
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("searchTerm=" + searchTerm);

}
},500);
setInterval(()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("GET","attendenceviewdata.php", true);
	xhr.onload = ()=>{
		if(xhr.readyState === XMLHttpRequest.DONE){
			if (xhr.status === 200){
				let data = xhr.response;
				if (!subject_icon.classList.contains("act")) {
				subject_icon.innerHTML = data;
				}
				
			}
		    
		}
	}
	xhr.send();

},500);