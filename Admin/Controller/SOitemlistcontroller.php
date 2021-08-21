<?php
require_once "../DB Operations/SOlineitemOps.php";
if($_SERVER["REQUEST_METHOD"]=="GET"){
    error_log($_GET['id']);
    DBSOLineItem::getSOLineItemBySalesId($_GET['id']);
  }

?>