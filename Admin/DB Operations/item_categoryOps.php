<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/item_categorymodel.php";


class DBitemcategory
{
  public static function insert($itemcatObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "insert into item_category (`item_catName`, `item_catDescription`,`item_catCreatedby`,`item_catModifiedby`) 
                values ('" . $itemcatObj->get_itemcatname() . "','" . $itemcatObj->get_itemcatdescription() . "','" . $itemcatObj->get_itemcatcreatedby() . "','" . $itemcatObj->get_itemcatmodifiedby() . "')";

    if ($connectionObj->query($sql) === true) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function getallItemcategory()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM item_category";

    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $itemcatlist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Item_Category();
        $view->set_itemcatid($row['item_catid']);
        $view->set_itemcatname($row['item_catName']);
        $view->set_itemcatdescription($row["item_catDescription"]);
        $view->set_itemcatcreatedby($row["item_catCreatedBy"]);
        $view->set_itemcatmodifiedby($row["item_catModifiedBy"]);
        array_push($itemcatlist, $view);
       
      
      }
     return $itemcatlist;
    } else {
      // echo "0 results";
    }
  }

  public static function update($catObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE item_category SET item_catName='" . $catObj->get_itemcatname() .
      "', item_catDescription='" . $catObj->get_itemcatdescription() .
      "', item_catCreatedBy='" . $catObj->get_itemcatcreatedby() .
      "', item_catModifiedBy='" . $catObj->get_itemcatmodifiedby() .
      "' WHERE item_catid=" . $catObj->get_itemcatid();
    echo $sql;
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }
  public static function selectcategory()
  {

    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $result = mysqli_query($db->getConnection(), 'SELECT item_catid,item_catName FROM item_category');
    $itemcatlist = [];
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $view = new Item_Category();
        $view->set_itemcatid($row['item_catid']);
        $view->set_itemcatname($row['item_catName']);
        array_push($itemcatlist, $view);
      }
    } else {
      echo "0 results";
    }
    header('Content-Type: application/json');
    echo json_encode($itemcatlist);
  }

  public static function delete($itemcatObj){
    $db=ConnectDb::getInstance();
    $connectionObj=$db->getConnection();
    $sql="DELETE from item_category where item_catid='".$itemcatObj."'";
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }

  }
}
