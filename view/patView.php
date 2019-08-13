<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"
  xmlns:th="http://www.thymeleaf.org">
<head>
  <title>Pat On the back Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php
  include_once("view/headerInfo.php");
?>

<div class="container">
  <div class="jumbotron">
    <div class="page-header">
      <legend><h3>Give pat on the back to others</h3></legend>
      <p class="well well-sm">You can give Pat on the back to others, who has helped you or the team to achive something significant.</p> 
    </div>
    <a href="view/rules.php" target="_blank" ><button type="submit" class="btn btn-success">rules</button></a>
  </div>
  <form class="form-horizontal" method="post">
  <fieldset>

  <p>
         <label>Select Category</label>
         <select id = "myList" name = "category">
           <option value = "Pat on the back">Pat on The back</option>
           <option value = "Outstanding performer">Outstanding Performer</option>
           <option value = "Champion of quikr">Champion Of Quikr</option>
         </select>
  </p>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="email">Receipent Email</label>  
    <div class="col-md-4">
    <input id="email" name="email" type="email" placeholder="email" class="form-control input-md" required="">
      
    </div>
  </div>


      


  <!-- Textarea -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="desc">Salutation</label>
    <div class="col-md-6">                     
      <textarea class="form-control" id="desc" name="desc">Tell why you want to give Pat on the back to the recipient.</textarea>
    </div>
  </div>

  <!-- Button -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="submitBtn"></label>
    <div class="col-md-4">
      <button id="submitBtn" name="submitBtn" class="btn btn-success" type="submit">Submit</button>
    </div>
  </div>

  </fieldset>
  </form>

</div>
</body>
</html>
