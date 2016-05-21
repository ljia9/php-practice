<html>
<head>
<title> Bookstore Home</title>
</head>
<body>
     
<H3>
<HR>
Welcome to the Bookstore Database! Here are our selections 
<HR>
</H3>
<P> 
<UL>

<?php
	// Check connection 
	$con = mysqli_connect("","","","");  //enter in the passwords and whatnot

	if (mysqli_connect_errno()) {
           printf("Connect failed: %s\n", mysqli_connect_error());
           exit(1);
	}

	//Send MySQL command to resort the table by date/time
	$query = "select book.ISBN, title, year, publiName, price from book;";
	$result = mysqli_query($con, $query);

	if ( ! ( $result = mysqli_query($con, $query)) )      # Execute query
	{  printf("Error: %s\n", mysqli_error($con));
	   exit(1);
	}
    
    $query1 = "select book.ISBN, name from book, author, author_book where author_book.aID=author.aID and book.ISBN=author_book.ISBN;";
	$result1 = mysqli_query($con, $query1);

	if ( ! ( $result1 = mysqli_query($con, $query1)) )      # Execute query
	{  printf("Error: %s\n", mysqli_error($con));
	   exit(1);
	}

    $hash = array();
    $isbn;
    $name;
	while ( $row = mysqli_fetch_assoc( $result1 ) )
	{         
	   foreach ($row as $key => $value)
       {
        if ($key == "ISBN") { $isbn = $value; }
        else { $name = $value; }

        if (array_key_exists($isbn, $hash) ) {
            $str = $hash[$isbn] . " $name";
            $hash[$isbn] = $str;
        }       
        else { $hash[$isbn] = $name;}
        $name = "";
	   }         
	}         
    
	print("<P>\n");       
	print("<UL>\n");    
	print("<TABLE bgcolor=\"lightyellow\" BORDER=\"5\">\n");
	print("<tr>");
	print("<th>ISBN</th>");
	print("<th>Book Title</th>");
	print("<th>Year</th>");
	print("<th>Publisher</th>");
	print("<th>Price</th>");
	print("<th>Author</th>");
	print("</tr>\n");

    $isbn = "";
	while ( $row = mysqli_fetch_assoc( $result ) )
	{         
        print("<TR>\n");     # Start row of HTML table
        $isbn = $row[0];
	   foreach ($row as $key => $value)
	   {         
        if ($key == "ISBN") { $isbn = $value; }
	    print ("<TD>" . $value . "</TD>");         # One item in row
	   }         
	   print ("<TD>" . $hash[$isbn] . "</TD>");         # One item in row
	   print ("</TR>\n");   # End row of HTML table
	}         

	mysqli_free_result($result);
	mysqli_close($conn);
?>

</UL>
<P> 
<HR>
<HR>
</body>
</html>

