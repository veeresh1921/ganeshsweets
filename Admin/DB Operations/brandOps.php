<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/brandmodel.php";

class DBbrand
    {
      public static function insert($brandObj)
      {
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql = "INSERT INTO brands (`brand_name`, `brand_createdby`, `brand_modifiedby`) 
                values ('".$brandObj->get_brandname().
                "','".$brandObj->get_brandcreatedby().
                "','".$brandObj->get_brandmodifiedby()."')";
        if ($connectionObj->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }
      }
      

      public static function getAllbrands(){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql = "SELECT * FROM  brands";
        $result = $connectionObj->query($sql);
        $count = mysqli_num_rows($result);
        $brandList=[];
        if($count>0){
          while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $brand=new brand();
            $brand->set_brandid($row["brand_id"]);
            $brand->set_brandname($row["brand_name"]);
            array_push($brandList,$brand);
          }
        }
        return $brandList;
      }

      public static function update($brandObj){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql="UPDATE brands SET brand_name='".$brandObj->get_brandname().
        "' WHERE brand_id=".$brandObj->get_brandid();
        if ($connectionObj->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }
      }

      public static function delete($brandObj){
        $db=ConnectDb::getInstance();
        $connectionObj=$db->getConnection();
        $sql="DELETE from brands where brand_id='".$brandObj."'";
        error_log($sql);
        if ($connectionObj->query($sql) === TRUE) {
        } else {
          echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }

      }


      public static function selectbrands()
      {
    
        $db = ConnectDb::getInstance();
        $connectionObj = $db->getConnection();
        $result = mysqli_query($db->getConnection(), 'SELECT brand_id,brand_name FROM brands');
        $brandlist = [];
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $view = new Brand();
            $view->set_brandid($row['brand_id']);
            $view->set_brandname($row['brand_name']);
            array_push($brandlist, $view);
          }
        } else {
          echo "0 results";
        }
        header('Content-Type: application/json');
        echo json_encode($brandlist);
      }

    }
