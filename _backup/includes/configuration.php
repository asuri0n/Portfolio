<?php
	error_reporting(-1);
  	ini_set('display_errors','On');
	mb_internal_encoding('UTF-8');
	date_default_timezone_set("Europe/Paris");

    define("WEB_TITLE", "NathanChevalier™ Photography");

	/*
	 * DATABASE
	 */
	define("HOST", "localhost");
	define("USER", "nathan"); 
	define("PASSWORD", "bsdBH249");
	define("DATABASE", "nathanchevalier");
	 
	define("CAN_REGISTER", "any");
	define("DEFAULT_ROLE", "member");
	 
	define("SECURE", FALSE);

	/*
	 * DATABASE
	 */
	require_once ('SPDO.php');
	$pdo = SPDO::getInstance();