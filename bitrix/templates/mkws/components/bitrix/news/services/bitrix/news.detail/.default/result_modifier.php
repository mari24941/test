<?

if($arResult['PROPERTIES']['PROFESSIONAL']['VALUE']):
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT');
    $arFilter = Array( "IBLOCK_ID"=>9,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['PROFESSIONAL']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $profi=array();

    while($ob = $res->GetNextElement())
    {

        $profi[$ob->GetFields()['ID']] = $ob->GetFields();
    }

    $arResult['PROPERTIES']['PROFESSIONAL']['VALUE'] = $profi;
    endif;

if($arResult['PROPERTIES']['PROGRESS']['VALUE']):

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE');
    $arFilter = Array( "IBLOCK_ID"=>12,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['PROGRESS']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $progress=array();

    while($ob = $res->GetNextElement())
    {
        $progress[$ob->GetFields()['ID']] = $ob->GetFields();
    }

    $arResult['PROPERTIES']['PROGRESS']['VALUE'] = $progress;

endif;


if($arResult["PROPERTIES"]['PROJECTS']['VALUE']){


    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "DETAIL_PAGE_PROPERTY","PROPERTY_*","PREVIEW_PICTURE",'PREVIEW_TEXT','DETAIL_PAGE_URL');
    $arFilter = Array( "IBLOCK_ID"=>3,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['PROJECTS']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $projects=array();

    while($ob = $res->GetNextElement())
    {
        $projects[$ob->GetFields()['ID']] = $ob->GetFields();
        $projects[$ob->GetFields()['ID']]['PROPERTIES'] = $ob->GetProperties();
    }

    $arResult['PROPERTIES']['PROGRESS']['VALUE'] = $projects;


}

if($arResult['PROPERTIES']['ZMEYA_SVG']['VALUE']){
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "DETAIL_PAGE_PROPERTY","PROPERTY_*","PREVIEW_PICTURE",'PREVIEW_TEXT');
    $arFilter = Array( "IBLOCK_ID"=>11,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['ZMEYA']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $zmeya=array();

    while($ob = $res->GetNextElement())
    {
        $i = $ob->GetFields();
        $i['PROPERTIES'] =  $ob->GetProperties();
        $zmeya[] = $i;
    }

    $arResult['PROPERTIES']['ZMEYA_SVG']['VALUE'] = $zmeya;
}

if($arResult['PROPERTIES']['RESULTS']['VALUE']){
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE','DETAIL_PICTURE');
    $arFilter = Array( "IBLOCK_ID"=>15,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['RESULTS']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $results=array();

    while($ob = $res->GetNextElement())
    {
        $results[$ob->GetFields()['ID']] = $ob->GetFields();
        $results[$ob->GetFields()['ID']]["PROPERTIES"] = $ob->GetProperties();
    }

    $arResult['PROPERTIES']['RESULTS']['VALUE'] = $results;
}


if($arResult['PROPERTIES']['WORK']['VALUE']) {
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE','PROPERTIES_SVG');
    $arFilter = Array( "IBLOCK_ID"=>14,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['WORK']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $work=array();

    while($ob = $res->GetNextElement())
    {
        $work[$ob->GetFields()['ID']] = $ob->GetFields();
        $work[$ob->GetFields()['ID']]['PROPERTIES'] = $ob->GetProperties();
    }
    $arResult['PROPERTIES']['WORK']['VALUE'] = $work;

}

if($arResult['PROPERTIES']['TARIFS']['VALUE']){
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE','PROPERTY_NUMBER', 'PROPERTY_VIP', 'PROPERTY_HASHTAG','PROPERTY_IMG','PROPERTY_DESCRIPTION', 'PROPERTY_PRICE', 'PROPERTY_LINK', 'PROPERTY_COMPARE');
    $arFilter = Array( "IBLOCK_ID"=>16,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['TARIFS']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $tariffs=array();

    while($ob = $res->GetNext())
    {

        $tariffs[$ob['ID']] = $ob;
        $VALUES = array();
        $res2 = CIBlockElement::GetProperty($ob['IBLOCK_ID'],$ob['ID'], array(), array("CODE" => "COMPARE"));
        while ($ob2 = $res2->GetNext())
        {$VALUES[] = $ob2['VALUE_ENUM'];}
        $tariffs[$ob['ID']]['PROPERTY_COMPARE'] = $VALUES;

    }
    $arResult['PROPERTIES']['TARIFS']['VALUE'] = $tariffs;
}

if($arResult['PROPERTIES']['STEPS']['VALUE']) {


    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PREVIEW_PICTURE');
    $arFilter = Array( "IBLOCK_ID"=>14,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['STEPS']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $steps=array();

    while($ob = $res->GetNextElement())
    {

        $steps[] = $ob->GetFields();

    }

    $arResult['PROPERTIES']['STEPS']['VALUE'] = $steps;
}

if($arResult['PROPERTIES']['RECOMMEND']['VALUE']){

    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PROPERTY_LINK','PROPERTY_SALE');
    $arFilter = Array( "IBLOCK_ID"=>16,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['RECOMMEND']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    $recommend=array();

    while($ob = $res->GetNextElement())
    {
        $recommend[$ob->GetFields()['ID']] = $ob->GetFields();
    }
    $arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE",'PREVIEW_TEXT','PROPERTY_LINK','PROPERTY_SALE','DETAIL_PAGE_URL');
    $arFilter = Array( "IBLOCK_ID"=>10,"ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","ID"=>$arResult['PROPERTIES']['RECOMMEND']['VALUE']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);

    while($ob = $res->GetNextElement())
    {
        $recommend[$ob->GetFields()['ID']] = $ob->GetFields();
    }

    $arResult['PROPERTIES']['RECOMMEND']['VALUE'] = $recommend;
}