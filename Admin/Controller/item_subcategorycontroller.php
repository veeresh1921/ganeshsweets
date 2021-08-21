<?php

require "../Model/item_subcategorymodel.php";
require "../Utilities/Sanitization.php";
include "../DB Operations/item_subcategoryOps.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['itemsubcatid'])) {
          $subcat=new Item_Subcategory();
          $subcat->set_itemsubcatname(Sanitization::test_input($_POST["itemsubcatname"]));
          $subcat->set_itemsubcatdescription(Sanitization::test_input($_POST["itemsubcatdescription"]));
          $subcat->set_itemsubcatcreatedby(Sanitization::test_input($_POST["itemsubcatcreatedby"]));
          $subcat->set_itemsubcatmodifiedby(Sanitization::test_input($_POST["itemsubcatmodifiedby"]));
          $subcat->set_itemcatid(Sanitization::test_input($_POST["itemcatid"]));
          $subcat->set_itemsubcatid(Sanitization::test_input($_POST["itemsubcatid"]));
          DBitemsubcategory::update($subcat);
      } elseif ($_POST["action"] == 'delete') {
          DBitemsubcategory::delete($_POST['id']);
      } else {
        $subcat=new Item_Subcategory();
        $subcat->set_itemsubcatname(Sanitization::test_input($_POST["itemsubcatname"]));
        $subcat->set_itemsubcatdescription(Sanitization::test_input($_POST["itemsubcatdescription"]));
        $subcat->set_itemsubcatcreatedby(Sanitization::test_input($_POST["itemsubcatcreatedby"]));
        $subcat->set_itemsubcatmodifiedby(Sanitization::test_input($_POST["itemsubcatmodifiedby"]));
        $subcat->set_itemcatid(Sanitization::test_input($_POST["itemcatid"]));
          DBitemsubcategory::insert($subcat);
      }
  
    header("location:../View/itemsubcategory.php");
  }if($_SERVER["REQUEST_METHOD"]=="GET"){
    DBitemsubcategory::selectsubcategory(Sanitization::test_input($_GET['catId']));
  }

?>



