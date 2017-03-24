<?php

require_once('./../serveronly/autoload.php');
$document = new StartsiteDocument();
print $document->__toString();
