<?php
/**
 * Dispatcher
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Instanciate Kernel
 *  - Generate Response object
 *  - Send Http Response to web server
*/
require_once('./../vendor/autoload.php');

use Aelion\Http\Request\Request;

ini_set('display_errors', 1);
error_reporting(E_ALL^E_NOTICE);

$request = new Request();
// Via setter magic...
$request->uri = $_SERVER['REQUEST_URI'];
echo $request->uri;