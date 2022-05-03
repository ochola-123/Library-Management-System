<?php
    include "connection.php";
    include "navbar.php";
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Books</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
        .srch
            {
                padding-left: 1200px;
            }

 body {
    background-color: #08c;
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: orange;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle 
{
    margin-left: 20px;
}
.h:hover 
{
    color: white;
    width: 300px;
    height: 50px;
    background-color: blue;
}
.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control 
{
    background-color: #080707;
    color: white;
}

        </style>
    </head>

    <body>
<!----------------------------sidenav----------------------->


<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

     <div style="color: white; margin-left: 60px; font-size: 20px;">
        <?php
        if(isset($_SESSION['login_user']))
         { 
            echo "<img class='img-circle profile_img' height=120 width=120 src='images/p.jpg'>";
            echo"</br></br>";
            echo "Welcome".$_SESSION['login_user'];
         }
         ?>
     </div><br><br>

  <div class="h" ><a href="add.php">Add Books</a></div>
  <div class="h" ><a href="delete.php">Delete Books</a></div>
  <div class="h" ><a href="#">Book requests</a></div>
  <div class="h" ><a href="#">Issue Information</a></div>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
  </div>
<div class="container">
<h2 style="color: black; font-family: Lucida Console; text-align: center;"><b>Add New Books</b></h2>
<form class="book" action="" method="post" style="text-align: center;">
         <input type="text" name="book_id" class="form-control" placeholder="Book ID" required=""><br>
         <input type="text" name="title" class="form-control" placeholder="Title" required=""><br>
         <input type="text" name="category" class="form-control" placeholder="Category" required=""><br>
         <input type="text" name="author" class="form-control" placeholder="Author" required=""><br>
         <input type="text" name="book_copies" class="form-control" placeholder="Book Copies" required=""><br>
         <input type="text" name="publisher" class="form-control" placeholder="Publisher" required=""><br>
         <input type="text" name="isbn" class="form-control" placeholder="ISBN" required=""><br>
         <input type="text" name="copyright_year" class="form-control" placeholder="Copyright Year" required=""><br>
         <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
         <button class="btn btn-default" type="submit" name="submit">ADD</button>
         

</form>
</div>
<?php
    if(isset($_POST['submit']))
    {
        if(isset($_SESSION['login_user']))
        {
            mysqli_query($db,"INSERT INTO books VALUES ('$_POST[book_id]', '$_POST[title]', '$_POST[category]', '$_POST[author]', '$_POST[book_copies]', '$_POST[publisher]', '$_POST[isbn]', '$_POST[copyright_year]', '$_POST[status]') ;");
            ?>
                <script type="text/javascript">
                 alert("Book Added Successfully.");
                 </script>

            <?php
        }
        else
        {
           ?>
                <script type="text/javascript">
                alert("You need to login first.");
                </script>
            <?php
        }
    }


?>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#08C";
}
</script>
</body>