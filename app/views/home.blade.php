<?php
//session_start();
//TODO: update database, make notes and 'tbh' _id unique; Figure out how we will be updating the websites; maybe for loop? use i as index?idk kevin got this
//add $hell into the sessions when user is logged in;

if(!isset($_SESSION["email"]))
    return View::make('login');
    
$res = User::select('_ID')->where('emailaddress', $_SESSION["email"])->first();
$hell = $res["_ID"];
$res = DB::select('select note from Notes where _ID = "'.$hell.'"');
//print_r($res);
$res = Note::select('note')->where('_ID', $hell)->get()->toArray();
$notes  = $res[0]["note"];
$res = TBD::select('text')->where('_ID', $hell)->get()->toArray();
$tbd    = (!empty($res)) ? $res[0]["text"] : "";
$res = Website::select('urls')->where('_ID', $hell)->get()->toArray();
$urlArray = array();
foreach($res as $url) {
    array_push($urlArray, $url["urls"]);
}

echo "<br>" . $notes . "<br>" . "<br>" . $tbd . "<br>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Notes!</title>
</head>
<body>
    <form action="buffalo">
    <h2 id="header">{{$_SESSION["email"]}} - <span><a href="logout.php">Log out</a></span></h2>
    
    <textarea>{{$notes}}</textarea>
    
    <textarea>{{$tbd}}</textarea>
    <br>
    <?php
    foreach($res as $url) {
        echo "<input type=\"text\" name=\"websites[]\" value=". $url["urls"] ." /><br >";
    }
    ?>
    <input type="text" name="websites[]" /><br >
    <input type="text" name="websites[]" /><br >
    <input type="text" name="websites[]" /><br >
    <input type="text" name="websites[]" /><br >
    </form>
    
    
</body>
</html>