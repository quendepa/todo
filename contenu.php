<html>
<head>
<link rel="stylesheet" href="todo.css">
</head>
<body>
<form action="./contenu.php" method="post">
    <input type="text" name="todo1">
    <button type="submit" id="run">Entre une tache pd</button>
    <div class="dropper">
</form>
<h1>à faire</h1>
   <?php
     $todo = file_get_contents('todo.json');
     $todo = json_decode($todo, true);
     for ($i=0; $i < count($todo); $i++):

    
        
    ?>
       

<div class="draggable">
<table>
        <td><?php echo $todo[$i]["todo"] ?> 
        <input type="checkbox" id="horns" name="horns">
        <label for="fait"></label>
        </td>
</table
></div>

</div>




</div>
        
        <?php
            endfor;
        ?>
        <script type="text/javascript" src="todo.js"></script>
</body>
</html>

<?php

$tache = valid_task($_POST["todo1"]);
####### Création d'une fonctions pour nettoyer les données avant de les stocker #########
function valid_task($tache){
$tache = trim($tache); // Nettoyer les espaces
$tache = stripslashes($tache); // Nettoyer les antislashes
$tache = strip_tags($tache); // Nettoyer les balises nocif
$tache = htmlspecialchars($tache); // Convertion des caractères spéciaux
return $tache;
};

if (isset($tache)){

if (!empty($tache) AND filter_var($tache, FILTER_SANITIZE_STRING)){
$todo2 = array();

$todo2["todo"] = $tache;

$json = file_get_contents('todo.json');

$json = json_decode($json, true);

$json[] = $todo2;

$json= json_encode($json);

file_put_contents('todo.json',$json);

header("location: contenu.php");
}
}








/*
$todo=$_POST["todo"];

$s_file =file_get_contents("todo.json");

$json =$s_file;


$s_file= $todo ;

$s_file= array(
    
    "todo"   => "$s_file",
);

$s_file = json_encode( [$s_file]);

file_put_contents('todo.json',$s_file);

}
}

/*
$todo=$_POST["todo"];
$s_file =file_get_contents("todo.json");
try {
    // On essayes de récupérer le contenu existant
    $s_fileData = file_get_contents($s_file);
     
    if( !$s_fileData || strlen($s_fileData) == 0 ) {
        // On crée le tableau JSON
        $tableau_pour_json = array();
    } else {
        // On récupère le JSON dans un tableau PHP
        $tableau_pour_json = json_decode($s_fileData, true);
    }
     
    // On ajoute le nouvel élement
    array_push( $tableau_pour_json, array(
        'todo' => $todo,
       
    ));
    // On réencode en JSON
    $contenu_json = json_encode($tableau_pour_json);
     
    // On stocke tout le JSON
    file_put_contents($s_file, $contenu_json);
     
    echo "Vos informations ont été enregistrées";
}
catch( Exception $e ) {
    echo "Erreur : ".$e->getMessage();
}
*/

?>