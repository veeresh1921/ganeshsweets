<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/item_companydetailsmodel.php";
require_once "../Model/supplier_brand_mappingModel.php";
require_once "../DB Operations/supplier_brand_mappingOps.php";

class DBitemcompdetails
{
  public static function insert($itemcompdetailsObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "insert into item_companydetails (`item_compName`,
     `item_compDescription`,
     `item_compGSTIN`,
     `item_compAccountno`,
     `item_compAccountname`,
     `item_compaccIFSCcode`,
     `item_compaccMICRcode`,
     `item_compAddress`,
     `item_compCreatedBy`,
     `item_compModifiedBy`,
     `item_complogo`) 
                values ( '" . $itemcompdetailsObj->get_itemcompname() .
      "','" . $itemcompdetailsObj->get_itemcompdescription() .
      "','" . $itemcompdetailsObj->get_itemcompgstin() .
      "','" . $itemcompdetailsObj->get_itemcompaccno() .
      "','" . $itemcompdetailsObj->get_itemcompaccname() .
      "','" . $itemcompdetailsObj->get_itemcompaccifsc() .
      "','" . $itemcompdetailsObj->get_itemcompaccmicr() .
      "','" . $itemcompdetailsObj->get_itemcompaddress() .
      "','" . $itemcompdetailsObj->get_itemcompcreatedby() .
      "','" . $itemcompdetailsObj->get_itemcompmodifiedby().
      "','" . $itemcompdetailsObj->get_itemcomplogo() ."')";

    if ($connectionObj->query($sql) === true) {
      $lastInsertedId =  $connectionObj->insert_id;
      foreach ($itemcompdetailsObj->get_brandList() as $brand) {
        $map = new supplierBrandMappingModel();
        $map->set_supplierId($lastInsertedId);
        $map->set_brandId($brand);
        $map->set_ModifiedBy($itemcompdetailsObj->get_itemcompcreatedby());
        $map->set_CreatedBy($itemcompdetailsObj->get_itemcompcreatedby());
        DBsupplierBrandMapping::insert($map);
      }
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function getallitemcompdetails()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM item_companydetails";
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $itemcompdetailslist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Item_Companydetails();
        $view->set_itemcompid($row['item_compid']);
        $view->set_itemcompname($row['item_compName']);
        $view->set_itemcompdescription($row["item_compDescription"]);
        $view->set_itemcompaddress($row["item_compAddress"]);
        $view->set_itemcompgstin($row["item_compGSTIN"]);
        $view->set_itemcompaccno($row["item_compAccountno"]);
        $view->set_itemcompaccname($row["item_compAccountname"]);
        $view->set_itemcompaccifsc($row["item_compaccIFSCcode"]);
        $view->set_itemcompaccmicr($row["item_compaccMICRcode"]);
        $view->set_itemcomplogo($row["item_complogo"]);
        $view->set_itemcompcreatedby($row["item_compCreatedBy"]);
        $view->set_itemcompmodifiedby($row["item_compModifiedBy"]);
        array_push($itemcompdetailslist, $view);
      }
    } else {
      // echo "0 results";
    }

    return $itemcompdetailslist;
  }

  public static function update($detailsObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE item_companydetails SET item_compName='" . $detailsObj->get_itemcompname() .
      "', item_compDescription='" . $detailsObj->get_itemcompdescription() .
      "', item_compAddress='" . $detailsObj->get_itemcompaddress();
      if($detailsObj->get_itemcomplogo()!=""){
      $sql.="', item_complogo='" . $detailsObj->get_itemcomplogo();
      }
      $sql.="', item_compGSTIN='" . $detailsObj->get_itemcompgstin() .
      "', item_compAccountno='" . $detailsObj->get_itemcompaccno() .
      "', item_compAccountname='" . $detailsObj->get_itemcompaccno() .
      "', item_compaccIFSCcode='" . $detailsObj->get_itemcompaccifsc() .
      "', item_compaccMICRcode='" . $detailsObj->get_itemcompaccmicr() .
      "', item_compCreatedBy='" . $detailsObj->get_itemcompcreatedby() .
      "', item_compModifiedBy='" . $detailsObj->get_itemcompmodifiedby() .
      "' WHERE item_compid=" . $detailsObj->get_itemcompid();
error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
      DBsupplierBrandMapping::delete($detailsObj->get_itemcompid());
      foreach ($detailsObj->get_brandList() as $brand) {
        $map = new supplierBrandMappingModel();
        $map->set_supplierId($detailsObj->get_itemcompid());
        $map->set_brandId($brand);
        DBsupplierBrandMapping::insert($map);
      }
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }
  public static function selectCompany(){
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT item_compid,item_compName FROM item_companydetails";
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $itemcompdetailslist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Item_Companydetails();
        $view->set_itemcompid($row['item_compid']);
        $view->set_itemcompname($row['item_compName']);
        array_push($itemcompdetailslist, $view);
      }
    } else {
      // echo "0 results";
    }
    header('Content-Type: application/json');
    echo json_encode($itemcompdetailslist);
  }

  public static function delete($compdetailsObj){
    $db=ConnectDb::getInstance();
    $connectionObj=$db->getConnection();
    $sql="DELETE from item_companydetails where item_compid='".$compdetailsObj."'";
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }

  }
}
