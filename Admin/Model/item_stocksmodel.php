<?php
class Item_Stock implements JsonSerializable
{
    										
    private $item_stockid ;
    private $item_id;
    private	$item_stockbatchno;
    private	$item_stockquantity;
    private	$item_stockinwarddate;
    private $item_stockcomments;
    private $item_stockdescription;
    private $item_stockcreatedon;
    private $item_stockcreatedby;
    private $item_stockmodifiedon;
    private $item_stockmodifiedby;
    private $table_name="item_stock";
 

   function set_itemstockid($itemstockid)
    {
        $this->item_stockid =$itemstockid;
    }
    function get_itemstockid()
    {
        return $this->item_stockid ;
    }


    function set_itemid($itemid)
    {
        $this->item_id =$itemid;
    }
    function get_itemid()
    {
        return $this->item_id ;
    }
    
    function set_itemstockbatchno($itemstockbatchno)
    {
        $this->item_stockbatchno=$itemstockbatchno;
    }
    function get_itemstockbatchno()
    {
        return $this->item_stockbatchno;
    }

    function set_itemstockquantity($itemstockquantity)
    {
        $this->item_stockquantity=$itemstockquantity;
    }
    function get_itemstockquantity()
    {
        return $this->item_stockquantity;
    }


    function set_itemstockinwarddate($itemstockinwarddate)
    {
        $this->item_stockinwarddate=$itemstockinwarddate;
    }
    function get_itemstockinwarddate()
    {
        return $this->item_stockinwarddate;
    }

    function set_itemstockcomments($itemstockcomments)
    {
        $this->item_stockcomments=$itemstockcomments;
    }
    function get_itemstockcomments()
    {
        return $this->item_stockcomments;
    }

    function set_itemstockdescription($itemstockdescription)
    {
        $this->item_stockdescription =$itemstockdescription;
    }
    function get_itemstockdescription()
    {
        return $this->item_stockdescription;
    }

    function set_itemstockcreatedby($itemstockcreatedby)
    {
        $this->item_stockcreatedby	=$itemstockcreatedby;
    }
    function get_itemstockcreatedby()
    {
        return $this->item_stockcreatedby;
    }


    function set_itemstockcreatedon($itemstockcreatedon)
    {
        $this->item_stockcreatedon	=$itemstockcreatedon;
    }
    function get_stockcreatedon()
    {
        return $this->item_stockcreatedon;
    }



    function set_itemstockmodifiedon($itemstockmodifiedon)
    {
        $this->item_stockmodifiedon	=$itemstockmodifiedon;
    }
    function get_itemstockmodifiedon()
    {
        return $this->item_stockmodifiedon;
    }



    function set_itemstockmodifiedby($itemstockmodifiedby)
    {
        $this->item_stockmodifiedby	=$itemstockmodifiedby;
    }
    function get_itemstockmodifiedby()
    {
        return $this->item_stockmodifiedby;
    }


    public function jsonSerialize()
    {
        return [
                'itemid'=>$this->item_id,
                'itemstockid' => $this->item_stockid,
                'itemstockbatchno' => $this->item_stockbatchno,
                'itemstockquantity' => $this->item_stockquantity,
                'itemstockcomments' => $this->item_stockcomments,
                'itemstockdescription' =>$this->item_stockdescription,
                'itemstockcreatedby'=>$this->item_stockcreatedby,
                'itemstockmodifiedby'=>$this->itemstockmodifiedby
        ];
    }
}
