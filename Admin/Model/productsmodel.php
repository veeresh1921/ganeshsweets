												

<?php
class Product_Details implements JsonSerializable
{
    private $product_id ;
    private $product_name;
    private	$product_dimensions;
    private	$product_dimensionsid;
    private	$product_itemname;
    private	$product_itemid;
    private	$item_categoryname;
    private $item_catid;
    private	$item_subcategoryname;
    private $item_subcatid;
    private	$product_brand;
    private	$product_brandid;
    private $product_itemcode;
    private $product_categoryname;
    private $product_categoryid;
    private $product_subcategoryname;
    private $product_subcategoryid;
    private $product_description;
    private $product_quantity;
    private $product_store;
    private $product_unit;
    private $product_unitid;
    private $product_barcode	;
    private $product_modifiedby;
    private $product_createdby;
    private $ID;


    private $table_name="products";
 
   function set_productid($productid)
    {
        $this->product_id =$productid;
    }
    function get_productid()
    {
        return $this->product_id ;
    }

    function set_itemcatid($itemcatid)
    {
        $this->item_catid =$itemcatid;
    }
    function get_itemcatid()
    {
        return $this->item_catid ;
    }

    function set_itemsubcatid($itemsubcatid)
    {
        $this->item_subcatid =$itemsubcatid;
    }
    function get_itemsubcatid()
    {
        return $this->item_subcatid ;
    }

    function set_productname($productname)
    {
        $this->product_name=$productname;
    }
    function get_productname()
    {
        return $this->product_name;
    }

    function set_productdescription($productdescription)
    {
        $this->product_description=$productdescription;
    }
    function get_productdescription()
    {
        return $this->product_description;
    }


    function set_productcreatedby($productcreatedby)
    {
        $this->product_createdby=$productcreatedby;
    }
    function get_productcreatedby()
    {
        return $this->product_createdby;
    }

    function set_productmodifiedby($productmodifiedby)
    {
        $this->product_modifiedby	=$productmodifiedby;
    }
    function get_productmodifiedby()
    {
        return $this->product_modifiedby;
    }

    function set_productdimensions($productdimensions)
    {
        $this->product_dimensions	=$productdimensions;
    }
    function get_productdimensions()
    {
        return $this->product_dimensions;
    }

    function set_productdimensionsid($productdimensionsid)
    {
        $this->product_dimensionsid	=$productdimensionsid;
    }
    function get_productdimensionsid()
    {
        return $this->product_dimensionsid;
    }

    function set_productitemname($productitemname)
    {
        $this->product_itemname	=$productitemname;
    }
    function get_productitemname()
    {
        return $this->product_itemname;
    }

    function set_productitemid($productitemid)
    {
        $this->product_itemid	=$productitemid;
    }
    function get_productitemid()
    {
        return $this->product_itemid;
    }
    
    function set_itemCategory($itemCategory)
    {
        $this->item_categoryname	=$itemCategory;
    }
    function get_itemCategory()
    {
        return $this->item_categoryname;
    }

    
    function set_subCategory($subCategory)
    {
        $this->item_subcategoryname	=$subCategory;
    }
    function get_subCategory()
    {
        return $this->item_subcategoryname;
    }

    function set_productcategoryname($productcategoryname)
    {
        $this->product_category	=$productcategoryname;
    }
    function get_productcategoryname()
    {
        return $this->product_category;
    }

    function set_productcategoryid($productcategoryid)
    {
        $this->product_categoryid	=$productcategoryid;
    }
    function get_productcategoryid()
    {
        return $this->product_categoryid;
    }

    function set_productsubcategory($productsubcategory)
    {
        $this->product_subcategory	=$productsubcategory;
    }
    function get_productsubcategory()
    {
        return $this->product_subcategory;
    }

    function set_productsubcategoryid($productsubcategoryid)
    {
        $this->product_subcategoryid	=$productsubcategoryid;
    }
    function get_productsubcategoryid()
    {
        return $this->product_subcategoryid;
    }

    function set_productbrand($productbrand)
    {
        $this->product_brand	=$productbrand;
    }
    function get_productbrand()
    {
        return $this->product_brand;
    }

    function set_productbrandid($productbrandid)
    {
        $this->product_brandid	=$productbrandid;
    }
    function get_productbrandid()
    {
        return $this->product_brandid;
    }


    function set_productstore($productstore)
    {
        $this->product_store	=$productstore;
    }
    function get_productstore()
    {
        return $this->product_store;
    }

    function set_productitemcode($productitemcode)
    {
        $this->product_itemcode	=$productitemcode;
    }
    function get_productitemcode()
    {
        return $this->product_itemcode;
    }

    // function set_productbarcode($productbarcode)
    // {
    //     $this->product_barcode	=$productbarcode;
    // }
    // function get_productbarcode()
    // {
    //     return $this->product_barcode;
    // }

    function set_productunit($productunit)
    {
        $this->product_unit	=$productunit;
    }
    function get_productunit()
    {
        return $this->product_unit;
    }

    function set_productunitid($productunitid)
    {
        $this->product_unitid	=$productunitid;
    }
    function get_productunitid()
    {
        return $this->product_unit;
    }

    function set_productquantity($productquantity)
    {
        $this->product_quantity	=$productquantity;
    }
    function get_productquantity()
    {
        return $this->product_quantity;
    }

    function set_ID($ID)
    {
        $this->ID	=$ID;
    }
    function get_ID()
    {
        return $this->ID;
    }


    public function jsonSerialize()
    {
        return 
            [
                'productid' => $this->product_id,
                'productname' => $this->product_name,
                'productdescription' => $this->product_description,
                'productdimensions' => $this->product_dimensions,
                'productdimensionsid' => $this->product_dimensionsid,
                'productitemname' => $this->product_itemname,
                'productitemid' => $this->product_itemid,
                'itemcategory' => $this->item_categoryname,
                'itemcatid' => $this->item_catid,
                'subCategory' => $this->item_subcategoryname,
                'itemsubcatid' => $this->item_subcatid,
                'productbrand' => $this->product_brand,
                'productbrandid' => $this->product_brandid,
                'productitemcode' => $this->product_itemcode,
                'productcategoryname' => $this->product_category,
                'productcategoryid' => $this->product_categoryid,
                'productsubcategory' => $this->product_subcategory,
                'productsubcategoryid' => $this->product_subcategoryid,
                'productquantity' => $this->product_quantity,
                'productstore' => $this->product_store,
                'productunit' => $this->product_unit,
                'productunit' => $this->product_unitid,
                'productbarcode' => $this->product_barcode,
                'ID' => $this->ID,

            ];
        
    }
}




