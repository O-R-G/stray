<?
// path to config file
$config = $_SERVER['DOCUMENT_ROOT']."/open-records-generator/config/config.php";
require_once($config);

// specific to this 'app'
$config_dir = $root."/config/";
require_once($config_dir."url.php");
require_once($config_dir."request.php");

require_once("lib/lib.php");

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();
$rr = new Request();

// self
if($uu->id)
    $item = $oo->get($uu->id);
else
    $item = $oo->get(0);
$name = ltrim(strip_tags($item["name1"]), ".");

// document title
$item = $oo->get($uu->id);
$title = $item["name1"];
$site_name = "Stray";

if ($title)
    $title = $site_name." | ".strip_tags($title);
else
    $title = $site_name;

// query strings        ** dev **
$current_directory = dirname($_SERVER['SCRIPT_NAME']);
if($current_directory != '/')
    $current_directory .= '/';
$devhash = rand();  // to force .css reloads

?><!DOCTYPE html>
<html>
    <head>
        <title><? echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="nyc-led">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-icon" href="/media/png/apple-touch-icon.png" />
        <!-- <link rel="stylesheet" href="/static/css/relative10_pitch.css?<?= $devhash; ?>">
        <link rel="stylesheet" href="/static/css/helveticaocr.css?<?= $devhash; ?>">
        <link rel="stylesheet" href="/static/css/helveticaneuer.css?<?= $devhash; ?>">
        <link rel="stylesheet" href="/static/css/helveticaautospaced.css?<?= $devhash; ?>">
        <link rel="stylesheet" href="/static/css/nycon.css?<?= $devhash; ?>"> -->
        <link rel="stylesheet" href="<? echo $current_directory; ?>static/css/main.css?<?= $devhash; ?>">    
        <script src="https://code.createjs.com/1.0.0/soundjs.min.js"></script>
    </head>
    <body>
