<?
if(isset($_GET['qr']) && !empty($_GET['qr'])){
$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>26, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "=PROPERTY_CML2_TRAITS"=>$_GET['qr']), false, false, Array("ID", "NAME", "DETAIL_PAGE_URL"));
while($ob = $res->GetNext())
{
    LocalRedirect("/catalog/" . $ob['DETAIL_PAGE_URL']);
}
}
?>
