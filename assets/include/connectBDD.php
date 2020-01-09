<?php
session_start();
$bdd = new PDO('mysql: host=localhost; dbname=newworld', "autheman", "ij4udh1A*");
?>

<div class="loader">
	<script type="text/javascript" src="assets/js/jquery-latest.js"></script>
	<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("1000");
	})
	</script>
</div>
