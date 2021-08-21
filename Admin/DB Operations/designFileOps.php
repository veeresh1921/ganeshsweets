<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/designfilesModel.php";
class DBdesignFile{
    public static function insert($designFile){

        $db = ConnectDb::getInstance();
        $connectionObj = $db->getConnection();
        $sql = "INSERT INTO designimages (`customerId`, 
    `designFilePath`,
    `designDescription`,
    `createdby`,
    `modifiedby`) 
                values ('" . $designFile->getCustomerId() .
            "','" . $designFile->getDesignFilePath() .
            "','" . $designFile->getDesignFileDescription() .
            "','" . $designFile->getCreatedby() .
            "','" . $designFile->getModifiedby() .
            "')";
            error_log($sql);
        if ($connectionObj->query($sql) === true) {
        } else {
            echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }
    }

    public static function delete($designFileId){
        $db = ConnectDb::getInstance();
        $connectionObj = $db->getConnection();
        $sql="DELETE FROM designimages WHERE designImgId=".$designFileId;
        if ($connectionObj->query($sql) === true) {
        } else {
            echo "Error: " . $sql . "<br>" . $connectionObj->error;
        }
    }

    public static function readAll($customerId){
        $db = ConnectDb::getInstance();
        $connectionObj = $db->getConnection();
        $sql="SELECT * FROM designimages WHERE customerId=".$customerId;
        $result = $connectionObj->query($sql);
        $count = mysqli_num_rows($result);
        $designFileList = [];
        if ($count > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $designFile = new designFile();
                $designFile->setDesignFileId($row['designImgId']);
                $designFile->setCustomerId($row['customerId']);
                $designFile->setDesignFilePath($row["designFilePath"]);
                $designFile->setDesignFileDescription($row["designDescription"]);
                $designFile->setCreatedby($row["createdby"]);
                $designFile->setModifiedby($row["modifiedby"]);
                array_push($designFileList, $designFile);
            }
        } else {
            // echo "0 results";
        }
        return $designFileList;
    }
}
?>