<?php
require_once "../Model/brandmodel.php";
require_once "../Utilities/Sanitization.php";
require_once "../DB Operations/brandOps.php";
require_once "../DB Operations/supplier_brand_mappingOps.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['brandid'])) {
        $brand = new Brand();
        error_log($_POST['brandid']);
        $brand->set_brandname(Sanitization::test_input($_POST["brandname"]));
        $brand->set_brandid(Sanitization::test_input($_POST['brandid']));
        $brand->set_brandcreatedby(Sanitization::test_input($_POST["brandcreatedby"]));
        $brand->set_brandmodifiedby(Sanitization::test_input($_POST["brandmodifiedby"]));
        DBbrand::update($brand);
    } else if ($_POST["action"] == 'delete') {
        DBbrand::delete($_POST["id"]);
    } else {
        $brand = new Brand();
        $brand->set_brandname(Sanitization::test_input($_POST["brandname"]));
        $brand->set_brandcreatedby(Sanitization::test_input($_POST["brandcreatedby"]));
        $brand->set_brandmodifiedby(Sanitization::test_input($_POST["brandmodifiedby"]));
        DBbrand::insert($brand);
    }
    header("location: ../View/brand.php");
}
if($_SERVER["REQUEST_METHOD"]=="GET"){
if(isset($_GET['id'])){
    DBsupplierBrandMapping::getMappedBrands($_GET['id']);
}else{
    DBbrand::selectbrands();
}
}
?>
