<?php

$a 	=	"SELECT
		count( DISTINCT productmaster.ProductID ) 
		FROM productmaster JOIN subproduct 
		WHERE productmaster.ProductID = subproduct.ProductID 
		AND productmaster.Enabled='1' 
		AND `".$category."` != 'NULL' 
		AND `".$key."`='".$value."'";
foreach ($list as $key => $value) {
    if ($value!=NULL&&$key!=$category) {
        $sql  .= "`".$key."`='".$value."' AND ";
    }
}



select DISTINCT `".$category."` FROM productmaster JOIN subproduct WHERE productmaster.ProductID = subproduct.ProductID AND productmaster.Enabled='1' ORDER BY `".$category."`


SELECT views FROM productmaster WHERE ProductID=".$id


UPDATE productmaster SET views= ".$views." WHERE ProductID=".$id


SELECT SubProductID, Quantity FROM cart WHERE CustomerID='".$_SESSION['CustomerID']."'


DELETE FROM wishlist WHERE CustomerID='".$_SESSION['CustomerID']."' AND SubProductID='".$key."'


UPDATE cart SET Quantity=".$value." WHERE CustomerID='".$_SESSION['CustomerID']."' AND SubProductID='".$key."'


INSERT INTO cart(`CustomerID`, `SubProductID`, `Quantity`) VALUES (".$_SESSION['CustomerID'].",".$key.",".$value.")

UPDATE customer SET CustAddress='$address', CustCity='$city', CustState='$state', CustMobile='$mobile', CustPostalCode='$pin' WHERE CustomerID=".$_SESSION['CustomerID']


INSERT INTO `customise`(`customiseorderid`,`customerid`,`productname`,`timestamp`,`folderpath`,`count`,`price`,`quantity`,`color1`,`color2`,`color3`,`name`,`namevalue`,`nameposition`,`flag`,`flagvalue`,`flagposition`,`url`,`urlvalue`,`urlposition`,`logo1`,`logo1position`,`logo1fullname`,`logo2`, `logo2position`, `logo2fullname`,`logo3`,`logo3position`,`logo3fullname`,`logo4`, `logo4position`, `logo4fullname`,`logo5`,`logo5position`,`logo5fullname`,`logo6`,`logo6position`,`logo6fullname`,`logo7`,`logo7position`,`logo7fullname`,`logo8`,`logo8position`,`logo8fullname`) VALUES ( NULL,'".$_SESSION['CustomerID']."','".$productname."',NOW(),'ghdh','".$count."','".$price."','".$quantity."','".$color1."',    '".$color2."',   '".$color3."','".$nameb."','".$namevalue."','".$nameposition."','".$flagb."','".$flagvalue."','".$flagposition."','".$urlb."','".$urlvalue."','".$urlposition."','".$logo1b."','".$logo1position."','".$logo1fullname."','".$logo2b."','".$logo2position."','".$logo2fullname."','".$logo3b."','".$logo3position."','".$logo3fullname."','".$logo4b."','".$logo4position."','".$logo4fullname."','".$logo5b."','".$logo5position."','".$logo5fullname."','".$logo6b."','".$logo6position."','".$logo6fullname."','".$logo7b."','".$logo7position."','".$logo7fullname."','".$logo8b."','".$logo8position."','".$logo8fullname."')


ALTER TABLE `customise`\n"."auto_increment = ".$_SESSION['orderid']


SELECT ImageFolderLInk, ProductName, Rating, MRP, SP, ProductID, Brand FROM productmaster WHERE latest='1' AND Enabled='1' ORDER BY RAND() LIMIT 5"

