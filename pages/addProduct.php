<?php

include_once("../php/PageLoader.class.php");

PageLoader::ModuleLoader("html_start");
PageLoader::ModuleLoader("header");
PageLoader::ModuleLoader("nav");
PageLoader::ModuleLoader("addProduct");
PageLoader::ModuleLoader("footer");
PageLoader::ModuleLoader("html_end");

?>