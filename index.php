<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP File Upload</title>
</head>
<body>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      $fn = "file.txt";
      $file = fopen($fn, "a+");
      $size = filesize($fn);
      $link = 'https://holdmyfiles.herokuapp.com' . substr($_SESSION['message'], 1) . PHP_EOL;

      fwrite($file, $link);

      $text = fread($file, $size);
      fclose($file);
      unset($_SESSION['message']);
    }
  ?>
  <a href="https://holdmyfiles.herokuapp.com/file.txt">Saves!</a>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <div>
      <span>Upload a File:</span>
      <input type="file" name="uploadedFile" />
    </div>

    <input type="submit" name="uploadBtn" value="Upload" />
  </form>
</body>
</html>
