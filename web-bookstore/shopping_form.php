<!DOCTYPE HTML>
<html> 
<head> 
    <title> Shopping Cart</title>
</head>
<body>
	<H3>
	<HR>
	Add Items to shopping cart by filling out form below
	<HR>
	</H3>

   <form name="myForm" form action="http://~ljia9/shopping_add.php"
   onsubmit = "return validateForm()"
   method="POST">
   <p>
   Email Address:
   <P>
   <TEXTAREA name="email" rows="8" cols="60" required></TEXTAREA>
   
   <p>
   Shopping Cart number:
   <P>
   <TEXTAREA name="shopping" rows="8" cols="60" required></TEXTAREA>
      
   <p>
   Book's ISBN:
   <P>
   <TEXTAREA name="isbn" rows="8" cols="60" required></TEXTAREA>
   
   
   <p> Press to execute query: <input type="submit" value="Send">
   <p> Press to clear input: <input type="reset">
   </form>
</body>
</html>
