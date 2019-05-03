
<html>
	<head>
    <link href="project.css" type="text/css" rel="stylesheet" />
    <script src="project.js" type="text/javascript"></script>
		<script type="text/javascript" src="movies.json"></script>
	</head>

	<body>
<br>
		<h1> Movie Ranking </h1>
		<p>Two movies will appear in front of you, click on the one you like the best!</p>
<br>
		<div>


				<?php

				// get contents of a file into a string
				$final = file("titles.txt", FILE_IGNORE_NEW_LINES);

				$r1= $rand = mt_rand(0, 29);
				$r2= $rand = mt_rand(0, 29);

				// To make sure we don't have the same poster twice
				while($r1==$r2){
					$r2= $rand = mt_rand(0, 29);
				}

				$movies[sizeof($final)];
				$dir = "posters/";

				// Fills the JSON with the title, points and picture link
				for($i = 0; $i<sizeof($final); $i++) {
					$movies[$i]["Title"] = $final[$i];
					$movies[$i]["Points"] = 0;
					$movies[$i]["Poster"] = $dir.str_replace(' ', '', $final[$i]).".jpg";
				}

				$JSON = json_encode($movies, JSON_PRETTY_PRINT);
				// $JSON;
				$myfile = fopen("movies.json", "w") or die("nope");
				fwrite($myfile, $JSON);

				/* Here's an example of the output

				[ {
    				"Title": "Roma",
    				"Points": 0,
    				"Poster": "Roma.jpg"
  				},
  				{
    				"Title": "Moonlight",
    				"Points": 0,
    				"Poster": "Moonlight.jpg"
  				},
  				{
    				"Title": "Gravity",
    				"Points": 0,
    				"Poster": "Gravity.jpg"
  				},
  				{
    				"Title": "La LaLand",
    				"Points": 0,
    				"Poster": "LaLaLand.jpg"
  				},
  				{
    				"Title": "The Shape of Water",
    				"Points": 0,
    				"Poster": "TheShapeofWater.jpg"
  				},
  				{
    				"Title": "Birdman",
    				"Points": 0,
    				"Poster": "Birdman.jpg"
  				}
				]                                 */

				?>
		</div>

		<div id="main">

				<div class ="Poster">
					<?php/*
					echo "<img src=";
					echo $movies[$r1]["Poster"];
					echo " height=500px width=330px";
					echo ">";
					echo "<p>";
					echo $movies[$r1]["Title"];
					echo "</p>";*/
					?>

				</div>


				<div class="Poster">

					<?php/*
					echo "<img src=";
					echo $movies[$r2]["Poster"];
					echo " height=500px width=330px";
					echo ">";
					echo "<p>";
					echo $movies[$r2]["Title"];
					echo "</p>";*/
					?>
				</div>

		</div>

		<div class="competiton">


		</div>

		<br><br>

		<h2> Charts </h2>
		<p>Here's a ranking of the movies you just voted for</p>
		<br>

		<div id="ranking">

			<ul id= "rank" class="sortable">
			</ul>

		</div>

	</body>
</html>
