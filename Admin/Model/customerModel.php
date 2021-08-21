<?php
class customer implements JsonSerializable
{
    private $customerId;
    private $customerCode;
    private $customerName;
    private $customerPhone;
    private $customerEmail;
    private $customerAddress;
    private $customerCity;
    private $customerState;
    private $customerDov;
    private $enqId;
    private $isQuoteGenerated;
    private $ModifiedOn;
    private $CreatedBy;
    private $CreatedOn;
    private $ModifiedBy;
    private $listOfEnq=[];
    function set_enqId($enqId)
    {
        $this->enqId = $enqId;
    }
    function get_enqId()
    {
        return $this->enqId;
    }
    function set_customerDov($customerDov)
    {
        $this->customerDov = $customerDov;
    }
    function get_customerDov()
    {
        return $this->customerDov;
    }
    function set_customerState($customerState)
    {
        $this->customerState = $customerState;
    }
    function get_customerState()
    {
        return $this->customerState;
    }
    function set_customerCity($customerCity)
    {
        $this->customerCity = $customerCity;
    }
    function get_customerCity()
    {
        return $this->customerCity;
    }
    function set_customerAddress($customerAddress)
    {
        $this->customerAddress = $customerAddress;
    }
    function get_customerAddress()
    {
        return $this->customerAddress;
    }
    function set_customerEmail($customerEmail)
    {
        $this->customerEmail = $customerEmail;
    }
    function get_customerEmail()
    {
        return $this->customerEmail;
    }
    function set_customerPhone($customerPhone)
    {
        $this->customerPhone = $customerPhone;
    }
    function get_customerPhone()
    {
        return $this->customerPhone;
    }

    function set_customerName($customerName)
    {
        $this->customerName = $customerName;
    }
    function get_customerName()
    {
        return $this->customerName;
    }
    function set_customerId($customerId)
    {
        $this->customerId = $customerId;
    }
    function get_customerId()
    {
        return $this->customerId;
    }
    function set_ModifiedOn($ModifiedOn)
    {
        $this->ModifiedOn = $ModifiedOn;
    }
    function get_ModifiedOn()
    {
        return $this->ModifiedOn;
    }

    function set_ModifiedBy($ModifiedBy)
    {
        $this->ModifiedBy = $ModifiedBy;
    }
    function get_ModifiedBy()
    {
        return $this->ModifiedBy;
    }
    function set_CreatedBy($CreatedBy)
    {
        $this->CreatedBy = $CreatedBy;
    }
    function get_CreatedBy()
    {
        return $this->CreatedBy;
    }

    function set_CreatedOn($CreatedOn)
    {
        $this->CreatedOn = $CreatedOn;
    }
    function get_CreatedOn()
    {
        return $this->CreatedOn;
    }
    public function jsonSerialize()
    {
        return   [
            'customerId' => $this->customerId,
            'customerName' => $this->customerName,
            'customerPhone' => $this->customerPhone,
            'customerEmail' => $this->customerEmail,
            'customerAddress' => $this->customerAddress,
            'customerCity' => $this->customerCity,
            'customerState' => $this->customerState,
            'customerDov'=>$this->customerDov,
            'enqId'=>$this->enqId,
            // 'totalAmt'=>$this->TotalAmt,
            // 'pendingAmt'=>$this->PendingAmt,
            'modifiedBy' => $this->ModifiedBy,
            'createdBy' => $this->CreatedBy,
            'createdOn' => $this->CreatedOn,
            'modifiedOn' => $this->ModifiedOn
        ];
    }

    /**
     * Get the value of listOfEnq
     */ 
    public function getListOfEnq()
    {
        return $this->listOfEnq;
    }

    /**
     * Set the value of listOfEnq
     *
     * @return  self
     */ 
    public function setListOfEnq($listOfEnq)
    {
        $this->listOfEnq = $listOfEnq;

        return $this;
    }

    /**
     * Get the value of customerCode
     */ 
    public function getCustomerCode()
    {
        return $this->customerCode;
    }

    /**
     * Set the value of customerCode
     *
     * @return  self
     */ 
    public function setCustomerCode($customerCode)
    {
        $this->customerCode = $customerCode;

        return $this;
    }

    public function gettotalAmt()
    {
        return $this->TotalAmt;
    }

    /**
     * Set the value of customerCode
     *
     * @return  self
     */ 
    public function settotalAmt($totalAmt)
    {
        $this->TotalAmt= $totalAmt;

        return $this;
    }

    public function getpendingAmt()
    {
        return $this->PendingAmt;
    }

    /**
     * Set the value of customerCode
     *
     * @return  self
     */ 
    public function setpendingAmt($pendingAmt)
    {
        $this->PendingAmt= $pendingAmt;

        return $this;
    }

    public function getpaidAmt()
    {
        return $this->PaidAmt;
    }

    /**
     * Set the value of customerCode
     *
     * @return  self
     */ 
    public function setpaidAmt($paidAmt)
    {
        $this->PaidAmt= $paidAmt;

        return $this;
    }


    /**
     * Get the value of isQuoteGenerated
     */ 
    public function getIsQuoteGenerated()
    {
        return $this->isQuoteGenerated;
    }

    /**
     * Set the value of isQuoteGenerated
     *
     * @return  self
     */ 
    public function setIsQuoteGenerated($isQuoteGenerated)
    {
        $this->isQuoteGenerated = $isQuoteGenerated;

        return $this;
    }
}
