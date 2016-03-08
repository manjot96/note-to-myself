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

echo $_SESSION["_ID"] . "<br>";
echo $_SESSION["email"] . "<br>";
echo $_SESSION["notes"] . "<br>";
echo $_SESSION["tbd"] . "<br>";

echo "<br>" . $notes . "<br>" . "<br>" . $tbd . "<br>";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Notes!</title>
    {{HTML::style('css/home.css')}}
</head>
<body>
<<<<<<< HEAD
    <div id="wrapper">
    <form action="/logout" method="post">
        <h2 id="header">{{$_SESSION["email"]}} - <span><a href="/logout">Log out</a></span></h2>
        <div id="section1">

            <div id="column1">
                <h2>Notes</h2>
                <textarea cols="16" rows="40" id="notes" name="notes">{{$_SESSION["notes"]}}</textarea>
            </div>
            <div id="column2">
                <h2>websites</h2>
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
            </div>
        </div> <!-- End of section1 -->
        <div id="section2">
            <div id="column3">
                <h2>Images</h2><h3>Click for full screen</h3>
                <input type="file" name="image" /> <br/> <br/>
            </div>
            <div id="column4">
                <h2>TBD</h2>
                <textarea cols="16" rows="40" id="tbd" name="tbd">{{$_SESSION["tbd"]}}</textarea>
            </div>
        </div>
        
        <div id="footer">
            <input type="submit" value="Save" style="width:200px;height:80px" name="submitting" />
        </div>
=======
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
    <?php
    Notes::where('_ID', $hell)
            ->update(array('notes' => "hello world!"));?>
    </form>
    
    
>>>>>>> origin/master
</body>
</html>