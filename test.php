<?php


if(isset($_POST["submit"])) {
  
    //create imagick object
    $image = new Imagick($_FILES['fileToUpload']['tmp_name']);

    //get datas of 3 colors
    $blue = $image->getImageChannelMean(Imagick::COLOR_BLUE);
    $red = $image->getImageChannelMean(Imagick::COLOR_RED);
    $green = $image->getImageChannelMean(Imagick::COLOR_GREEN);

    //calculate mean cumulative value
    $meancum = $blue['mean'] / 255;
    $meancum += $red['mean'] / 255;
    $meancum += $green['mean'] / 255;
    $meancum = round($meancum / 3, 0);

    //calculate standard deviation cumulative value
    $stdcum = $blue['standardDeviation'] / 255;
    $stdcum += $red['standardDeviation'] / 255;
    $stdcum += $green['standardDeviation'] / 255;
    $stdcum = round($stdcum / 3, 0);
    
    //display
    echo '<b>Mean Cum :</b> ' .$meancum.'<br>';
    echo '<b>StdDev Cum :</b> '.$stdcum.'<br><br>';
}


?>
<!DOCTYPE html>
<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
