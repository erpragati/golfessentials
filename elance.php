<?php
/**
*	Function to retrieve all the node names and their contents of an XML file.
*/
function ReadXml($xmlstr)
{
	static $res = '';
	$xml = new SimpleXMLElement($xmlstr);

	if(count($xml->children())){		#	If the current node has any children, then proceed
	     $res .= "<b>".$xml->getName().PHP_EOL."</b><br>";

     	foreach($xml->children() as $child){
	          ReadXml($child->asXML());
     	}
	} else {
     	$res .= ucfirst($xml->getName()).'&nbsp;: '.(string)$xml.PHP_EOL."<br>";
	}

	return $res;
}
$xmstr= '<Address><to>James</to><from><first>Dilbar</first><last>Jani</last></from><heading>Reminder</heading><body>Please check your mail.</body></Address>';
echo ReadXml($xmstr);