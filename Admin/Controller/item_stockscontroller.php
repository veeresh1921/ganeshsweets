<?php
require "../Model/item_stocksmodel.php";
require "../Utilities/Sanitization.php";
include "../DB Operations/item_stocksOps.php";
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['itemstockid'])){
    $stock=new Item_Stock();
    $stock->set_itemstockbatchno(Sanitization::test_input($_POST["itemstockbatchno"]));
    $stock->set_itemstockquantity(Sanitization::test_input($_POST["itemstockquantity"]));
    $stock->set_itemid(Sanitization::test_input($_POST["itemid"]));
    error_log($_POST['itemid']);
    $stock->set_itemstockcomments(Sanitization::test_input($_POST["itemstockcomments"]));
    $stock->set_itemstockdescription(Sanitization::test_input($_POST["itemstockdescription"]));
    $stock->set_itemstockcreatedby(Sanitization::test_input($_POST["itemstockcreatedby"]));
    $stock->set_itemstockmodifiedby(Sanitization::test_input($_POST["itemstockmodifiedby"]));
      $stock->set_itemstockid(Sanitization::test_input($_POST["itemstockid"]));
      DBitemstock::update($stock);
    }else if ($_POST["action"] == 'delete') {
      DBitemstock::delete($_POST["id"]); 
    }
    else{
      $stock=new Item_Stock();
    $stock->set_itemstockbatchno(Sanitization::test_input($_POST["itemstockbatchno"]));
    $stock->set_itemstockquantity(Sanitization::test_input($_POST["itemstockquantity"]));
    $stock->set_itemid(Sanitization::test_input($_POST["itemid"]));
    error_log($_POST['itemid']);
    $stock->set_itemstockcomments(Sanitization::test_input($_POST["itemstockcomments"]));
    $stock->set_itemstockdescription(Sanitization::test_input($_POST["itemstockdescription"]));
    $stock->set_itemstockcreatedby(Sanitization::test_input($_POST["itemstockcreatedby"]));
    $stock->set_itemstockmodifiedby(Sanitization::test_input($_POST["itemstockmodifiedby"]));
      DBitemstock::insert($stock); 
      header("location: ../View/itemstocks.php");
    }
     
  }
?>



