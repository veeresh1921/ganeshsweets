<?php
require_once "../DB Operations/lineItemOps.php";
require_once "../Utilities/Sanitization.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if (isset($_POST['lineItemId'])) {
    $lineItem=new lineItem();
    $lineItem->set_lineItemId($_POST['lineItemId']);
    
    $lineItem->set_quoteId($_POST['quoteId']);
    $lineItem->set_itemcatid()(Sanitization::test_input($_POST['itemCategory']));
    $lineItem->set_itemsubcatid(Sanitization::test_input($_POST['itemsubCategory']));
    $lineItem->set_itemquantity(Sanitization::test_input($_POST['itemquantity']));
    $lineItem->set_ppMRP(Sanitization::test_input($_POST['itemppMRP']));
    $lineItem->set_totalAmount(Sanitization::test_input($_POST['totalAmount']));
    $lineItem->set_discount1(Sanitization::test_input($_POST['discount1']));
    $lineItem->set_discount2(Sanitization::test_input($_POST['discount2']));
    $lineItem->set_discountAmount1(Sanitization::test_input($_POST['discountAmount1']));
    $lineItem->set_discountAmount2(Sanitization::test_input($_POST['discountAmount2']));
    $lineItem->set_GSTAmt(Sanitization::test_input($_POST['GSTAmount']));
    $lineItem->set_GST(Sanitization::test_input($_POST['GST']));
    $lineItem->set_totalPrice(Sanitization::test_input($_POST['totalPrice']));
    $lineItem->set_modifiedby(Sanitization::test_input($_POST['modifiedby']));
    DBLineItem::update($lineItem);
  }else if (isset($_POST["action"]) && $_POST["action"] == 'delete'){
    DBLineItem::delete($_POST["id"]);
  }else{
    $lineItem=new lineItem();
    $lineItem->set_itemid($_POST['itemid']);
    $lineItem->set_quoteId($_POST['quoteId']);
    $lineItem->set_itemcatid(Sanitization::test_input($_POST['itemCategory']));
    $lineItem->set_itemsubcatid(Sanitization::test_input($_POST['itemsubCategory']));
    $lineItem->set_itemquantity(Sanitization::test_input($_POST['itemquantity']));
    $lineItem->set_ppMRP(Sanitization::test_input($_POST['itemppMRP']));
    $lineItem->set_totalAmount(Sanitization::test_input($_POST['totalAmount']));
    $lineItem->set_discount1(Sanitization::test_input($_POST['discount1']));
    $lineItem->set_discount2(Sanitization::test_input($_POST['discount2']));
    $lineItem->set_discountAmount1(Sanitization::test_input($_POST['discountAmount1']));
    $lineItem->set_discountAmount2(Sanitization::test_input($_POST['discountAmount2']));
    $lineItem->set_GSTAmt(Sanitization::test_input($_POST['GSTAmount']));
    $lineItem->set_GST(Sanitization::test_input($_POST['GST']));
    $lineItem->set_totalPrice(Sanitization::test_input($_POST['totalPrice']));
    $lineItem->set_createdby(Sanitization::test_input($_POST['createdby']));
    $lineItem->set_modifiedby(Sanitization::test_input($_POST['modifiedby']));
    DBLineItem::insert($lineItem);
    // header("location: ../View/lineItemView.php?id=".$_POST["quoteId"]);
  }

}else if($_SERVER["REQUEST_METHOD"]=="GET"){
  DBLineItem::getLineItemByQuoteId($_GET['id']);
  // header("location: ../View/lineItemView.php?id=".$_POST["quoteId"]);
}

?>