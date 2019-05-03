(function() {
	"use strict";
    window.onload = function() {
			display(0, getRandom(0, 29));
			display(1, getRandom(0, 29));
        //document.getElementById("blend").onclick = blend;
    }

function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function loadJSON(callback) {

    var xobj = new XMLHttpRequest();
        xobj.overrideMimeType("application/json");
    xobj.open('GET', 'movies.json', true);
    xobj.onreadystatechange = function () {
          if (xobj.readyState == 4 && xobj.status == "200") {
            callback(xobj.responseText);
          }
    };
    xobj.send(null);
 }


function display(i, random) {

	loadJSON(function(response) {
		// Parse JSON string into object
		var movies = JSON.parse(response);
		//console.log(movies);

			var area = document.getElementById("main");
			var total = area.getElementsByTagName('div');

			total[i].style.backgroundImage = "url('" + movies[random].Poster + "')";

			total[i].style.backgroundSize = "330px 500px";


			total[i].onmouseover = function() {
		  	this.classList.add("hover");
		  };

		  total[i].onmouseout = function() {
		      this.classList.remove("hover");
		  };

			total[i].onclick = function() {
				var div = total[i].getElementsByTagName('p');
				// Change the movie oposite to the one that was clicked
				// And modify JSON
				if(i==1) {
/*
					var count = 30;
					var u = 0;
					var orderedList = [30];

					movies[random].Points = movies[random].Points+1;
					clearList();

					while(movies[u].Points!=count) {
						u++;
					}

					if()

					for(var o =29; o>=0; o--) {

						if(true) {
							var box = document.getElementById("ranking");
							var letter = document.createElement("ul");
							var res = document.createTextNode(30-o + ". hello " + o);
							letter.appendChild(res);
							box.appendChild(letter);
							letter.setAttribute("Class", "list");
						}
					}*/

					//console.log("Title: " + movies[random].Title + " - Points: " + movies[random].Points);
					movies[random].Points = movies[random].Points+1;
					console.log("Title: " + movies[random].Title + " - Points: " + movies[random].Points);
					if(movies[random].Points==30){
						alert("Ranking Complete! Your favorite movie seems to be " + movies[random].Title + "!");
					}


					changePoster(movies[random].Title, 0, random);
				} else {
					//console.log("Title: " + movies[random].Title + " - Points: " + movies[random].Points);
					movies[random].Points = movies[random].Points+1;
					console.log("Title: " + movies[random].Title + " - Points: " + movies[random].Points);

					changePoster(movies[random].Title, 1, random);
				}
			}

	});

}

// This function clears the ranking in order to re-print it again but updated
function clearList(){
	while(document.getElementsByClassName('list')[0]) {
    document.getElementsByClassName('list')[0].remove();
  }
}

function changePoster(title, divNumber, r){
	//console.log(title);
	var random = getRandom(0, 29);
	if(random == r){
		var random = getRandom(0, 29);
	}
	display(divNumber, random);
}





})();
