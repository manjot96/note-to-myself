<?php
if(!isset($_SESSION["email"]))
    return "Are you lost? Click <a href='/home'>here</a> to login.";
if(isset($_SESSION['time']) && (time() - $_SESSION['time']) > 1200) {
    return Redirect::to('/logout');
}
$_SESSION['time'] = time();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Notes!</title>
    {{HTML::style('css/home.css')}}
    <script>    
        function openInNew(textbox){
            window.open(textbox.value);
            this.blur();
        }
    </script>
</head>
<body>
    <div id="wrapper">
    <form action="update" method="post" enctype="multipart/form-data">
        <h2 id="header">{{$_SESSION["email"]}} - <span><a href="/logout">Log out</a></span></h2>
        <div id="section1">

            <div id="column1">
                <h2>Notes</h2>
                 {{ Form::textarea('notes', $_SESSION['notes'], ['id'=>'notes', 'cols'=>'16', 'rows'=>'40']) }}
            </div>
            <div id="column2">
                <h2>websites</h2>
                @foreach ($_SESSION["urls"] as $url)
                    <input type="text" name="websites[]" value={{$url}} onclick="openInNew(this)" /><br >
                @endforeach
                @for ($i = 0; $i < 4; $i++)
                    <input type="text" name="websites[]" /><br >
                @endfor
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
                    $i = 0;
                    foreach($_SESSION["images"] as $img) {
                        $image = 'data:image/jpeg;base64,'.base64_encode($img);
                        $width = $height = $size = 125;
                        $a = getimagesize($image);
                        if($a[0] > $a[1]) {
                            $height = round($size * $a[1] / $a[0]);
                        } else {
                            $width = round($size * $a[0]/$a[1]);
                        }
                        echo '<div>
                        <a href="'.$image.'">
                        <img src="'.$image.'" style="width:'.$width.'px;height:'.$height.'px;" />
                        </a>
                        <input type=\'checkbox\' name="'.$i.'" value=\'165\' /> 
                        <label for="'.$i.'">delete</label><br /><br />
                        </div>';
                        ++$i;
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