<?php
require 'vendor/autoload.php';

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();
$content="UniqueId:".$_GET['uid'];
echo $generator->getBarcode($content, $generator::TYPE_CODE_128);


 ?>
