<html>
   <head>
   <title> Shopping Cart answer</title>
   </head>
   <body>
      
   <H3>
   <HR>
    Attempting to add to your shopping cart..
   <HR>
   </H3>
   <P> 
   <UL>
      
   <?php
      
   $conn = mysqli_connect("", "", "");
      
   if (mysqli_connect_errno())            # -----------  check connection error
   {      
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit(1);
   }      
      
   if ( ! mysqli_select_db($conn, "bookstore") )          # Select DB
   {      
      printf("Error: %s\n", mysqli_error($conn));
      exit(1);
   }      
        
   $email = $_POST['email'];
   $shop = $_POST['shopping'];
   $isbn = $_POST['isbn'];

	$query1 = "select * from customer where email='$email'; ";
	$query2 = "select * from book where ISBN='$isbn'; ";
	$query3 = "select * from shopping_cart where cartSequence='$shop' and cEmail='$email'; ";
 

   // santitize the inputs here      
   if ( ! ( $result1 = mysqli_query($conn, $query1)) )      # Execute query
   {      
      printf("Error: %s\n", mysqli_error($conn));
      exit(1);
   }     
   
  if ( ! ( $result2 = mysqli_query($conn, $query2)) )      # Execute query
   {      
      printf("Error: %s\n", mysqli_error($conn));
      exit(1);
   }     
  if ( ! ( $result3 = mysqli_query($conn, $query3)) )      # Execute query
   {      
      printf("Error: %s\n", mysqli_error($conn));
      exit(1);
   }     

  if (mysqli_num_rows($result1) == 0) { printf("Sorry, looks like you are not a user! Please input the correct email address!" ); break;}
  if (mysqli_num_rows($result2) == 0) { printf("Sorry, looks like that book is not carried in our bookstore!"); break;}
  if (mysqli_num_rows($result3) == 0) { 
	//have to add shopping cart now
    $shop_query = "insert into shopping_cart VALUES('$email', '$shop'); ";
    $shop_result = mysqli_query($conn, $shop_query);
    mysqli_free_result($shop_result);
    printf("Added a new shopping cart to your email account. New id is $shop");
    echo "<br>";
   }
     

   $main = "insert into item_cart values('$email', '$shop', '$isbn');"; 
   if ( ! ( $main_result = mysqli_query($conn, $main)) )      # Execute query
   { printf("Error: %s\n", mysqli_error($conn)); exit(1); }     
   else { printf("Success! Item was added to your shopping cart!"); }
   
   mysqli_free_result($result1);
   mysqli_free_result($result2);
   mysqli_free_result($result3);
   mysqli_free_result($main);
   mysqli_close($conn);

   ?>     
      
   </UL>
   <P> 
   <HR>
   <HR>
   <HR>
   <HR>
