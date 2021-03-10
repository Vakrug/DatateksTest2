<?php

require __DIR__ . '/vendor/autoload.php';

$readerWriter = new ReaderWriter();
$readerWriter->read();
$readerWriter->write();