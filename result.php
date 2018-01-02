<?php
  session_start();
  if ($_SESSION['response'] == null) {
    header("Location: index.php");
    exit;
  }
  $pagetitle = "Monthly Fee Calculator";
	$metadescription = "Calculate your monthly fee payment and reduced rates for some families.";
?>
<?php	include_once '../static/global/bs4/header.php'; ?>
<!-- Page Content -->
<style>
@media print {
  .container {
    min-width: 100%;
  }
  body {
    font-size: 14px;
  }
  .table th, .table td {
    padding: 4pt;
    vertical-align: top;
    border-top: 1px solid #e9ecef;
}

}
</style>
  <main class="container">
    <div class="row">
      <div class="col blog-main">
        <h1 class="sr-only">Your monthly fees</h1>
        <?php echo $_SESSION['response'];
?>
      </div>
    </div>
  </main>
<!-- Content ENDS -->
<?php	  unset($_SESSION['response']);
        session_destroy();
        include_once '../static/global/bs4/footer.php'; ?>
