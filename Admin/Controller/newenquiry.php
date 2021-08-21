<?php

require "../Model/enquirymodel.php";
require "../Utilities/Sanitization.php";
include "../DB Operations/enquiryOps.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['action'])) {
    if($_POST['action'] == 'delete'){
    DBenq::delete($_POST['id']);
    }
  } else {
    $enq = new Enquiry();
    $enq->set_enqname(Sanitization::test_input($_POST["name"]));
    $enq->set_enqemail(Sanitization::test_input($_POST["email"]));
    $enq->set_enqphone(Sanitization::test_input($_POST["phone"]));
    $enq->set_enqaddress(Sanitization::test_input($_POST["address"]));
    if (!empty($_POST['interest_list'])) {
      $enq->set_interestList($_POST['interest_list']);
    }
    DBenq::insert($enq);
    if(isset($_POST['isAdmin']))
    header("location: ../view/enquiry.php");
    else
    header("location: ../../enquiry.php");
  }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
}
