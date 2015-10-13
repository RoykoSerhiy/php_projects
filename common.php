<?php

function p($x = "...")
{
	print "<div>$x</div>\n";
}
function pa($x)
{
	print( implode(',' , $x));
}
function pr($x){
	print "<pre>\n"; print_r($x); print "</pre>\n";
}
function html_table($data, $style=''){
	if(empty($data)){
		return null;
	}
	$row1 = $data[0];
	$keys = array_keys(is_array($row1) ? $row1 : get_object_vars($row1));
	
	
	
	$tabStyle = "";
	$tdStyle = "";
	if(is_string($style)){
		$tabStyle = $tdStyle = $style;
	} else {
		if(isset($style['table']))
			$tabStyle = $style['table'];
		if(isset($style['td']))
			$tdStyle = $style['td'];
	}
	$tabStyle = "style=\"".$tabStyle."\"";
	$tdStyle = "style=\"".$tdStyle."\"";
	
	$html = "<table $tabStyle>\n";
	$html .= "<tr>\n";
	foreach($keys as $key){
		$html .= "<th>$key</th>\n";
	}
	$html .= "</tr>\n";
	
	foreach($data as $i => $unit){
		$html .= "<tr>\n";
		foreach($keys as $key){
			$val = val($unit, $key);
			$html .= "<td $tdStyle>{$val}</td>\n";
		}
		$html .= "</tr>\n";
	}
	
	$html .= "</table>";
	return $html;
}
