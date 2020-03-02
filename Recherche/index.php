<!DOCTYPE html>
<html>
	<body>
		<h1>Affichage des publications</h1>

<script>
function loadDoc(authorname) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      printPublist(this,authorname);
    }
  };
  xhttp.open("GET", "test.xml?rand="+Math.random(), true);// le random n'est là que pour empecher la mise en cache du xml
  xhttp.send();
}

function printPublist(xml,authorname) {
  var i;
  var xmlDoc = xml.responseXML;
  var table="<ul>";
  var x = xmlDoc.getElementsByTagName("article");

    
  for (i = 0; i <x.length; i++) { 
    if(authorname == "" || x[i].getElementsByTagName("author")[0].childNodes[0].nodeValue == authorname){
    table += "<li>" +
    x[i].getElementsByTagName("author")[0].childNodes[0].nodeValue +
    ", " +
    x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue +
    ", " +
    x[i].getElementsByTagName("journal")[0].childNodes[0].nodeValue +
    "</li>";
    }
  }
  table += "</ul>";
  document.getElementById("publist").innerHTML = table;
}
</script>


<script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("nameHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {// 4 = request finished and response is ready, 200 = "OK"
      document.getElementById("nameHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?q="+str, true);
  xhttp.send();   
}
</script>
		<p>Afficher :</p>
		<form method="post">

			<input type="radio" id="bouton_toutes" name="choix_aff"
					onclick="document.getElementById('demo').style.display='none';
								document.getElementById('sug').style.display='none'">
			<label for="bouton_toutes">toutes les publications</label></br>

			<input type="radio" id="bouton_auteur" name="choix_aff"
					onclick="document.getElementById('demo').style.display='block';
								document.getElementById('sug').style.display='block'">
			<label for="bouton_auteur">les publications d'un auteur
				<input type="text" id="demo" onkeyup="showHint(this.value)" style="display:none" name="auteurs">			
			</label>
			<p id="sug" style="display:none">Suggestions: <span id="nameHint"></span></p>
			<div><button type="button"
						onclick="if (document.getElementById('bouton_auteur').value) loadDoc(document.getElementById('demo').value);
									else loadDoc();
									" >Afficher les publications</button></div>

		</form>

		<p id="publist">
		</p>

	</body>
</html>