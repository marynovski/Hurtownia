<?php
include_once("../php/PageLoader.class.php");

PageLoader::ModuleLoader("html_start");
PageLoader::ModuleLoader("nav");
PageLoader::ModuleLoader("clients");
PageLoader::ModuleLoader("footer");
PageLoader::ModuleLoader("html_end");

?>