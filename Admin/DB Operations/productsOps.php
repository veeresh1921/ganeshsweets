<?php
require_once "../DB Operations/dbconnection.php";
require_once "../Model/productsmodel.php";
class DBproductdetails
{
  /*
  function accepts the input item object and inserts the record in 
  item details table.
  */
  public static function insert($productdetailsObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "insert into products (`product_name`, 
        `product_description`,
        `product_dimensionsid`,
        `product_itemid`,
        `item_catid`,
       
        `item_subcatid`,
       
        `product_brandid`,
        `product_itemcode`,
        
        `product_categoryid`,
  
        `product_subcategoryid`,
        `product_quantity`,
        `product_store`,
   
        `product_unitid`) 
                values ('" . $productdetailsObj->get_productname() .
      "','" . $productdetailsObj->get_productdescription() .
    
      "','" . $productdetailsObj->get_productdimensionsid() .
     
      "','" . $productdetailsObj->get_productitemid() .
    
      "','" . $productdetailsObj->get_itemcatid() .
   
      "','" . $productdetailsObj->get_itemsubcatid() .
     
      "','" . $productdetailsObj->get_productbrandid() .
      "','" . $productdetailsObj->get_productitemcode() .
    
      "','" . $productdetailsObj->get_productcategoryid() .
    
      "','" . $productdetailsObj->get_productsubcategoryid() .
      "','" . $productdetailsObj->get_productquantity() .
      "','" . $productdetailsObj->get_productstore() .
     
      "','" . $productdetailsObj->get_productunitid() .
      // "','" . $productdetailsObj->get_productbarcode() .
      // "','" . $productdetailsObj->get_ID() .
      "')";

    if ($connectionObj->query($sql) === true) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function getallproductdetails()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT P.product_id AS Productid,
    P.product_name AS ProductName,
    P.product_description AS ProductDescription,
    P.product_dimensionsid AS ProductDimensionsid,
    D.dimensionsName AS ProductDimensions,
    I.item_name AS ProductItemname,
    I.item_id AS ProductItemid,
    P.item_catid AS CategoryId,
    C.item_catName AS CategoryName,
    P.item_subcatid AS SubCategoryId,
    SC.item_subcatName AS SubCategoryName,
    P.product_brandid AS ProductBrandid,
    B.brand_name AS ProductBrand,
    P.product_itemcode AS ProductCode,
    P.product_categoryid AS ProductCategoryId,
    PC.product_catName AS ProductCategory,
    P.product_subcategoryid AS ProductSubCategoryId,
    PSC.product_subcatName AS ProductSubCategory,
    P.product_quantity AS ProductQuantity,
    P.product_store AS ProductStore,
    P.product_unitid AS ProductUnitid
   
    FROM products P
    JOIN item_category C ON P.item_catid=C.item_catid 
    JOIN item_subcategory SC ON P.item_subcatid=SC.item_subcatid 
    JOIN product_subcategory PSC ON P.product_subcategoryid=PSC.product_subcatid
    JOIN product_category PC ON P.product_categoryid=PC.product_catid
    JOIN dimensions D ON P.product_dimensionsid=D.dimensionsId
    JOIN brands B ON P.product_brandid=B.brand_id
    JOIN item_details I ON P.product_itemid=I.item_id
    JOIN units U ON P.product_unitid=U.unitId";
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $productdetailslist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Product_Details();
        $view->set_productid($row['Productid']);
        $view->set_productname($row['ProductName']);
        $view->set_productdimensions($row["ProductDimensions"]);
        $view->set_productdimensions($row["ProductDimensionsid"]);
        $view->set_productitemname($row['ProductItemname']);
        $view->set_productitemid($row['ProductItemid']);
        $view->set_itemCategory($row["CategoryName"]);
        $view->set_itemcatid($row["CategoryId"]);
        $view->set_subCategory($row["SubCategoryName"]);
        $view->set_itemsubcatid($row["SubCategoryId"]);
        $view->set_productbrand($row["ProductBrand"]);
        $view->set_productbrandid($row["ProductBrandid"]);
        $view->set_productitemcode($row["ProductCode"]);
        $view->set_productcategoryname($row["ProductCategory"]);
        $view->set_productcategoryid($row["ProductCategoryId"]);
        $view->set_productsubcategory($row["ProductSubCategory"]);
        $view->set_productsubcategoryid($row["ProductSubCategoryId"]);
        $view->set_productquantity($row["ProductQuantity"]);
        $view->set_productstore($row["ProductStore"]);
       
        $view->set_productunitid($row["ProductUnitid"]);
       
        
        array_push($productdetailslist, $view);
      }
    } else {
      // echo "0 results";
    }

    return $productdetailslist;
  }

  public static function update($detailsObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "UPDATE products SET product_name='" . $detailsObj->get_productname() .
      "', product_description='" . $detailsObj->get_productdescription() .
      "', product_dimensions='" . $detailsObj->get_productdimensions() .
      "', product_dimensionsid='" . $detailsObj->get_productdimensionsid() .
      "', product_itemname='" . $detailsObj->get_productitemname() .
      "', product_itemid='" . $detailsObj->get_productitemid() .
      "', item_categoryname='" . $detailsObj->get_itemcategoryname() .
      "', item_catid='" . $detailsObj->get_itemcatid() .
      "', item_subcategoryname='" . $detailsObj->get_itemsubcategoryname() .
      "', item_subcatid='" . $detailsObj->get_itemsubcatid() .
      "', product_brand='" . $detailsObj->get_productbrand() .
      "', product_brandid='" . $detailsObj->get_productbrandid() .
      "', product_itemcode='" . $detailsObj->get_productitemcode() .
      "', product_categoryname='" . $detailsObj->get_productcategoryname() .
      "', product_categoryid='" . $detailsObj->get_productcategoryid() .
      "', product_subcategoryname='" . $detailsObj->get_productsubcategoryname() .
      "', product_subcategoryid='" . $detailsObj->get_productsubcategoryid() .
      "', product_quantity='" . $detailsObj->get_productquantity() .
      "', product_store='" . $detailsObj->get_productstore() .
      "', product_unit='" . $detailsObj->get_productunit() .
      "', product_unitid='" . $detailsObj->get_productunitid() .
      "',product_barcode" . $detailsObj->get_productbarcode() .
      "',productID" . $detailsObj->get_productID() ;
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  public static function selectproduct()
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "SELECT product_id,product_name from products";
    $result = $connectionObj->query($sql);
    $count = mysqli_num_rows($result);
    $productdetailslist = [];
    if ($count > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $view = new Item_Details();
        $view->set_productid($row['product_id']);
        $view->set_productname($row['product_name']);
        array_push($productdetailslist, $view);
      }
      header('Content-Type: application/json');
      echo json_encode($productdetailslist);
    }
  }

  public static function delete($itemObj)
  {
    $db = ConnectDb::getInstance();
    $connectionObj = $db->getConnection();
    $sql = "DELETE from products where product_id='" . $itemObj . "'";
    if ($connectionObj->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $connectionObj->error;
    }
  }

  
  
}
