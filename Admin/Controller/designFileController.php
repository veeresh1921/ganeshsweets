<?php
require "../Model/designfilesModel.php";
require "../Utilities/Sanitization.php";
include "../DB Operations/designFileOps.php";
require_once "../Utilities/Helper.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["action"] == 'delete') {
      DBdesignFile::delete($_POST["id"]);
  } else {
    $designFile = new designFile();
    $designFile->setCustomerId(Sanitization::test_input($_POST["customerId"]));
    $designFile->setDesignFileDescription(Sanitization::test_input($_POST["designFileDescription"]));
    $designFile->setCreatedby(Sanitization::test_input($_POST["createdby"]));
    $designFile->setModifiedby(Sanitization::test_input($_POST["modifiedby"]));
    if (isset($_FILES["designFilePath"])) {

      $filetoupload = $_FILES["designFilePath"];
      Helper::fileupload($filetoupload,"../img/Designs/");
      $designFile->setDesignFilePath($_FILES["designFilePath"]['name']);
    }
    DBdesignFile::insert($designFile);
  }
  header("location:../View/design.php?id=".$_POST["customerId"]);
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['id'])){
      DBdesignFile::readAll($_GET['id']);
    }
}
