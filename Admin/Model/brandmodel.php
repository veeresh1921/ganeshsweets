<?php
class Brand  implements JsonSerializable
{
    private $brand_id;
    private $brand_name;
    private $isMapped;
    private $brand_modifiedby;
    private $brand_createdby;
    private $table_name = "brands";
    function set_isMapped($isMapped)
    {
        $this->isMapped= $isMapped;
    }
    function get_isMapped()
    {
        return $this->isMapped;
    }

    function set_brandid($brandid)
    {
        $this->brand_id= $brandid;
    }
    function get_brandid()
    {
        return $this->brand_id;
    }

    function set_brandname($brandname)
    {
        $this->brand_name = $brandname;
    }
    function get_brandname()
    {
        return $this->brand_name;
    }

    function set_brandcreatedby($brandcreatedby)
    {
        $this->brand_createdby= $brandcreatedby;
    }
    function get_brandcreatedby()
    {
        return $this->brand_createdby;
    }

    function set_brandmodifiedby($brandmodifiedby)
    {
        $this->brand_modifiedby= $brandmodifiedby;
    }
    function get_brandmodifiedby()
    {
        return $this->brand_modifiedby;
    }

    public function jsonSerialize()
    {
        return [
            
                'brandid' => $this->brand_id,
                'brandname' => $this->brand_name,
                'isMapped' =>$this->isMapped
            
        ];
    }
}
