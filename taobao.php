<?php
$url = $_GET['url'];
$type = $_GET['type'];


if( $type === 'thumb' )
{
	$url = parse_url($url);
	parse_str($url['query'] , $url);
	$url = 'http://tbskip.taobao.com/auction/storegallery/item_xml.htm?item_id=' . $url['id'];
	$xmlstr = file_get_contents($url);
	$xmlstr = trim($xmlstr);
	$xmlstr = simplexml_load_string($xmlstr);
	$ret = array();
	foreach($xmlstr->item->images->image as $row)
	{
		$ret[] = ((string)$row->url);
	}
	exit(json_encode($ret));
}
elseif( $type === 'detail' )
{
	$html = file_get_contents($url);
	$url = parse_url($url);
	$url2 = null;
	if( strpos($url['host'],'taobao.com') !== false )
	{
		//taobao
        preg_match('/\"https:\"\s===\slocation\.protocol\s\?\s\"([^\"]+)\"/is' , $html, $preg);
		if($preg)
		{
			$url2 = $preg[1];
		} else {
            $positionStart = strpos($html, "//dsc.taobaocdn.com");
            $positionEnd = strpos($html, "' : '//desc.alicdn.com/");
            $url2 = substr($html, $positionStart, $positionEnd - $positionStart);
        }
	}
	elseif( strpos($url['host'],'tmall.com') !== false )
	{
		//taobao
		preg_match('/\"descUrl\"\:\"([^\"]+)\"/is' , $html, $preg);
		if($preg)
		{
			$url2 = $preg[1];
		}
	}
	if($url2)
	{
		$html = file_get_contents('http:'.$url2);
		preg_match_all('/<img[\s\S]+?src=\"([^\"]+)\"?/is',$html,$preg);
		if( $preg )
		{
			$ret = $preg[1];
			exit(json_encode($ret));
		}
	}
}
