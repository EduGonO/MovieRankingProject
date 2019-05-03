<?php

// get contents of a file into a string
$final = file("titles.txt", FILE_IGNORE_NEW_LINES);

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

$c = 0; // count identifier
$ordered = array(); // create new array

for ($i=0;$i<count($array);$i++){ // loop through each array
    foreach ($array[$i] as $value){ // loop through into sub arrays
        if (is_array($value)){
            $ordered[$i]['details'] = array(
                "name" => $value['name'],
                "rank" => $c
            );
            $c++;
        } else {
            $n[$i]['points'] = $value;
        }
    }
}

?>
