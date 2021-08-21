<?php
$dirPath1 = "DB Operations/dbconnection.php";
$dirPath2 = "Admin/Model/enq_categorymodel.php";

if (file_exists($dirPath1) && file_exists($dirPath2)) {
  require_once "DB Operations/dbconnection.php";
  require_once "Admin/Model/enq_categorymodel.php";
} else {
  require_once "../../DB Operations/dbconnection.php";
  require_once "../../Admin/Model/enq_categorymodel.php";
}

class DBcategory
{
  public static function insert($enqcatObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "insert into enquiry_category (`enq_cat_name`, 
        `enq_cat_createdby`,
        `enq_cat_modifiedby`) 
                values ('" . $enqcatObj->get_catname() .
      "','" . $enqcatObj->get_catcreatedby() .
      "','" . $enqcatObj->get_catModifiedby() . "')";
    if ($connectionObj->query($sql) === true) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }
  public static function selectAllForDisplay()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM enquiry_category";
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $catlist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Category();
        $view->set_catid($row['enq_catid']);
        $view->set_catname($row['enq_cat_name']);
        array_push($catlist, $view);
      }
    } else {
      // echo "0 results";
    }
   return $catlist;
  }

  public static function selectall()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT * FROM enquiry_category";
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $catlist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Category();
        $view->set_catid($row['enq_catid']);
        $view->set_catname($row['enq_cat_name']);
        array_push($catlist, $view);
      }
    } else {
      // echo "0 results";
    }
    header('Content-Type: application/json');
    echo json_encode($catlist);
  }

  public static function update($enqCat){
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE enquiry_category SET enq_cat_name='" . $enqCat->get_catname() .
      "', enq_cat_modifiedby='" . $enqCat->get_catModifiedby() .
      "' WHERE enq_catid=" . $enqCat->get_catid();
    error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }

  }
  public static function delete($id)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "DELETE FROM enq_cat_mapping WHERE enq_id=" . $id;
    error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
      $sql = "DELETE FROM enquiry_category WHERE enq_catid=" . $id;
      if ($connectionObj->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $connectionObj->error;
      }
    }
  }
}
