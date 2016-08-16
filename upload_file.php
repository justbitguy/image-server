<?php
if ((($_FILES["myfile"]["type"] == "image/gif")
|| ($_FILES["myfile"]["type"] == "image/jpeg")
|| ($_FILES["myfile"]["type"] == "image/pjpeg"))
&& ($_FILES["myfile"]["size"] < 20000))
  {
  if ($_FILES["myfile"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["myfile"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["myfile"]["name"] . "<br />";
    echo "Type: " . $_FILES["myfile"]["type"] . "<br />";
    echo "Size: " . ($_FILES["myfile"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["myfile"]["tmp_name"] . "<br />";

    if (file_exists("./upload/" . $_FILES["myfile"]["name"]))
      {
      echo $_FILES["myfile"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["myfile"]["tmp_name"],
      "./upload/" . $_FILES["myfile"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["myfile"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>