<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/quotationModel.php";
require_once "../Model/quoteLineItemModel.php";
require_once "../Model/orderListModel.php";

class DBLineItem
    {
      public static function insert($lineItemObj)
      {
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql = "INSERT INTO `quotelineitem`(
            `quoteId`, 
            `itemId`, 
            `item_catname`,
            `item_catid`,
            `item_subcatname`,
            `item_subcatid`,
            `quantity`, 
            `amount`, 
            `totalAmount`, 
            `discount1`, 
            `discount1Amt`, 
            `discount2`, 
            `discount2Amt`, 
            `GSTAmount`, 
            `GST`, 
            `totalPrice`,  
            `createdby`,  
            `modifiedby`) 
                values ('".$lineItemObj->get_quoteId().
                "','".$lineItemObj->get_itemid().
                "','".$lineItemObj->get_itemcatname().
                "','".$lineItemObj->get_itemcatid().
                "','".$lineItemObj->get_itemsubcatname().
                "','".$lineItemObj->get_itemsubcatid().
                "','".$lineItemObj->get_itemquantity().
                "','".$lineItemObj->get_totalAmount().
                "','".$lineItemObj->get_totalAmount().
                "','".$lineItemObj->get_discount1().
                "','".$lineItemObj->get_discountAmount1().
                "','".$lineItemObj->get_discount2().
                "','".$lineItemObj->get_discountAmount2().
                "','".$lineItemObj->get_GSTAmt().
                "','".$lineItemObj->get_GST().
                "','".$lineItemObj->get_totalPrice().
                "','".$lineItemObj->get_createdby().
                "','".$lineItemObj->get_modifiedby().
                "')";
              
        if ($connectionObj->query($sql) === TRUE) {
          
        } else {
          echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }
      }
      public static function getLineItemByQuoteId($quoteId){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql = "SELECT 
        QLI.lineItemId AS lineItemId,
        QLI.itemId AS Id,
        I.item_image AS Image,
        I.item_name AS Name,
        B.brand_name AS Brand, 
        I.item_description AS Description,
        QLI.quantity AS Quantity,
        U.unitName AS Units,
        QLI.discount1 AS Discount1,
        QLI.discount2 AS Discount2,
        QLI.totalAmount AS TotalAmount,
        QLI.totalPrice AS TotalPrice,
        QLI.GST AS GST
        FROM `quotelineitem` AS QLI 
        JOIN `item_details` AS I ON QLI.itemid=I.item_id 
        JOIN `brands` AS B ON I.item_compid=B.brand_id 
        JOIN units AS U ON U.unitId=I.item_unit
        WHERE QLI.quoteId=".$quoteId;
        $result = $connectionObj->query($sql);
        $count = mysqli_num_rows($result);

        $itemList=[];
        if($count>0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $item=new lineItem();
            $item->set_lineItemId($row["lineItemId"]);
            $item->set_itemid($row["Id"]);
            $item->setImage($row["Image"]);
            $item->setName($row["Name"]);
            $item->setBrand($row["Brand"]);
            $item->setDescription($row["Description"]);
            $item->set_itemquantity($row["Quantity"]);
            $item->setUnits($row["Units"]);
            $item->set_discount1($row['Discount1']);
            $item->set_discount2($row['Discount2']);
            $item->set_totalAmount($row['TotalAmount']);
            $item->set_totalPrice($row['TotalPrice']);
            $item->set_GST($row['GST']);
            array_push($itemList,$item);
          }
        }
        header('Content-Type: application/json');
         echo json_encode($itemList);
      }
    
      public static function getLineItemByQuoteIdForOrder($quoteId){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql = "SELECT 
        QLI.lineItemId AS lineItemId,
        QLI.itemId AS Id,
        I.item_image AS Image,
        I.item_name AS Name,
        I.item_catid As Itemcatid,
        I.item_subcatid As Itemsubcatid,
        C.item_catName AS CategoryName,
       
        SC.item_subcatName AS SubCategoryName,
        B.brand_name AS Brand, 
        I.item_description AS Description,
        QLI.quantity AS Quantity,
        U.unitName AS Units,
        QLI.discount1 AS Discount1,
        QLI.discount2 AS Discount2,
        QLI.totalAmount AS TotalAmount,
        QLI.totalPrice AS TotalPrice,
        QLI.GST AS GST,
        UF.unitFactor AS unitFactor,
        I.item_pp_MRP AS MRP
        FROM `quotelineitem` AS QLI 
        JOIN `item_details` AS I ON QLI.itemid=I.item_id 
        JOIN item_category C ON I.item_catid=C.item_catid 
      JOIN item_subcategory SC ON I.item_subcatid=SC.item_subcatid 
        JOIN `brands` AS B ON I.item_compid=B.brand_id 
        JOIN units AS U ON U.unitId=I.item_unit
        JOIN unitsfactor UF ON UF.unitFactorId=I.item_unitFactor
        WHERE QLI.quoteId=".$quoteId;
        $result = $connectionObj->query($sql);
        $count = mysqli_num_rows($result);

        $itemList=[];
        if($count>0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $item=new lineItem();
            $item->set_lineItemId($row["lineItemId"]);
            $item->set_itemid($row["Id"]);
            $item->set_itemcatname($row["CategoryName"]);
            $item->set_itemcatid($row["Itemcatid"]);
            $item->set_itemsubcatname($row["SubCategoryName"]);
            $item->set_itemsubcatid($row["Itemsubcatid"]);
            $item->setImage($row["Image"]);
            $item->setName($row["Name"]);
            $item->setBrand($row["Brand"]);
            $item->setDescription($row["Description"]);
            $item->set_itemquantity($row["Quantity"]);
            $item->setUnits($row["Units"]);
            $item->set_discount1($row['Discount1']);
            $item->set_discount2($row['Discount2']);
            $item->set_totalAmount($row['TotalAmount']);
            $item->set_totalPrice($row['TotalPrice']);
            $item->set_GST($row['GST']);
            $item->set_ppMRP($row['MRP']);
            $item->setUnitFactor($row['unitFactor']);
            array_push($itemList,$item);
          }
        }
        return $itemList;
      }
      public static function getAllquotations(){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql = "SELECT * FROM  quotation_details";
        $result = $connectionObj->query($sql);
        $count = mysqli_num_rows($result);
        $quotationList=[];
        if($count>0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $quotation=new quotation();
            $quotation->set_quoteId($row["quotation_id"]);
            //$quotation->set_quotationname($row["quotation_name"]);
            array_push($quotationList,$quotation);
          }
        }
        return $quotationList;
      }

      public static function update($lineItemObj){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql="UPDATE quotelineitem SET 
             quantity=".$lineItemObj->get_itemquantity().
            ", amount=".$lineItemObj->get_totalAmount().
            ", totalAmount=".$lineItemObj->get_totalAmount(). 
            ", discount1=".$lineItemObj->get_discount1(). 
            ", discount1Amt=".$lineItemObj->get_discountAmount1().
            ", discount2=".$lineItemObj->get_discount2().
            ", discount2Amt=".$lineItemObj->get_discountAmount2().
            ", GSTAmount=".$lineItemObj->get_GSTAmt(). 
            ", GST=".$lineItemObj->get_GST().
            ", totalPrice=".$lineItemObj->get_totalPrice(). 
            ", modifiedby='".$lineItemObj->get_modifiedby().
            "' WHERE lineItemId=".$lineItemObj->get_lineItemId();
            error_log($sql);
        if ($connectionObj->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }
      }

      public static function delete($lineItemObj){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql="DELETE from quotelineitem where lineItemId=".$lineItemObj;
        error_log($sql);
        if ($connectionObj->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }

      }

    }