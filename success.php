<?php
// as a part of SuccessURL script

// your registration data
//$mrh_pass1 = "securepass1";  // merchant pass1 here

// HTTP parameters:
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);  // force uppercase

// build own CRC
$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass1"));

if ($my_crc != $crc)
{
echo "bad sign\n";
exit();
}

// you can check here, that resultURL was called
// (for better security)

// OK, payment proceeds
echo "Thank you for using our service\n";
?>