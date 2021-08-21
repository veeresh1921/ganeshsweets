<?php

require "../Model/item_categorymodel.php";
require "../Utilities/Sanitization.php";
include "../DB Operations/item_categoryOps.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['itemcatid'])){
    $category=new Item_Category();
   
    $category->set_itemcatname(Sanitization::test_input($_POST["itemcatname"]));
    $category->set_itemcatdescription(Sanitization::test_input($_POST["itemcatdescription"]));
    $category->set_itemcatcreatedby(Sanitization::test_input($_POST["itemcatcreatedby"]));
    $category->set_itemcatmodifiedby(Sanitization::test_input($_POST["itemcatmodifiedby"]));
    $category->set_itemcatid(Sanitization::test_input($_POST["itemcatid"]));
    DBitemcategory::update($category);
    }else if($_POST["action"]=='delete'){
      DBitemcategory::delete($_POST["id"]); 
    }else{
      $category=new Item_Category();
   
    $category->set_itemcatname(Sanitization::test_input($_POST["itemcatname"]));
    $category->set_itemcatdescription(Sanitization::test_input($_POST["itemcatdescription"]));
    $category->set_itemcatcreatedby(Sanitization::test_input($_POST["itemcatcreatedby"]));
    $category->set_itemcatmodifiedby(Sanitization::test_input($_POST["itemcatmodifiedby"]));
      DBitemcategory::insert($category); 
    }
    // header("location:../Admin/View/itemcategory.php");
  }
  if($_SERVER["REQUEST_METHOD"]=="GET"){
    DBitemcategory::selectcategory();
  }
?>



