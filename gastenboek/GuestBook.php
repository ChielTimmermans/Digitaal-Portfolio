<!DOCTYPE html>
<html>
    <head>
        <title>QuestBook</title>
    </head>
    <body>
        <h2>Enter your name to sign our guest book</h2> 
        <form method="POST" action="SignGuestBook.php"> 
            <p>Name <input type="text" name="name" required /></p> 
            <p>Message <textarea type="text" name="bericht" required></textarea></p> 
            <p>Email <input type="email" name="email" required /></p>
            <p><input type="submit" value="Submit" /></p> 
        </form> 
        <p><a href="ShowGuestBook.php">Show Guest Book</a></p>
    </body>
</html>