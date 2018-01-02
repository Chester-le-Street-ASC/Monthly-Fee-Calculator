<?php

  if (!isset($_SESSION)) session_start();
  $pagetitle = "Monthly fee calculator";
	$metadescription = "Calculate your monthly fee payment and reduced rates for some families."; ?>
<?php	include_once '../static/global/bs4/header.php'; ?>
<!-- Page Content -->
<main class="container">
  <div class="row">
    <div class="col blog-main">
      <h1>Calculate your monthly fee</h1>
      <p>Easily work out your monthly payments to Chester-le-Street ASC. We'll automatically calculate any discounts for you too.</p>

      <div class="well" id="respond">
        <p class="h4 mb-1">Enter the number of swimmers you have in each squad</p>

        <hr>

        <form action="calculate.php" method="post" class="form-horizontal" id="1">

          <h2>Swimming Squads</h2>

          <div class="form-row">
            <div class="form-group col-md-7">
            <label for="ab1">Swimmers in A and B1</label>
            <input type="number" class="form-control" name="ab1" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
            </div>
            <div class="form-group col">
            <label for="ab1">CrossFit for A and B1</label>
            <input type="number" class="form-control" name="ab1CF" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
            </div>
          </div>

          <hr class="d-md-none">

          <div class="form-row">
            <div class="form-group col-md-7">
            <label for="b2">Swimmers in B2</label>
            <input type="number" class="form-control" name="b2" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
            </div>
            <div class="form-group col">
            <label for="b2CF">CrossFit for B2</label>
            <input type="number" class="form-control" name="b2CF" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
            </div>
          </div>

          <hr class="d-md-none">

          <div class="form-row">
            <div class="form-group col-md-7">
            <label for="b3">Swimmers in B3</label>
            <input type="number" class="form-control" name="b3" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
            </div>
            <div class="form-group col">
            <label for="b3CF">CrossFit for B3</label>
            <input type="number" class="form-control" name="b3CF" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
            </div>
          </div>

          <hr class="d-md-none">

          <div class="row">
          <div class="col-md-7">
          <div class="form-group">
          <label for="c">Swimmers in C Squad</label>
          <input type="number" class="form-control" name="c" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
          </div>

          <div class="form-group">
          <label for="d">Swimmers in D Squad</label>
          <input type="number" class="form-control" name="d" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
          </div>

          <div class="form-group">
          <label for="e">Swimmers in E Squad</label>
          <input type="number" class="form-control" name="e" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
          </div>

          <div class="form-group">
          <label for="tadpoles">Swimmers in Tadpoles</label>
          <input type="number" class="form-control" name="tadpoles" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
          </div>

          <div class="form-group">
          <label for="frogs">Swimmers in Frogs</label>
          <input type="number" class="form-control" name="frogs" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
          </div>

          <div class="form-group">
          <label for="dolphins">Swimmers in Dolphins</label>
          <input type="number" class="form-control" name="dolphins" placeholder="0" autocomplete="off" pattern="[0-9]*" inputmode="numeric" min="1">
          </div>
          </div>
          </div>

          <h2>Optional Extras</h2>
          <p>There are no optional extras at this time</p>

          <div class="form-group mb-0">
          <button class="btn btn-success" id="submitButton" value="submitted" type="submit">Calculate my monthly fee</button>
          </div>
        </form>
        <!--<script>
        function submitAndVerify() {
          if (sumOfInputs() > 0) {
            // Allow Submit
            console.log(sum);
          }
          else {
            // Don't allow submit
            console.log(sum);
          }
        }

        function sumOfInputs() {
          var sum =
            document.getElementById('ab1').value +
            document.getElementById('ab1CF').value +
            document.getElementById('b2').value +
            document.getElementById('b2CF').value +
            document.getElementById('b3').value +
            document.getElementById('b3CF').value +
            document.getElementById('c').value +
            document.getElementById('d').value +
            document.getElementById('e').value +
            document.getElementById('tadpoles').value +
            document.getElementById('frogs').value +
            document.getElementById('dolphins').value;
            console.log("Sum: " + sum);
            return sum;
        }

        var submitButton = document.getElementById('submitButton');
        submitButton.addEventListener('click', submitAndVerify, false);
      </script>-->
      </div>

    </div>
  </div>
</main>
<?php	include_once '../static/global/bs4/footer.php'; ?>
