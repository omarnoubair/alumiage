function GetResourceInfoev(id){
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)){
			Listerev(xhr.responseText);
		}
	};
	xhr.open("GET","/Platform/php/UserAdd.php?id="+id, true);
	xhr.send( null );
}

function Listerev(resultat){
	document.getElementById("matiere").innerHTML = resultat;
	//document.getElementById("formEvaluateurev").style.display = 'inline-block';
}