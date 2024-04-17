<?php
  $conn = mysqli_connect("localhost","root","","crud");
  if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
?>