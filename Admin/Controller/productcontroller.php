<?php
require "../Model/productsmodel.php";
require "../Utilities/Sanitization.php";
require "../Utilities/Helper.php";
include "../DB Operations/productsOps.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['produtid'])){
    $details=new Product_Details();
   
    $details->set_productname(Sanitization::test_input($_POST["productname"]));
    $details->set_productdescription(Sanitization::test_input($_POST["productdescription"]));
    $details->set_productdimensions(Sanitization::test_input($_POST["productdimensions"]));
    $details->set_productdimensionsid(Sanitization::test_input($_POST["productdimensionsid"]));
    $details->set_productitemname(Sanitization::test_input($_POST["productitemname"]));
    $details->set_productitemid(Sanitization::test_input($_POST["productitemid"]));
    $details->set_itemcategoryname(Sanitization::test_input($_POST["itemcategoryname"]));
    $details->set_itemcatid(Sanitization::test_input($_POST["itemcatid"]));
    $details->set_itemsubcategoryname(Sanitization::test_input($_POST["itemsubcategoryname"]));
    $details->set_itemsubcatid(Sanitization::test_input($_POST["itemsubcatid"]));
    $details->set_productbrand(Sanitization::test_input($_POST["productbrand"]));
    $details->set_productbrandid(Sanitization::test_input($_POST["productbrandid"]));
    $details->set_productitemcode(Sanitization::test_input($_POST["productitemcode"]));
    $details->set_productcategoryname(Sanitization::test_input($_POST["productcategoryname"]));
    $details->set_productcategoryid(Sanitization::test_input($_POST["productcategoryid"]));
    $details->set_productsubcategoryname(Sanitization::test_input($_POST["productsubcategoryname"]));
    $details->set_productsubcategoryid(Sanitization::test_input($_POST["productsubcategoryid"]));
    $details->set_productquantity(Sanitization::test_input($_POST["productquantity"]));
    $details->set_productstore(Sanitization::test_input($_POST["productstore"]));
    $details->set_productunit(Sanitization::test_input($_POST["productunit"])); 
     $details->set_productunitid(Sanitization::test_input($_POST["productunitid"]));
    $details->set_productbarcode(Sanitization::test_input($_POST["productbarcode"]));
    $details->set_ID(Sanitization::test_input($_POST["ID"]));
    $details->set_productcreatedby(Sanitization::test_input($_POST["productcreatedby"]));
    $details->set_productmodifiedby(Sanitization::test_input($_POST["productmodifiedby"]));
    $details->set_productid(Sanitization::test_input($_POST["productid"]));
    DBproductdetails::update($details);
  } else if ($_POST["action"] == 'delete') {
    DBproductdetails::delete($_POST['id']);
  } else {
    $details=new Product_Details();
   
    $details->set_productname(Sanitization::test_input($_POST["productname"]));
    $details->set_productdescription(Sanitization::test_input($_POST["productdescription"]));
    $details->set_productdimensions(Sanitization::test_input($_POST["productdimensions"]));
    $details->set_productdimensionsid(Sanitization::test_input($_POST["productdimensions"]));
    $details->set_productitemname(Sanitization::test_input($_POST["productitemname"]));
    $details->set_productitemid(Sanitization::test_input($_POST["productitemname"]));
    $details->set_itemCategory(Sanitization::test_input($_POST["itemCategory"]));
    $details->set_itemcatid(Sanitization::test_input($_POST["itemCategory"]));
    $details->set_subCategory(Sanitization::test_input($_POST["subCategory"]));
    $details->set_itemsubcatid(Sanitization::test_input($_POST["subCategory"]));
    $details->set_productbrand(Sanitization::test_input($_POST["productbrand"]));
    $details->set_productbrandid(Sanitization::test_input($_POST["productbrand"]));
    $details->set_productitemcode(Sanitization::test_input($_POST["productitemcode"]));
    $details->set_productcategoryname(Sanitization::test_input($_POST["productcategoryname"]));
    $details->set_productcategoryid(Sanitization::test_input($_POST["productcategoryname"]));
    $details->set_productsubcategory(Sanitization::test_input($_POST["productsubcategory"]));
    $details->set_productsubcategoryid(Sanitization::test_input($_POST["productsubcategory"]));
    $details->set_productquantity(Sanitization::test_input($_POST["productquantity"]));
    $details->set_productstore(Sanitization::test_input($_POST["productstore"]));
    $details->set_productunit(Sanitization::test_input($_POST["productunit"])); 
     $details->set_productunitid(Sanitization::test_input($_POST["productunitid"]));
    // $details->set_productbarcode(Sanitization::test_input($_POST["productbarcode"]));
    // $details->set_ID(Sanitization::test_input($_POST["ID"]));
    $details->set_productcreatedby(Sanitization::test_input($_POST["productcreatedby"]));
    $details->set_productmodifiedby(Sanitization::test_input($_POST["productmodifiedby"]));
    
    DBproductdetails::insert($details);
  }
  header("location: ../View/inventory.php");
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  DBitemdetails::selectitem();
  error_log("");
}
