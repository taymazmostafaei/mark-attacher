<?php

if (isset($_FILES['picture'])  and isset($_POST['string'])) {

    setcookie('string',$_POST['string'],time()+60*6065,'/') ;

    if ($_FILES['picture']['type'] == "image/png") {
        header("content-type:image/png");

         $path = $_FILES['picture']['tmp_name'] ;
         $filename = $_FILES['picture']['name'] ;
         $target = "img" ;
         move_uploaded_file($path,"$target/$filename") ;

        $image = imagecreatefrompng("$target/$filename");
        $color2 = imagecolorallocate($image, 195, 195, 195);
        $string = $_POST['string'];

        imagestring($image, 5, 4, 4, $string, $color2);
        imagepng($image);

    } elseif ($_FILES['picture']['type'] == "image/jpeg") {
        header("content-type:image/jpeg");

        $path = $_FILES['picture']['tmp_name'] ;
        $filename = $_FILES['picture']['name'] ;
        $target = 'img' ;
        move_uploaded_file($path,"$target/$filename") ;

        $image = imagecreatefromjpeg("$target/$filename");
        $color2 = imagecolorallocate($image, 195, 195, 195);
        $string = $_POST['string'];

        imagestring($image, 5, 4, 4, $string, $color2);
        imagejpeg($image);
    } else {
        echo '<div class="alert alert-danger" role="alert">your file type is not ok to mark writings</div>';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>marker</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-lg-12 col-xs-12">
        <div class="container">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">choose png or jpeg file</label>
                <input type="file" class="form-control" name="picture" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">enter your organ name</label>
                <input type="text" value="<?php echo @$_COOKIE['string'] ?>" class="form-control" name="string" id="exampleInputPassword1" required maxlength="20">
            </div>
            <button type="submit" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
                </svg> Stick</button>
        </form>
        </div>
    </div>
    </div>
</div>

</body>
</html>