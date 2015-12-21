<?php

$filesystem = new Filesystem;
$xml = $filesystem->get(base_path().'/vendor/marknl/iodef/iodef.xml');
$iodef = new Marknl\Iodef\Reader($xml);
$doc = $iodef->parse();
return Response::make(print_r($doc, true), '200')->header('Content-Type', 'text/plain');
