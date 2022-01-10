<?php

require_once('./../serveronly/BasicAutoloader.php');
$document = new StartsiteDocument();
print $document->__toString();
