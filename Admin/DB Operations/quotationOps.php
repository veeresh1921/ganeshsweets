<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/quotationModel.php";

class DBQuotation
{
  public static function insert($quotationObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "INSERT INTO quotation_details ( 
        `enqCatId`,
        `quo_enq_id`, 
        `customerId`,
        `quoteCode`,
        `quoteDescription`, 
        `itemListName`, 
        `orderListName`,
        `quoteValue`, 
        `quo_type`, 
        `quo_pdf_name`,  
        `quo_createdby`,
        `modifiedby`,
        `quo_status`, 
        `quo_comments`) 
                values ('".$quotationObj->getCatId().
      "','" . $quotationObj->get_enqId() .
      "','" . $quotationObj->get_customerId() .
      "','" . $quotationObj->getQuoteCode().
      "','" . $quotationObj->get_quoteDescription() .
      "','" . $quotationObj->get_itemListName() .
      "','" . $quotationObj->get_orderListName() .
      "','" . $quotationObj->getQuoteValue() .
      "','" . $quotationObj->get_quoteType() .
      "','" . $quotationObj->get_quotePDFName() .
      "','" . $quotationObj->get_createdby() .
      "','" . $quotationObj->get_modifiedby() .
      "','" . $quotationObj->get_quoteStatus() .
      "','" . $quotationObj->get_quoteComments() .
      "')";
      error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
      $quoteId=$connectionObj->insert_id;
      $sql="SELECT COUNT(*) FROM quotation_details WHERE customerId=".$quotationObj->get_customerId();
      
      $count= $connectionObj->query($sql);
      $row = mysqli_fetch_array($count);
      $total = $row[0];
      $sql ="UPDATE quotation_details SET 
      quoteCode='".$quotationObj->getQuoteCode().'-0'.$total."'
      WHERE quoid=". $quoteId;
      if ($connectionObj->query($sql) === TRUE) {
          $sql="UPDATE `customer` SET `isQuoteGenerated`=1
          WHERE customerId=".$quotationObj->get_customerId();
          $connectionObj->query($sql);
      }
      return $quoteId;
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }
  public static function getAllquotations()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM  quotation_details As Q
        JOIN customer AS C
        ON C.customerId=Q.customerId
        LEFT JOIN units AS U
        ON Q.unitId=U.unitId
        ";
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $quotationList = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $quotation = new quotation();
        $quotation->setCatId($row["enqCatId"]);
        $quotation->set_quoteId($row["quoid"]);
        $quotation->set_quoteType($row["quo_type"]);
        $quotation->set_quoteStatus($row["quo_status"]);
        $quotation->set_quoteComments($row["quo_comments"]);
        $quotation->set_quoteDescription($row["quoteDescription"]);
        $quotation->set_itemListName($row['itemListName']);
        $quotation->set_quotePDFName($row['quo_pdf_name']);
        $quotation->set_customerName($row['customerName']);
        $quotation->setCustomerCode($row['customerCode']);
        $quotation->setDOE(date('d/m/Y',strtotime($row['customerDOV'])));
        $quotation->setQuoteCode($row['quoteCode']);
        $quotation->setDOQ(date('d/m/Y',strtotime($row['quo_createdon'])));
        $quotation->setQuoteValue($row['quoteValue']);
        $quotation->set_customerId($row['customerId']);
        $quotation->setUnitId($row['unitId']);
        $quotation->setQuantity($row['quantity']);
        $quotation->setUnitName($row['unitName']);
        array_push($quotationList, $quotation);
      }
    }
    return $quotationList;
  }
  public static function getQuotations($id)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM  quotation_details As Q
        JOIN customer AS C
        ON C.customerId=Q.customerId
        LEFT JOIN units AS U
        ON U.unitId=Q.unitId
        WHERE Q.quoid=".$id;
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $quotation = new quotation();
        $quotation->setCatId($row["enqCatId"]);
        $quotation->set_quoteId($row["quoid"]);
        $quotation->set_quoteType($row["quo_type"]);
        $quotation->set_quoteStatus($row["quo_status"]);
        $quotation->set_quoteComments($row["quo_comments"]);
        $quotation->set_quoteDescription($row["quoteDescription"]);
        $quotation->set_itemListName($row['itemListName']);
        $quotation->set_orderListName($row['orderListName']);
        $quotation->set_customerName($row['customerName']);
        $quotation->setCustomerCode($row['customerCode']);
        $quotation->setDOE(date('d/m/Y',strtotime($row['customerDOV'])));
        $quotation->setQuoteCode($row['quoteCode']);
        $quotation->setDOQ(date('d/m/Y',strtotime($row['quo_createdon'])));
        $quotation->setQuoteValue($row['quoteValue']);
        $quotation->setCustomerAddress($row['customerAddress']);
        $quotation->setCustomerCity($row['customerCity']);
        $quotation->setUnitId($row['unitId']);
        $quotation->setQuantity($row['quantity']);
        $quotation->setUnitName($row['unitName']);
      }
    }
    return $quotation;
  }
  public static function getQuotationsForPrint($id)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM  quotation_details As Q
        JOIN customer AS C
        ON C.customerId=Q.customerId
        LEFT JOIN units AS U
        ON U.unitId=Q.unitId
        WHERE Q.customerId=".$id;
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $quoteList=[];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $quotation = new quotation();
        $quotation->setCatId($row["enqCatId"]);
        $quotation->set_quoteId($row["quoid"]);
        $quotation->set_quoteType($row["quo_type"]);
        $quotation->set_quoteStatus($row["quo_status"]);
        $quotation->set_quoteComments($row["quo_comments"]);
        $quotation->set_quoteDescription($row["quoteDescription"]);
        $quotation->set_itemListName($row['itemListName']);
        $quotation->set_orderListName($row['orderListName']);
        $quotation->set_customerName($row['customerName']);
        $quotation->setCustomerCode($row['customerCode']);
        $quotation->setDOE(date('d/m/Y',strtotime($row['customerDOV'])));
        $quotation->setQuoteCode($row['quoteCode']);
        $quotation->setDOQ(date('d/m/Y',strtotime($row['quo_createdon'])));
        $quotation->setQuoteValue($row['quoteValue']);
        $quotation->setCustomerAddress($row['customerAddress']);
        $quotation->setCustomerCity($row['customerCity']);
        $quotation->setUnitId($row['unitId']);
        $quotation->setQuantity($row['quantity']);
        $quotation->setUnitName($row['unitName']);
        $quotation->setCustomerphone($row['customerContactNumber']);
        array_push($quoteList,$quotation);
      }
    }
    return $quoteList;
  }
  public static function update($quotationObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE quotation_details SET 
        quoteDescription='" . $quotationObj->get_quoteDescription() .
        "', unitId='".$quotationObj->getUnitId().
        "', quantity='".$quotationObj->getQuantity().
        "', quoteValue='" . $quotationObj->getQuoteValue() .
      "', quo_type='" . $quotationObj->get_quoteType() .
      "', quo_status='" . $quotationObj->get_quoteStatus() .
      "', quo_comments='" . $quotationObj->get_quoteComments() .
      "', modifiedby='" . $quotationObj->get_modifiedby() .
      "' WHERE quoid=" . $quotationObj->get_quoteId();
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }
  public static function updateFileName($quotationObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE quotation_details SET ";
    if($quotationObj->get_itemListName()!=""){
    $sql.="itemListName='".$quotationObj->get_itemListName();
    }else{
      $sql.="quo_pdf_name='".$quotationObj->get_quotePDFName();
    }
     $sql.= "', modifiedby='" . $quotationObj->get_modifiedby() .
      "' WHERE quoid=" . $quotationObj->get_quoteId();
      error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function delete($quoteId)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "DELETE FROM quotelineitem WHERE quoteId=".$quoteId;
    error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
      $sql = "DELETE from quotation_details where quoid=" . $quoteId;
      error_log($sql);
      if ($connectionObj->query($sql) === TRUE) {

      }else{
        echo "Error: " . $sql . "<br>" . $connectionObj->error;
      }
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }
}
