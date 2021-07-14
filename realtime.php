<?php
require_once "bidder.php";
require_once "items.php";

$bidders = Bidder::getTotalBidders();
$items = Item::getTotalItems();
$itemTotal = Item::getTotalPrice();
$bidTotal = Item::getTotalBids();


$doc = new DOMDocument("1.0", "utf-8");
$doc->formatOutput = true;

$auction = $doc->createElement('auction');
$auction = $doc->appendChild($auction);
$biddersE = $doc->createElement('bidders', $bidders);
$biddersE = $auction->appendChild($biddersE);
$itemsE = $doc->createElement('items', $items);
$itemsE = $auction->appendChild($itemsE);
$itemTotalE = $doc->createElement('itemTotal', $itemTotal);
$itemTotalE = $auction->appendChild($itemTotalE);
$bidTotalE = $doc->createElement('bidTotal', $bidTotal);
$bidTotalE = $auction->appendChild($bidTotalE);

$output = $doc->saveXML();
echo $output;
