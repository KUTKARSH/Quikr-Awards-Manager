<?php
    $obj = array("1" => [array("id"=>"12", "rmail" => "harish@quikr.com","pmail" => "vikas.singh@quikr.com","amail"=>"ramcharan@quikr.com","adate"=>"21/09/18","sal"=>"Hi there"),
                         array("id"=>13,"rmail" => "sonali@quikr.com","pmail" => "mithun@quikr.com","amail"=>"ramcharan@quikr.com","adate"=>"25/09/18","sal"=>"Hello there")],
    "3" => [array("id"=>14,"rmail" => "rahul@quikr.com","pmail" => "tina@quikr.com","amail"=>"kushal@quikr.com","adate"=>"25/09/18","sal"=>"Hi hello")]
    );
?>


<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title>Task & Feedback portal</title>

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
      <legend><h3>Give Pat on the back certificate</h3></legend>
      <p class="well well-sm">Following awars are been proposed and approved. Please hand over the certificate and confirm here.</p> 
    </div>
  </div>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            <span class="text-danger">Pending</span>
            </a>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table table-hover" width="100%">
                    <thead>
                    <tr>
                        <th>Receipent email</th>
                        <th>Proposer email</th>
                        <th>Approver email</th>
                        <th>Approved date</th>
                        <th style='width="30%"'>Salutation</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $approval => $approvalList)
                            {
                                if($approval == "1")
                                {
                                    for($i=0;$i<count($approvalList);$i++)
                                    {
                                        $individual = $approvalList[$i];
                                        $rmail = $individual->recipient_email;
                                        $pmail = $individual->proposer_email;
                                        $amail = $individual->approver_email;
                                        $adate = $individual->approved_date;
                                        $sal = $individual->salutation;
                                        $rowId = $individual->row_id;
                                        echo    "<tr>
                                        <form method=\"post\">
                                                <td>"."$rmail"."</td>
                                                <td>"."$pmail"."</td>
                                                <td>"."$amail"."</td>
                                                <td>"."$adate"."</td>
                                                <td style=\"width:30%\">"."$sal"."</td>
                                                <td>
                                                <div class=\"form-group\">
                                                    <div class=\"col-md-8\">
                                                    <button id=\"approve\" name=\"approve\" class=\"btn btn-success\"
                                                    value="."$rowId".">Give certificate </button>
                                                    </div>
                                            </form> 
                                             </div>
                                                </td>
                                            </tr>";
                                        
                                    }
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            <span class="text-success">Done</span>
            </a>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table table-hover" width="100%">
                    <thead>
                    <tr>
                        <th>Receipent email</th>
                        <th>Proposer email</th>
                        <th>Approver email</th>
                        <th>Handover date</th>
                        <th style='width="30%"'>Salutation</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        
                        foreach($result as $approval => $approvalList)
                        {
                                if($approval == "3")
                                {
                                    for($i=0;$i<count($approvalList);$i++)
                                    {
                                        $individual = $approvalList[$i];
                                        $rmail = $individual->recipient_email;
                                        $pmail = $individual->proposer_email;
                                        $amail = $individual->approver_email;
                                        $adate = $individual->approved_date;
                                        $sal = $individual->salutation;
                                        echo    "<tr>
                                                <td>"."$rmail"."</td>
                                                <td>"."$pmail"."</td>
                                                <td>"."$amail"."</td>
                                                <td>"."$adate"."</td>
                                                <td style=\"width:30%\">"."$sal"."</td>
                                                <td>
                                                <div class=\"form-group\">
                                                    <div class=\"col-md-8\">
                                                    <span class=\"text-success\">Certificate given</span>
                                                    </div>
                                                </div>
                                                </td>
                                            </tr>";
                                        
                                    }
                                }
                            }
                    ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>    
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