<?php
/**
 * This file contains the entries of your system 
 * that wiil be tested using the fuzzer
 * The cofiguration data needed  are:
 * 1) URL of your system, 
 * 2) entries: each entry consists of 
 * 		1) name
 * 		2) URI
 * 		3) method GET or POST
 * 		4) parameters of the request & type of each parameter
 * 		5) number of tries ( the number of requests that will be sent )
 */
 return [
 	"URL" => "http://localhost/opencart_07/",// example.com
 	"entries" => [
 		// [
 		// 	"name" => "myentry",
 		// 	"URI" => "/",
 		// 	"method" => "",// GET, POST
 		// 	"parms" => 
 		// 	[
 		// 		"parm1" => "string_20",//string lenght of 20
 		// 		"parm2" => "email",
 		// 		"parm3" => "int_4"//int with 4 digits length
 		// 	],
 		// 	"num_of_tries" => "100"// Number of generated requests

 		// ],
 		[
 			"name" => "login",
 			"URI" => "index.php?route=account/login",
 			"method" => "POST",
 			"parms" => 
 			[
 				"email" => "email",
 				"password" => "string_8"
 			],
 			"num_of_tries" => "5"

 		],
 		[
 			"name" => "product",
 			"URI" => "index.php?route=product/product&",
 			"method" => "GET",
 			"parms" => 
 			[
 				"product_id" => "string_2"
 			],
 			"num_of_tries" => "50"

 		]
 	]


 ];

