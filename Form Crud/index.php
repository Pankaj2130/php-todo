<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./style.css">
  
  <script src="./script.js"></script>


<?php 
include 'dataPost.php';
?>

</head>

<body>

  <h1>Add Customer name</h1>
  <div class="container">
    <div class="mainContainer">
      <form action="hello.php" method="post" id="form">

        <label for="name" id="txt">Enter Your Name</label>
        <br/>
        <p id="message"></p>
        <input type="text" class="input" id="InputVal" placeholder="Enter name...">
        <br /><br />
        <input class="btn" id="btn1" onclick="Save()" type="button" value="Add">
      </form>
      <div class="table">
        <table id="Table">
        </table>
        <div id="syncBtn">
          <!-- <input type="button" value="Sync Records"> -->
        </div>
      </div>
    </div>
  </div>
</body>
</html>

