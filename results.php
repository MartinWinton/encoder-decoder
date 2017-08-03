
<html>


<style>
@import
	url(https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic)
	;

* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-font-smoothing: antialiased;
	-moz-font-smoothing: antialiased;
	-o-font-smoothing: antialiased;
	font-smoothing: antialiased;
	text-rendering: optimizeLegibility;
}

body {
	font-family: "Roboto", Helvetica, Arial, sans-serif;
	font-weight: 20;
	font-size: 10px;
	line-height: 30px;
	color: "black";
	background: #4CAF50;
}

.container {
	max-width: 8000px;
	max-height: 1000px;
	width: 100%;
	margin: 0 auto;
	position: relative;
}

#contact input[type="text"],#contact input[type="email"],#contact input[type="tel"],#contact input[type="url"],#contact textarea,#contact button[type="submit"]
	{
	font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
	background: #F9F9F9;
	padding: 25px;
	margin: 150px 0;
	box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0
		rgba(0, 0, 0, 0.24);
}

#contact h3 {
	display: block;
	font-size: 12px;
	font-weight: 300;
	margin-bottom: 10px;
}

#contact h4 {
	margin: 5px 0 15px;
	display: block;
	font-size: 12px;
	font-weight: 400;
}

fieldset {
	border: medium none !important;
	margin: 0 0 10px;
	min-width: 100%;
	padding: 0;
	width: 100%;
}

#contact input[type="text"],#contact input[type="email"],#contact input[type="tel"],#contact input[type="url"],#contact textarea
	{
	width: 100%;
	border: 1px solid #ccc;
	background: #FFF;
	margin: 0 0 5px;
	padding: 10px;
}

#contact input[type="text"]:hover,#contact input[type="email"]:hover,#contact input[type="tel"]:hover,#contact input[type="url"]:hover,#contact textarea:hover
	{
	-webkit-transition: border-color 0.3s ease-in-out;
	-moz-transition: border-color 0.3s ease-in-out;
	transition: border-color 0.3s ease-in-out;
	border: 1px solid #aaa;
}

#contact textarea {
	height: 100px;
	max-width: 100%;
	resize: none;
}

#contact button[type="submit"] {
	cursor: pointer;
	width: 100%;
	border: none;
	background: #4CAF50;
	color: #FFF;
	margin: 0 0 5px;
	padding: 10px;
	font-size: 15px;
}

#contact button[type="submit"]:hover {
	background: #43A047;
	-webkit-transition: background 0.3s ease-in-out;
	-moz-transition: background 0.3s ease-in-out;
	transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
	box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
	text-align: center;
}

#contact input:focus,#contact textarea:focus {
	outline: 0;
	border: 1px solid #aaa;
}

::-webkit-input-placeholder {
	color: #888;
}

:-moz-placeholder {
	color: #888;
}

::-moz-placeholder {
	color: #888;
}

:-ms-input-placeholder {
	color: #888;
}
</style>



<body>

	<?php 




	$error= '';
	$string = $_POST["string"];
	$string = preg_replace('/\s+/','',$string);
	$choice = $_POST["choice"];

	if($choice == "Blank"){









		if (preg_match('/[^01]/', $string)==0){








			$e_string=decodeBin($string);







			$error = "Your string was in binary. Here is the decoding:<br>" ;


		}



		elseif (preg_match('/^([A-Fa-f0-9]{2})*$/', $string)){




			$e_string =  pack('H*', $string);



			$error ="Your string was in hex. Here is the decoding:<br>" ;


		}
			

			







		elseif (preg_match('/^(([a-zA-Z0-9\+]{4})|([a-zA-Z0-9\+]{3}=)|([a-zA-Z0-9\+]{2}==)|([a-zA-Z0-9\+]{1}===))*$/', $string)){

			$e_string = base64_decode($string);

			$error="Your string was in base64. Here is the decoding:<br>" ;



		}





			




		elseif(preg_match('/.+/', $string)){

			$error = "Do you want to encode this? Click back to choose type of encoding<br>";
		}





		else{

			echo "Do you want to encodFAILREoose type of encoding<br>";
		}




		$e_string = htmlentities($e_string);


	}




	elseif ($choice!= "Blank"){

		if ($choice == "Encode64"){

			$e_string = base64_encode($string);

		}




		elseif($choice == "EncodeHex"){

			$e_string = array_shift( unpack('H*', $string) );
		}




		elseif($choice == "Encode10"){
			$e_string =  unpack('H*', $string);
			$chunks = str_split($e_string[1], 2);
			$ret = '';

			foreach ($chunks as $chunk)
			{
				$temp = base_convert($chunk, 16, 2);
				$ret .= str_repeat("0", 8 - strlen($temp)) . $temp;
			}

			$e_string = $ret;


		}



		elseif ($choice == "Decode64"){



			if (preg_match('/^(([a-zA-Z0-9\+]{4})|([a-zA-Z0-9\+]{3}=)|([a-zA-Z0-9\+]{2}==)|([a-zA-Z0-9\+]{1}===))*$/', $string)){

				$e_string = base64_decode($string);



			}


			else{

				$error="Error: Not in base64. Please convert to base64<br>";
			}

		}




		elseif($choice == "DecodeHex"){





			if (preg_match('/^([A-Fa-f0-9]{2})*$/', $string)){



				//$e_string =  pack('H*', $string);

				$e_string = '';

				for ($i=0; $i< strlen($string)-1; $i+=2){
		
					$e_string .= chr(hexdec($string[$i].$string[$i+1]));
				}

					
					

					
			}

			else{
				$error= "Error: not in Hexadecimal. Please convert to hexadecimal<br>";
			}



		}



		elseif($choice == "Decode10"){



			if (preg_match('/[^01]/', $string)==0){


			$e_string=decodeBin($string);
		
		
		
		




			}



			else{

				$error="ERROR: String is not in binary. Please only use 0's and 1's<br>";


			}




		}








		else{
			$e_string = "no";

		}

		$e_string = htmlentities($e_string);




	}
	
	
	
	
	

	function decodeBin($string)
	{


		$chars = explode( "\n", chunk_split( str_replace( "\n", '', $string ), 8 ) );
		$char_count = count( $chars );

		for( $i = 0; $i < $char_count; $e_string .= chr( bindec( $chars[$i] ) ), $i++ );
		
		return $e_string;






	}


	?>







	<div class="container">
		<form id="contact" action="" method="post">
			<?php echo "<h4>$error</h4>";?>
			<?php echo "<h3>$e_string</h3>";?>



		</form>
	</div>







</body>
</html>


