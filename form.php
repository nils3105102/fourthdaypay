<?php
// регистрационная информация (Идентификатор магазина, пароль #1)
// registration info (Merchant ID, password #1)


$mrh_login = "daniil888";
$mrh_pass1 = "Aax2pnN95L";

// номер заказа
// number of order
if(isset($_POST['submit'])) {
        $inv_id = htmlspecialchars($_POST['InvId']);

// описание заказа
// order description
//$inv_desc = "Техническая документация по ROBOKASSA";

// сумма заказа
// sum of order
        $out_summ = htmlspecialchars($_POST['OutSum']);

// тип товара
// code of goods
//$shp_item = 1;

// предлагаемая валюта платежа
// default payment e-currency
//$in_curr = "BANKOCEAN2R";

// язык
// language
//$culture = "ru";

// кодировка
// encoding
        $encoding = "utf-8";

// Адрес электронной почты покупателя
// E-mail
//$Email = "test@test.ru";

// Срок действия счёта
// Expiration Date
//$ExpirationDate = "2029-01-16T12:00";

// Валюта счёта
// OutSum Currency
        $OutSumCurrency = $_POST['money'];
        $Is_test = 1;
// формирование подписи
// generate signature
        $crc = md5("$mrh_login:$out_summ:$inv_id:$OutSumCurrency:$mrh_pass1:Shp_item=$shp_item");

}
// форма оплаты товара
// payment form
print
    "<html>".
    "<form action='https://auth.robokassa.ru/Merchant/Index.aspx' method=POST>".
    "<input type=hidden name=MerchantLogin value=$mrh_login>".
    "Сумма "."<input type=text required name=OutSum value=$out_summ ><br />".
    "Номер заказа "."<input type=text required name=InvId value=$inv_id ><br />".
    "<input type=hidden name=Description value='$inv_desc'>".
    "<input type=hidden name=SignatureValue value=$crc>".
    "<input type=hidden name=Shp_item value='$shp_item'>".
    "<input type=hidden name=IncCurrLabel value=$in_curr>".
    "<input type=hidden name=Culture value=$culture>".
    "<input type=hidden name=Email value=$Email>".
    "<input type=hidden name=ExpirationDate value=$ExpirationDate>".
    "<input type=hidden name=IsTest value=$Is_test>".
    "Валюта"."<p><select name='money'>
    <option value='t1' selected>USD</option>
    <option value='t2'>EUR</option>
    <option value='t3'>KZT</option>
    <option value='t4'>WMRM</option>
   </select></p>".
    "<input type=submit name=submit value='Оплатить'>".
    "</form></html>";
?>