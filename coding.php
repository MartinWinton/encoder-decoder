
<html>




<head>
</head>


<style>


@import "compass/css3";

@import url(https://fonts.googleapis.com/css?family=Merriweather);
$red: #e74c3c;



*, 
*:before, 
*:after {
   @include box-sizing(border-box); 
}


html, body {
  background: #f1f1f1;
  font-family: 'Merriweather', sans-serif;
  padding: 1em;
}



h1 {
   text-align: center;
   color: #a8a8a8;
   @include text-shadow(1px 1px 0 rgba(white, 1));
}


form {
   max-width: 600px;
   text-align: center;
   margin: 20px auto;
  
  input, textarea,select, option {
     border:1; outline:1;
     padding: 1em;
     @include border-radius(8px);
     display: block;
     width: 150%;
     margin-top: 1em;
     font-family: 'Merriweather', sans-serif;
     @include box-shadow(0 1px 1px rgba(black, 0.1));
     resize: none;
    
    &:focus {
       @include box-shadow(0 0px 2px rgba($red, 1)!important);
    }
  }
  
  #input-submit {
     color: red; 
     background: $red;
     cursor: pointer;
    
    &:hover {
       @include box-shadow(0 1px 1px 1px rgba(#aaa, 0.6)); 
    }
  }


   textarea {
      height: 300px;
  }
}


.half {
  float: left;
  width: 48%;
  margin-bottom: 1em;
}

.right { width: 50%; }

.left {
     margin-right: 2%; 
}


@media (max-width: 480px) {
  .half {
     width: 100%; 
     float: none;
     margin-bottom: 0; 
  }
}


/* Clearfix */
.cf:before,
.cf:after {
    content: " "; /* 1 */
    display: table; /* 2 */
}

.cf:after {
    clear: both;
}
  
</style>





<body>  


<h1>Welcome to Encoder-Ville</h1>
<form class="cf"  method="post" action="results.php">
 

    
    <select name = "choice">
    <option value = "Blank" selected = "selected"></option>
    <option value="Encode64">Encode using Base64</option>
	<option value="Encode10">Encode using Binary</option>
	<option value="EncodeHex">Encode using Hexadecimal</option>
    <option value="Decode64">Decode using Base64</option>
	<option value="Decode10">Decode using Binary</option>
	<option value="DecodeHex">Decode using Hexadecimal</option>
	
    
    
 
  <div class="half right cf">
    <textarea name="string" type="text" id="input-message" placeholder="Message"></textarea>
  </div>  
  <input type="submit" value="Submit" id="input-submit">
</form>



</body>
</html>

