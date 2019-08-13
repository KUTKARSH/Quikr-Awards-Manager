
<?php
    $obj = array("vikas@quikr.com" => [array("id"=>12,"rmail" => "ravi@quikr.com","pdate" => "21/09/18","sal"=>"hello","status"=>"0"),
    array("id"=>13,"rmail" => "karan@quikr.com","pdate" => "25/09/18","sal"=>"hello there","status"=>"1")],     
"sonia@quikr.com" =>  [array("id"=>14,"rmail" => "ravi@quikr.com","pdate" => "21/09/18","sal"=>"hello","status"=>"0"),
array("id"=>15,"rmail" => "karan@quikr.com","pdate" => "25/09/18","sal"=>"hello there","status"=>"2")],
"rahul.sharma@quikr.com" => [array("id"=>16,"rmail"=>"harish@quikr.com","pdate"=>"20/09/18","sal"=>"Excellent coder","status"=>"2")]
);
?>

<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Task & Feedback portal</title>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>


<script type='text/javascript'>
       //alert("hello");
       $(document).ready(function(){

        });
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
.spacer5 {
  height: 5px;
  margin: 5px 5px 40px 5px;
}
</style>
</head>
<body>
<?php
  include_once("view/headerInfo.php");
?>

<div class="container">

  <div class="jumbotron">
      <div class="page-header">
        <legend><h3>Approve awards given by your team members</h3></legend>
        <p class="well well-sm">Following awars are been proposed by your team members. You can approve or Reject the same.</p> 
      </div>
      <a href="view/rules.php" target="_blank" ><button type="submit" class="btn btn-success">rules</button></a>
  </div>

  <div class="panel-group" id="accordion">



      <?php
              $count = 1;
              foreach($result as $proposerName => $arrayOfRecepients){
              $pendingArrayOfProposer = array();
              $doneArrayOfProposer = array();

              for($i=0;$i<count($arrayOfRecepients);$i++)
              {
                if($arrayOfRecepients[$i] -> status == "1" || $arrayOfRecepients[$i] -> status == "2")
                array_push($doneArrayOfProposer,$arrayOfRecepients[$i]);
                if($arrayOfRecepients[$i] -> status == "0")
                array_push($pendingArrayOfProposer,$arrayOfRecepients[$i]);
              }

              
              
              
              if(!empty($pendingArrayOfProposer))
              {
                echo "<div class=\"panel panel-default\">";
                    echo "<div class=\"panel-heading clearfix\">";
                            echo "<h4 class=\"panel-title pull-left\">";
                            echo "<a data-toggle=\"collapse\" id=\"pn\" data-parent=\"#accordion\" href=\"#collapse"."$count"."\">".
                              "$proposerName"."</a>
                                 </h4>";
                            echo "<span class=\"pull-right text-danger\">"."Pending"."</span>";
                    echo "</div>";        
                    echo "<div id=\"collapse"."$count"." class=\"panel-collapse collapse in\">";
                        echo "<div class=\"panel-body\">
                            <table id=\"xyz\" class=\"table table-hover\" width=\"100%\">
                              <thead>
                                <tr>
                                  <th>Receipent email</th>
                                  <th>Proposal date</th>
                                  <th style='width=\"40%\"'>Salutation</th>
                                  <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>";
                              for($i = 0; $i < count($pendingArrayOfProposer); $i++)
                              {
                                  $rmail = $pendingArrayOfProposer[$i] -> recipient_email;
                                  $pdate = $pendingArrayOfProposer[$i] -> proposal_date;
                                  $pdate = json_decode($pdate);
                                  $sal = $pendingArrayOfProposer[$i] -> salutatison;
                                  $rowid = $pendingArrayOfProposer[$i] -> row_id;
                                  $tempStatus = $pendingArrayOfProposer[$i] -> status;
                                  $date = $pdate->day;
                                  $month = $pdate->month;
                                  $year = $pdate->year; 
                                  echo "<tr>
                                  <td class=\"nr\" name=\"rMail\">"."$rmail"."</td>
                                  
                                  <td style=\"width:30%\">"."$sal"."</td>
                                  <td>
                                    <form class=\"form-horizontal\" method=\"post\">
                                      <input type=\"hidden\" id=\"user\" value="."$proposerName"."/>
                                      <input name=\"uniqueId\" type=\"hidden\" id=\"id\" value="."$rowid"."/>
                                      <div class=\"form-group\">
                                        <div class=\"col-md-8\">";
                                      
                                          echo "<button id=\"reject\" type=\"submit\" name=\"reject\" class=\"btn btn-danger\" value=\"2\">Reject</button>
                                          <button type=\"submit\" id=\"approve\" name=\"approve\" class=\"btn btn-success\" value=\"1\"  >Approve</button>
                                      
                                        </div>
                                      </div>
                                    </form>
                                  </td>
                                  </tr>";
                          
                                $count++;

                              }
                        
                        echo "</tbody>";
                      echo "</table>";
                echo "</div>";
              }

              if(!empty($doneArrayOfProposer))
              {
                echo "<div class=\"panel panel-default\">";
                    echo "<div class=\"panel-heading clearfix\">";
                      echo "<h4 class=\"panel-title pull-left\">";
                      echo "<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"."$count"."\">".
                        "$proposerName"."</a>
                      </h4>";
                      echo "<span class=\"pull-right text-success\">"."Done"."</span>";
                    echo "</div>";
                    echo "<div id=\"collapse"."$count"." class=\"panel-collapse collapse in\">";
                    echo "</div>";

                    echo "<div class=\"panel-body\">
                    <table id=\"xyz\" class=\"table table-hover\" width=\"100%\">
                      <thead>
                        <tr>
                          <th>Receipent email</th>
                          <th>Proposal date</th>
                          <th style='width=\"40%\"'>Salutation</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>";
                      for($i = 0; $i < count($doneArrayOfProposer); $i++)
                      {
                          $rmail = $doneArrayOfProposer[$i] -> recipient_email;
                          $pdate = json_decode($doneArrayOfProposer[$i] -> proposal_date);
                          $date = $pdate->day;
                          $month = $pdate->month;
                          $year = $pdate->year; 
                          //die;
                          $sal = $doneArrayOfProposer[$i] -> salutatison;
                          $rowid = $doneArrayOfProposer[$i] -> row_id;
                          $tempStatus = $doneArrayOfProposer[$i] -> status;
                          echo "<tr>
                          <td class=\"nr\" name=\"rMail\">"."$rmail"."</td>
                          <td>"."$date"."\\"."$month"."\\"."$year"."</td>
                          <td style=\"width:30%\">"."$sal"."</td> 
                          <td>
                            <form class=\"form-horizontal\" method=\"post\">
                              <input type=\"hidden\" id=\"user\" value="."$proposerName"."/>
                              <input name=\"uniqueId\" type=\"hidden\" id=\"id\" value="."$rowid"."/>
                              <div class=\"form-group\">
                                <div class=\"col-md-8\">";
                              
                                if($tempStatus == "1")
                                echo "<span class=\"text-success\">Approved</span>";
                                if($tempStatus == "2")
                                echo "<span class=\"text-danger\">Rejected</span>";
                              
                              

                          echo    "</div></div>
                            </form>
                          </td>
                        </tr>";
                        
                  
                  $count++;

                      }
                      echo "</tbody>";
                  echo "</table>";
              echo "</div>";
            }
          
          }

        

      ?>

  </div>
</div>


</body>

<footer class="page-footer font-small blue pt-4 mt-4">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>
</footer>
</html>