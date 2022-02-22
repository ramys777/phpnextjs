<?php

// Here, the TRUE parameter is very important to treat it as an associative array
$films = json_decode(file_get_contents("city.list.json"), true);

// get the q parameter from URL if it is set
$q = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
$hint = "";
// lookup all hints from array
$q = strtolower($q);
$len = strlen($q);
// For each film
echo "<ul>";
foreach($films as $film) {//                                     <------
    // Get the name
    $name = $film['name'];// 
        $id = $film['id'];//      <------
    // If the query is empty or if the query is found
    if ($q === "" || stristr($q, substr($name, 0, $len))) {//    <------
        if ($hint === "") {
            $hint = $name;
        } else {
?>
<li onClick="selectCountry('<?php echo $id; ?>');"><?php echo $name; ?></li>
<?php         }
    }
}
echo "</ul>";
// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;


?>