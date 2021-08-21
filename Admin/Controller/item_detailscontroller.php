<?php
require "../Model/item_detailsmodel.php";
require "../Utilities/Sanitization.php";
require "../Utilities/Helper.php";
include "../DB Operations/item_detailsOps.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['itemid'])){
    $details=new Item_Details();
   
    $details->set_itemname(Sanitization::test_input($_POST["itemname"]));
    
    $details->set_itemcatid(Sanitization::test_input($_POST["itemCategory"]));
    $details->set_itemsubcatid(Sanitization::test_input($_POST["subCategory"]));
    $details->set_itemcreatedby(Sanitization::test_input($_POST["itemcreatedby"]));
    $details->set_itemmodifiedby(Sanitization::test_input($_POST["itemmodifiedby"]));
    $details->set_itemid(Sanitization::test_input($_POST["itemid"]));
    DBitemdetails::update($details);
  } else if ($_POST["action"] == 'delete') {
    DBitemdetails::delete($_POST['id']);
  } else {
    $details = new Item_Details();

    $details->set_itemname(Sanitization::test_input($_POST["itemname"]));
   
    $details->set_itemcatid(Sanitization::test_input($_POST["itemCategory"]));
    $details->set_itemsubcatid(Sanitization::test_input($_POST["subCategory"]));
    
   

    $details->set_itemcreatedby(Sanitization::test_input($_POST["itemcreatedby"]));
    $details->set_itemmodifiedby(Sanitization::test_input($_POST["itemmodifiedby"]));
    DBitemdetails::insert($details);
  }
  // header("location: ../View/inventory.php");
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $catId=Sanitization::test_input($_GET['catId']);
  $subcatId=Sanitization::test_input($_GET['subcatId']);
  error_log( $catId.$subcatId);
  DBitemdetails::selectitem($catId,$subcatId);
  error_log("");
}
