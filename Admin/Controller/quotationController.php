<?php
 header('Content-Type: application/json');
require "../Model/quotationModel.php";
require "../Utilities/Sanitization.php";
include "../DB Operations/quotationOps.php";
require_once "../DB Operations/lineItemOps.php";
require_once "../Model/quoteLineItemModel.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['obj'])){
                $value=$_POST['obj'];

                $quotation=new Quotation();
                $quotation->set_enqId(Sanitization::test_input($value[0]['enqId']));
                $quotation->setCatId(Sanitization::test_input($value[0]['enqCategory']));
                $quotation->set_customerId(Sanitization::test_input($value[0]['customerId']));
                $quotation->set_quoteType(Sanitization::test_input($value[0]['quoteType']));
                $quotation->set_quoteStatus(Sanitization::test_input('pending'));
                $quotation->set_createdby(Sanitization::test_input($value[0]['createdby']));
                $quotation->set_modifiedby(Sanitization::test_input($value[0]['createdby']));
                $quotation->setQuoteValue(Sanitization::test_input($value[0]['QuoteAmount']));
                error_log($quotation->getQuoteValue());
                $customerCode=Sanitization::test_input($value[0]['customerCode']);
                $createdby=$quotation->get_createdby();
                $codes = preg_split("/-/",$customerCode);
                $quoteCode=$codes[2];
                $QuoteFor=Sanitization::test_input($value[0]['encatName']);
                $words = preg_split("/\s+/",$QuoteFor);
                $acronym = "";
                foreach($words as $w){
                  $acronym .= $w[0];
                }
                $quoteCode.='-'.$acronym;
                $quotation->setQuoteCode($quoteCode);
                error_log($quoteCode);
                $quoteId=DBQuotation::insert($quotation);
                foreach($value AS $key=>$value){
                        $lineItem=new lineItem();
                        $lineItem->set_quoteId($quoteId);
                        $lineItem->set_itemcatid($value['itemCategory']);
                        $lineItem->set_itemsubcatid($value['itemsubCategory']);
                        $lineItem->set_itemid(Sanitization::test_input($value['itemid']));
                        $lineItem->set_itemquantity(Sanitization::test_input($value['itemquantity']));
                        $lineItem->set_ppMRP(Sanitization::test_input($value['itemppMRP']));
                        $lineItem->set_totalAmount(Sanitization::test_input($value['totalAmount']));
                        $lineItem->set_discount1(Sanitization::test_input($value['discount1']));
                        $lineItem->set_discount2(Sanitization::test_input($value['discount2']));
                        $lineItem->set_discountAmount1(Sanitization::test_input($value['discountAmount1']));
                        $lineItem->set_discountAmount2(Sanitization::test_input($value['discountAmount2']));
                        $lineItem->set_GSTAmt(Sanitization::test_input($value['GSTAmount']));
                        $lineItem->set_GST(Sanitization::test_input($value['GST']));
                        $lineItem->set_totalPrice(Sanitization::test_input($value['totalPrice']));
                        $lineItem->set_createdby(Sanitization::test_input($createdby));
                        $lineItem->set_modifiedby(Sanitization::test_input($createdby));
                        DBLineItem::insert($lineItem);
                }
         
        } else if(isset($_POST['quoteid'])){
                $quotation=new Quotation();
                $quotation->set_quoteId($_POST['quoteid']);
                $quotation->setUnitId(Sanitization::test_input($_POST['unit']));
                $quotation->setQuantity(Sanitization::test_input($_POST['quantity']));
                $quotation->setQuoteValue(Sanitization::test_input($_POST['QuoteAmount']));
                $quotation->set_quoteType(Sanitization::test_input($_POST['quoteType']));
                $quotation->set_quoteStatus(Sanitization::test_input($_POST['quoteStatus']));
                $quotation->set_quoteDescription(Sanitization::test_input($_POST['quoteDescription']));
                $quotation->set_quoteComments(Sanitization::test_input($_POST['quoteComments']));
                $quotation->set_modifiedby(Sanitization::test_input($_POST['modifiedby']));   
                DBQuotation::update($quotation);
        } else if ($_POST["action"] == 'delete'){

                DBQuotation:: delete($_POST['id']);
        }
        header("location:../View/quotationView.php");
}

?>