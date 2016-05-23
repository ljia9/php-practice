<!-- FileName: Snake.php
 * This file and project was based on code write by Pratibha Natani
 -->
<html>
	<head>
	  <link rel="stylesheet" type="text/css" href="Snake.css">
	</head>
	
	<?php 
	  //form parameters captured
	  $BoardSize = $_POST['BoardSize'];
	  $BoardSizex =substr($BoardSize, 0, 3);
	  $BoardSizey =substr($BoardSize, 6, 3);
	  $Pace= $_POST['SnakePace'];
	  if($Pace=="Slow")
	     $SnakePace=150;
	  else if($Pace=="Medium")
	     $SnakePace=100;
	  else if($Pace=="Fast")
	     $SnakePace=70;
	  else if($Pace=="Japan")
	     $SnakePace=25;
	  $Goals= $_POST['Goals'];
	?>
 

 <body>
  <label type="text" id='scoreLabel'>Score: </label>
  <input type='text' id='scoreText' value='0'></input> 
  <div id="Board">
	<img src="snake.png" id="snake0" />
	<img src="snake.png" id="snake1" />
    <img src="snake.png" id="snake2" />
	
  </div>
   
  </body>

<?php

	$moveOne = true;
	$snakeDead = false;
	//for setting Game Score
	$Score=0;
	$snakePart = 2;
	
	
?>
