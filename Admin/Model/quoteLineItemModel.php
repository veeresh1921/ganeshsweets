<?php
class lineItem implements JsonSerializable{

    private $quoteId;
    private $lineItemId;
    private $itemid;
    private $item_subcatid;
    private $item_subcatname;
    private $item_catid;
    private $item_catname;
    private $createdby;
    private $modifiedby;
    private $itemppMRP;
    private	$itemquantity;
    private $totalAmount;
    private $totalPrice;
    private $GST;
    private $GSTAmt;
    private $discount1;
    private $discount2;
    private $discountAmount1;
    private $discountAmount2;
    private $image;
    private $Name;
    private $Brand;
    private $Description;
    private $Units;
    private $unitFactor;
    public function set_GSTAmt($GSTAmt){
        $this->GSTAmt=$GSTAmt;
    }
    public function get_GSTAmt(){
       return $this->GSTAmt;
    }
    public function set_GST($GST){
        $this->GST=$GST;
    }
    public function get_GST(){
       return $this->GST;
    }
    public function set_totalPrice($totalPrice){
        $this->totalPrice=$totalPrice;
    }
    public function get_totalPrice(){
       return $this->totalPrice;
    }
    public function get_discountAmount2(){
        return $this->discountAmount2;
     }
     public function set_discountAmount2($discountAmount2){
         $this->discountAmount2=$discountAmount2;
     }
    public function get_discountAmount1(){
        return $this->discountAmount1;
     }
     public function set_discountAmount1($discountAmount1){
         $this->discountAmount1=$discountAmount1;
     }
    public function get_discount2(){
        return $this->discount2;
     }
     public function set_discount2($discount2){
         $this->discount2=$discount2;
     }
    public function get_discount1(){
        return $this->discount1;
     }
     public function set_discount1($discount1){
         $this->discount1=$discount1;
     }
    public function get_quoteId(){
        return $this->quoteId;
     }
     public function set_quoteId($quoteId){
         $this->quoteId=$quoteId;
     }
     public function get_lineItemId(){
        return $this->lineItemId;
     }
     public function set_lineItemId($lineItemId){
         $this->lineItemId=$lineItemId;
     }
     function set_itemid($itemid)
    {
        $this->itemid =$itemid;
    }
    function get_itemid()
    {
        return $this->itemid ;
    }
    function set_itemcatid($itemcatid)
    {
        $this->item_catid =$itemcatid;
    }
    function get_itemcatid()
    {
        return $this->item_catid ;
    }

    function set_itemcatname($itemcatname)
    {
        $this->item_catname =$itemcatname;
    }
    function get_itemcatname()
    {
        return $this->item_catname ;
    }

    function set_itemsubcatid($itemsubcatid)
    {
        $this->item_subcatid =$itemsubcatid;
    }
    function get_itemsubcatid()
    {
        return $this->item_subcatid ;
    }

    function set_itemsubcatname($itemsubcatname)
    {
        $this->item_subcatname =$itemsubcatname;
    }
    function get_itemsubcatname()
    {
        return $this->item_subcatname ;
    }

    function set_ppMRP($ppMRP){
        $this->itemppMRP=$ppMRP;
    }
    function get_ppMRP(){
        return $this->itemppMRP;
    }
    function set_itemquantity($itemquantity){
        $this->itemquantity=$itemquantity;
    }
    function get_itemquantity(){
        return $this->itemquantity;
    }
    public function set_createdby($createdby){
        $this->createdby=$createdby;
    }
    public function get_createdby(){
       return $this->createdby;
    }
    public function set_modifiedby($modifiedby){
        $this->modifiedby=$modifiedby;
    }
    public function get_modifiedby(){
       return $this->modifiedby;
    }
    public function set_totalAmount($totalAmount){
        $this->totalAmount=$totalAmount;
    }
    public function get_totalAmount(){
       return $this->totalAmount;
    }
    public function jsonSerialize()
    {

        return [
                'quoteId' => $this->quoteId,
                'lineItemId' => $this->lineItemId,
                'itemid' => $this->itemid,
                'itemcatid' => $this->item_catid,
                'itemcatname' => $this->item_catname,
                'itemsubcatid' => $this->item_subcatid,
                'itemsubcatname' => $this->item_subcatname,
                'createdby' => $this->createdby,
                'modifiedby' => $this->modifiedby,
                'itemppMRP' => $this->itemppMRP,
                'itemquantity'=> $this->itemquantity,
                'totalAmount' => $this->totalAmount,
                'totalPrice' => $this->totalPrice,
                'GST' => $this->GST,
                'discount1' => $this->discount1,
                'discount2' => $this->discount2,
                'discountAmount1' => $this->discountAmount1,
                'discountAmount2' =>$this->discountAmount2,
                'image'=>$this->image,
                'Name' => $this->Name,
                'Brand' => $this->Brand,
                'Description' => $this->Description,
                'Units' => $this->Units,
        ];
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of Name
     */ 
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */ 
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * Get the value of Brand
     */ 
    public function getBrand()
    {
        return $this->Brand;
    }

    /**
     * Set the value of Brand
     *
     * @return  self
     */ 
    public function setBrand($Brand)
    {
        $this->Brand = $Brand;

        return $this;
    }

    /**
     * Get the value of Description
     */ 
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set the value of Description
     *
     * @return  self
     */ 
    public function setDescription($Description)
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * Get the value of Units
     */ 
    public function getUnits()
    {
        return $this->Units;
    }

    /**
     * Set the value of Units
     *
     * @return  self
     */ 
    public function setUnits($Units)
    {
        $this->Units = $Units;

        return $this;
    }

    /**
     * Get the value of unitFactor
     */ 
    public function getUnitFactor()
    {
        return $this->unitFactor;
    }

    /**
     * Set the value of unitFactor
     *
     * @return  self
     */ 
    public function setUnitFactor($unitFactor)
    {
        $this->unitFactor = $unitFactor;

        return $this;
    }
}