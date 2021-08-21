<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/item_subcategorymodel.php";


class DBitemsubcategory
{
  public static function insert($itemsubcatObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "insert into item_subcategory (`item_catid`,`item_subcatName`, `item_subcatDescription`,`item_subcatCreatedby`,`item_subcatModifiedby`) 
                values ('" . $itemsubcatObj->get_itemcatid() .
      "','" . $itemsubcatObj->get_itemsubcatname() .
      "','" . $itemsubcatObj->get_itemsubcatdescription() .
      "','" . $itemsubcatObj->get_itemsubcatcreatedby() .
      "','" . $itemsubcatObj->get_itemsubcatmodifiedby() . "')";

    if ($connectionObj->query($sql) === true) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function getallitemsubcategory()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM item_subcategory As subCat
      JOIN item_category cat 
      ON subCat.item_catid=cat.item_catid";

    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $itemsubcatlist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Item_Subcategory();
        $view->set_categoryName($row['item_catName']);
        $view->set_itemcatid($row['item_catid']);
        $view->set_itemsubcatid($row['item_subcatid']);
        $view->set_itemsubcatname($row['item_subcatName']);
        $view->set_itemsubcatdescription($row["item_subcatDescription"]);
        $view->set_itemsubcatcreatedby($row["item_subcatCreatedBy"]);
        $view->set_itemsubcatmodifiedby($row["item_subcatModifiedBy"]);

        array_push($itemsubcatlist, $view);
      }
    } else {
      // echo "0 results";
    }

    return $itemsubcatlist;
  }

  public static function update($subcatObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE item_subcategory SET item_catid=" . $subcatObj->get_itemcatid() .
      ",item_subcatName='" . $subcatObj->get_itemsubcatname() .
      "', item_subcatDescription='" . $subcatObj->get_itemsubcatdescription() .
      "', item_subcatCreatedBy='" . $subcatObj->get_itemsubcatcreatedby() .
      "', item_subcatModifiedBy='" . $subcatObj->get_itemsubcatmodifiedby() .
      "' WHERE item_subcatid=" . $subcatObj->get_itemsubcatid();
      error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function selectsubcategory($catid)
  {

    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $result = mysqli_query($db->getConnection(), 'SELECT item_subcatid,item_subcatName FROM item_subcategory WHERE item_catid=' . $catid);
    $itemsubcatlist = [];
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $view = new Item_Subcategory();
        $view->set_itemsubcatid($row['item_subcatid']);
        $view->set_itemsubcatname($row['item_subcatName']);
        array_push($itemsubcatlist, $view);
      }
    } else {
      echo "0 results";
    }
    header('Content-Type: application/json');
    echo json_encode($itemsubcatlist);
  }

  public static function delete($subcatObj){
    $db=ConnectDb::getInstance();
    $connectionObj=$db->getConnection();
    $sql="DELETE from item_subcategory where item_subcatid='".$subcatObj."'";
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }

  }
}
