
<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/unitFactorModel.php";
class DBunitFactor
{
  public static function insert($unitFactor)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "INSERT INTO unitsfactor (`unitId`, 
    `unitFactorDescription`,
    `unitFactor`,
    `createdBy`,
    `modifiedBy`) 
                values ('" . $unitFactor->get_unitId() .
                "','" . $unitFactor->get_unitFactorDescription() .
                "','" . $unitFactor->get_unitFactor() .
                "','" . $unitFactor->get_CreatedBy() .
                 "','" . $unitFactor->get_ModifiedBy() . 
                 "')";
error_log($sql);
    if ($connectionObj->query($sql) === true) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function getAllUnitFactor()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT uF.unitFactorId AS unitFactorId
    ,U.unitName AS unitName
    ,uF.unitFactor AS unitFactor
    ,uF.unitId As unitId
    ,uF.unitFactorDescription As unitFactorDescription
    ,uF.createdBy AS createdBy
    ,uF.modifiedBy As modifiedBy
    FROM unitsfactor uF
    JOIN units U
    ON uF.unitId=U.unitId";

    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $unitList = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $unitFactor = new unitFactor();
        $unitFactor->set_unitId($row['unitId']);
        $unitFactor->set_unitName($row['unitName']);
        $unitFactor->set_unitFactorId($row['unitFactorId']);
        $unitFactor->set_unitFactor($row['unitFactor']);
        $unitFactor->set_unitFactorDescription($row["unitFactorDescription"]);
        $unitFactor->set_createdby($row["createdBy"]);
        $unitFactor->set_modifiedby($row["modifiedBy"]);
        array_push($unitList, $unitFactor);
      }
    
    } else {
      // echo "0 results";
    }
    return $unitList;
  }

  public static function update($unitFactor)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE unitsfactor SET 	unitId ='" . $unitFactor->get_unitId() .
      "', unitFactorDescription='" . $unitFactor->get_unitFactorDescription() .
      "', unitFactor='" . $unitFactor->get_unitFactor() .
      "', createdBy='" . $unitFactor->get_CreatedBy() .
      "', modifiedBy='" . $unitFactor->get_ModifiedBy() .
      "' WHERE 	unitFactorId =" . $unitFactor->get_unitFactorId();
      error_log($sql);
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }
  public static function selectUnitsFactor($unitId)
  {

    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql='SELECT uF.unitFactorId AS unitFactorId
    ,U.unitName AS unitName
    ,uF.unitFactor AS unitFactor
    FROM unitsfactor uF
    JOIN units U
    ON uF.unitId=U.unitId
    WHERE uF.unitId='.$unitId;
    $result = mysqli_query($db->getConnection(), $sql);
    $unitFactorList = [];
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $unitFactor = new unitFactor();
        $unitFactor->set_unitFactorId($row['unitFactorId']);
        $unitFactor->set_unitName($row['unitName']);
        $unitFactor->set_unitFactor($row['unitFactor']);
        array_push($unitFactorList, $unitFactor);
      }
    } else {
      echo "0 results";
    }
    header('Content-Type: application/json');
    echo json_encode($unitFactorList);

  }

  public static function delete($unitId){
    $db=ConnectDb::getInstance();
    $connectionObj=$db->getConnection();
    $sql="DELETE from unitsfactor where unitFactorId ='".$unitId."'";
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }

  }
}
