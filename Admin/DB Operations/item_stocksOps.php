<?php
  require_once "../DB Operations/dbconnection.php";
  require_once "../Model/item_stocksmodel.php";


class DBitemstock
{
    public static function insert($itemstockObj)
    {
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql = "insert into item_stock (`item_id`,`item_stockbatchno`, `item_stockquantity`,`item_stockcreatedby`,`item_stockcomments`,`item_stockdescription`,`item_stockmodifiedby`) 
                values ('".$itemstockObj->get_itemid()."','".$itemstockObj->get_itemstockbatchno()."','".$itemstockObj->get_itemstockquantity()."','".$itemstockObj->get_itemstockcreatedby()."','".$itemstockObj->get_itemstockcomments()."','".$itemstockObj->get_itemstockdescription()."','".$itemstockObj->get_itemstockmodifiedby()."')";
                
        if ($connectionObj->query($sql) === true) {
        } else {
            echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }
    }

    public static function getallItemstock()
    {
      $db=ConnectDb::getInstance();
      $connectionObj=$db->getConnection();
      $sql = "SELECT * FROM item_stock";
 
      $result = $connectionObj->query($sql);
      $count = mysqli_num_rows($result);
      $itemstocklist=[];
      if ($count>0) 
      {
          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view=new Item_Stock();
        $view->set_itemid($row['item_id']);
        $view->set_itemstockid($row['item_stockid']);
        $view->set_itemstockbatchno($row['item_stockbatchno']);
        $view->set_itemstockquantity($row["item_stockquantity"]);
        $view->set_itemstockinwarddate(date('d-m-Y',strtotime($row["item_stockinwarddate"])));
        $view->set_itemstockcomments($row["item_stockcomments"]);
        $view->set_itemstockdescription($row["item_stockdescription"]);
        $view->set_itemstockcreatedby($row["item_stockcreatedby"]);
        $view->set_itemstockmodifiedby($row["item_stockmodifiedby"]);
        array_push($itemstocklist,$view);
      }
      } else {
      // echo "0 results";
    }
    
    return $itemstocklist;

    }

    public static function update($stockObj){
      $db=ConnectDb::getInstance();
      $connectionObj=$db->getConnection();
      $sql="UPDATE item_stock SET item_stockbatchno='".$stockObj->get_itemstockbatchno().
      "', item_id='".$stockObj->get_itemid().
      "', 	item_stockquantity='".$stockObj->get_itemstockquantity().
      "', item_stockDescription='".$stockObj->get_itemstockdescription().
      "', item_stockCreatedBy='".$stockObj->get_itemstockcreatedby().
      "', item_stockModifiedBy='".$stockObj->get_itemstockmodifiedby().
      "' WHERE item_stockid=".$stockObj->get_itemstockid();
      error_log($sql);
      if ($connectionObj->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $connectionObj->error;
      }
    }

    public static function delete($stockObj){
      $db=ConnectDb::getInstance();
      $connectionObj=$db->getConnection();
      $sql="DELETE from item_stock where item_stockid='".$stockObj."'";
      if ($connectionObj->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $connectionObj->error;
      }

    }

}