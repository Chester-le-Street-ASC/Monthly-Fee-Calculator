<?php

  session_start();

  $total = 0.0;
  $totalsArray = [];
  $monthlyTotal = 0.0;
  $unaddedTable = "";
  $unaddedTableCF1 = "";
  $unaddedTableCF2 = "";

  $multiplier = array(htmlspecialchars($_POST['ab1']), htmlspecialchars($_POST['b2']), htmlspecialchars($_POST['b3']), htmlspecialchars($_POST['c']), htmlspecialchars($_POST['d']), htmlspecialchars($_POST['e']), htmlspecialchars($_POST['tadpoles']), htmlspecialchars($_POST['frogs']), htmlspecialchars($_POST['dolphins']));
  $squadName = array("A &amp; B1", "B2", "B3", "C", "D", "E", "Tadpoles", "Frogs", "Dolphins");
  $fees = array(70.00, 65.00, 63.00, 48.00, 38.00, 28.00, 28.00, 28.00, 28.00);

  // Separate Reporting of CrossFit fees
  $multiplierAB1CF = htmlspecialchars($_POST['ab1CF']);
  $multiplierB2CF = htmlspecialchars($_POST['b2CF']);
  $multiplierB3CF = htmlspecialchars($_POST['b3CF']);

  if ($multiplierAB1CF <= 0) {
    $multiplierAB1CF = null;
  }

  if ($multiplierB2CF <= 0) {
    $multiplierB2CF = null;
  }

  if ($multiplierB3CF <= 0) {
    $multiplierB3CF = null;
  }

  $feeAB1CF = 15.00;
  $feeCFBase = 7.50;
  $monthlyTotalCF = ($multiplierAB1CF*$feeAB1CF)+(($multiplierB2CF+$multiplierB3CF)*$feeCFBase);

  for ( $i=0 ; $i<sizeof($multiplier) ; $i++ ) {
    if ($multiplier[$i] <= 0) {
      $multiplier[$i] = null;
    }
  }

  for ( $i=0 ; $i<sizeof($multiplier) ; $i++ ) {
    $total = $total+($multiplier[$i]*$fees[$i]);
  }

  for ( $i=0 ; $i<sizeof($multiplier) ; $i++ ) {
    for ( $j=0 ; $j<$multiplier[$i] ; $j++ ) {
      $totalsArray[] = $fees[$i];
    }
  }

  rsort($totalsArray);
  for ( $i=0 ; $i<sizeof($totalsArray) ; $i++) {
    if ( $i < 2 ) {
      $monthlyTotal = $monthlyTotal+($totalsArray[$i]);
    }
    elseif ( $i == 2 ) {
      $monthlyTotal = $monthlyTotal+($totalsArray[$i]*0.8);
    }
    elseif ( $i > 2 ) {
      $monthlyTotal = $monthlyTotal+($totalsArray[$i]*0.6);
    }
  }

  for ( $i=0 ; $i<sizeof($multiplier) ; $i++ ) {
    if ( $multiplier[$i] != null ) {
      $unaddedTable = $unaddedTable . "<tr><td>" . $squadName[$i] . "</td><td>" . $multiplier[$i] . "</td><td>&pound;" . $fees[$i] . "</td><td class=\"text-right\">&pound;" . number_format($fees[$i]*$multiplier[$i],2,'.','') . "</td></tr>";
    }
  }

  if ($multiplierAB1CF > 0) {
    $unaddedTableCF2 = "<tr><td>CrossFit (2 Sessions)</td><td>" . $multiplierAB1CF . "</td><td>&pound;" . $feeAB1CF . "</td><td class=\"text-right\">&pound;" . number_format($multiplierAB1CF*$feeAB1CF,2,'.','') . "</td></tr>";
  }

  if (($multiplierB2CF+$multiplierB3CF) > 0) {
    $unaddedTableCF1 = "<tr><td>CrossFit (1 Session)</td><td>" . ($multiplierB2CF+$multiplierB3CF) . "</td><td>&pound;" . number_format( $feeCFBase,2,'.','') . "</td><td class=\"text-right\">&pound;" . number_format(($multiplierB2CF+$multiplierB3CF)*$feeCFBase,2,'.','') . "</td></tr>";
  }

  if ($monthlyTotalCF > 0) {
    $totalCF = "<tr><td><strong>The monthly CrossFit fee (paid separately) is</strong></td><td class=\"text-right\"> &pound;" . number_format($monthlyTotalCF,2,'.','') . "</td></tr>";
  }

  // If Reduced due to Number...
  if (sizeof($totalsArray) == 3 ) {
    $discount = "<div class=\"alert alert-success\">
    <p class=\"mb-0\"><strong>You get a discount on your fees</strong></p>
    <p class=\"mb-0\">As you have three swimmers, you pay a reduced fee for your third swimmer (ordered by monthly fee). The discount applied is 20% off their monthly fee.</p></div>";
  }
  elseif (sizeof($totalsArray) == 4 ) {
    $discount = "<div class=\"alert alert-success\">
    <p class=\"mb-0\"><strong>You get a discount on your fees</strong></p>
    <p class=\"mb-0\">As you have four swimmers, you pay a reduced fee for your third swimmer and fourth swimmer (ordered by monthly fee). The discount applied is 20% off your third swimmer's monthly fee and 40% off your fourth swimmer's monthly fee.</p></div>";
  }
  elseif (sizeof($totalsArray) > 4 ) {
    $discount = "<div class=\"alert alert-success\">
    <p class=\"mb-0\"><strong>You get a discount on your fees</strong></p>
    <p class=\"mb-0\">As you have " . sizeof($totalsArray) . " swimmers, we have applied a 20% discount for swimmer number 3 (ordered by monthly fee) and a 40% discount for swimmers 4 to  " . sizeof($totalsArray) . ".</p></div>";
  }
  else {
    $discount = "";
  }

  //response generation function
	 //function to generate response
	if(($total > 0) || ($monthlyTotalCF > 0)) $response =
  "<h1>Your monthly fees are...</h1>
  <div class=\"table-responsive mt-3 mb-2\">
    <table class=\"table table-light\">
      <thead class=\"thead-light\"><th>Squad</th><th>Swimmers</th><th>Fee</th><th class=\"text-right\">Total Fee</th></thead>
      " . $unaddedTable . $unaddedTableCF2 . $unaddedTableCF1 . "
    </table>
  </div>
  <div class=\"table-responsive mb-2\">
    <table class=\"table table-light\">
      <thead class=\"thead-light\"><th>Totals</th><th class=\"text-right\">Fee</th></thead>
      <tr><td>The monthly subtotal is</td><td class=\"text-right\"> &pound;" . number_format($total,2,'.','') . "</td></tr>
      <tr><td><strong>The monthly total payable (with any deductions) is</strong></td><td class=\"text-right\"> &pound;" . number_format($monthlyTotal,2,'.','') . "</td></tr>
      " . $totalCF . "
    </table>
  </div>
  " . $discount . "

  <div class=\"row d-print-none\">
    <div class=\"col-12 col-md-6\">
      <p><a class=\"btn btn-primary btn-block\" href=\"index.php\"><i class=\"fa fa-calculator\" aria-hidden=\"true\"></i> Go back to the calculator</a></p>
    </div>
    <div class=\"col-12 col-md-6\">
      <p class=\"mb-0\"><a target=\"_self\" class=\"btn btn-dark btn-block\" href=\"javascript:window.print()\"><i class=\"fa fa-print\" aria-hidden=\"true\"></i> Print</a></p>
    </div>
  </div>
  <hr>
  <p>Did you know that on a computer, 0.7 + 0.1 = 0.7999? If you think the maths is wrong, you can always check with a treasurer.</p>
  <p>Don't forget that CrossFit is paid for separately to normal fees and there are no discounts for having multiple swimmers in CrossFit.</p>

  ";
  else $response = "
  <h1>Oops...</h1>
  <div class=\"alert alert-danger mt-3\">
    <p>There has been an error calculating the fees. Try again later.</p>
    <p class=\"mb-0\">It's likely that you didn't enter any numbers or supplied a negative integer value.</p>
  </div>

  <div class=\"row d-print-none\">
    <div class=\"col-12 col-md-6\">
      <p><a class=\"btn btn-primary btn-block\" href=\"index.php\"><i class=\"fa fa-calculator\" aria-hidden=\"true\"></i> Go back to the calculator</a></p>
    </div>
  </div>";

  $_SESSION['response'] = $response;
  header("Location: result.php");

?>
