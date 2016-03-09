<?php
//session_start();
//TODO: update database, make notes and 'tbh' _id unique; Figure out how we will be updating the websites; maybe for loop? use i as index?idk kevin got this
//add $hell into the sessions when user is logged in;
if(!isset($_SESSION["email"]))
    return View::make('login');
foreach($_SESSION["images"] as $img)
    $image = $img;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Notes!</title>
    {{HTML::style('css/home.css')}}
</head>
<body>
    <div id="wrapper">
    <form action="update" method="post" enctype="multipart/form-data">
        <h2 id="header">{{$_SESSION["email"]}} - <span><a href="/logout">Log out</a></span></h2>
        <div id="section1">

            <div id="column1">
                <h2>Notes</h2>
                <textarea cols="16" rows="40" id="notes" name="notes">{{$_SESSION["notes"]}}</textarea>
            </div>
            <div id="column2">
                <h2>websites</h2>
                <?php
                foreach($_SESSION["urls"] as $url)
                     echo "<input type=\"text\" name=\"websites[]\" value=".$url." /><br >"
                ?>
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
                <input type="text" name="websites[]" /><br >
            </div>
        </div> <!-- End of section1 -->
        <div id="section2">
            <div id="column3">
                <h2>Images</h2><h3>Click for full screen</h3>
                {{Form::file('image')}}
                <br>
                <br>
                <div>
                    <?php 
                    foreach($_SESSION["images"] as $img) {
                        echo '<div>
                        <a href="data:image/jpeg;base64,'.base64_encode($img).'">
                        <img src="data:image/jpeg;base64,'.base64_encode($img).'"/>
                        </a>
                        <input type=\'checkbox\' name=\'delete[]\' value=\'165\' /> 
                        <label for=\'delete[]\'>delete</label><br /><br />
                        </div>';
                    } 
                    ?>
                </div>
            </div>
            <div id="column4">
                <h2>TBD</h2>
                <textarea cols="16" rows="40" id="tbd" name="tbd">{{$_SESSION["tbd"]}}</textarea>
            </div>
        </div>
        
        <div id="footer">
            <input type="submit" value="Save" style="width:200px;height:80px" name="submitting" />
        </div>
    </form>
    </div>
</body>
</html>