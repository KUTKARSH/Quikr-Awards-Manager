echo "<div class=\"panel panel-default\">";
        echo "<div class=\"panel-heading clearfix\">";
        echo "<h4 class=\"panel-title pull-left\">";
        echo "<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"."$count"."\">".
          "$proposerName"."</a>
        </h4>";


        echo "<span class=\"pull-right text-danger\">"."$status"."</span>";

        echo "<span class=\"pull-right text-success\">"."$status"."</span>";




        if(!empty($pendingArrayOfProposer))
        {
          echo "<div class=\"panel panel-default\">";
          echo "<div class=\"panel-heading clearfix\">";
          echo "<h4 class=\"panel-title pull-left\">";
          echo "<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse"."$count"."\">".
            "$proposerName"."</a>
          </h4>";
          echo "<span class=\"pull-right text-danger\">"."Pending"."</span>";
          echo "</div>";
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
            </thead>";
            for($i = 0; $i < count($pendingArrayOfProposer); $i++)
            {
                $rmail = $arrayOfRecepients[$i]->recipient_email;
                $pdate = $arrayOfRecepients[$i]->proposal_date;
                $sal = $arrayOfRecepients[$i]->salutatison;
                $rowid = $arrayOfRecepients[$i]->row_id;
                $tempStatus = $arrayOfRecepients[$i]->status;
                echo "<tr>
                <td class=\"nr\" name=\"rMail\">"."$rmail"."</td>
                <td>"."$pdate"."</td>
                <td style=\"width:30%\">"."$sal"."</td>
                <td>
                  <form class=\"form-horizontal\">
                    <input type=\"hidden\" id=\"user\" value="."$proposerName"."/>
                    <input name=\"uniqueId\" type=\"hidden\" id=\"id\" value="."$rowid"."/>
                    <div class=\"form-group\">
                      <div class=\"col-md-8\">";
                    
                        echo "<button id=\"reject\" type=\"submit\" name=\"reject\" class=\"btn btn-danger\" value=\"2\">Reject</button><button type=\"submit\" id=\"approve\" name=\"approve\" class=\"btn btn-success\" value=\"1\">Approve</button>
                        ";
                    
                    

                echo    "</div>
                  </form>
                </td>
              </tr>";
              echo "</tbody>";
        echo "</table>";
        echo "</div>";
        $count++;

            }
      }