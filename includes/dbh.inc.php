<?php

//kintamieji su prisijungimu prie localhost
$servername = "localhost";
$dBUsername = "u787068011_dievastevas";
$dBPassword = "Summer21";
$dBName = "u787068011_proact";

//kintamasis reiškiantis prijungimą
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

//tikrinam ar prisijungimas veikia, jei neveikia išmeta tikslią žinutę kodėl.
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
