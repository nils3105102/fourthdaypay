<?php
// your registration data
$mrh_pass2 = "securepass2";   // merchant pass2 here

// HTTP parameters:
$out_summ = $_REQUEST["OutSum"];
$inv_id = $_REQUEST["InvId"];
$crc = strtoupper($_REQUEST["SignatureValue"]);

// build own CRC
$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));

if ($my_crc != $crc)
{
    echo "bad sign\n";
    exit();
}

// print OK signature
echo "OK$inv_id\n";

// perform some action (change order state to paid)
?>