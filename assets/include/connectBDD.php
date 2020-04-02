<?php
session_start();
$bdd = new PDO('mysql: host=localhost; dbname=newworld', "autheman", "ij4udh1A*");
if(isset($_SESSION['userId']))
{
  $reqUser = $bdd->prepare("SELECT * from utilisateur where userId = ?");
  $reqUser->execute(array($_SESSION['userId']));
  $curUser = $reqUser->fetch();

  $role = htmlspecialchars($curUser['userRole']);

  $reqRole = $bdd->prepare("SELECT * from utilisateur inner join role on roleId = userRole where userRole = ?");
  $reqRole->execute(array($role));
  $curRole = $reqRole->fetch();

  // avatar
  $spinoza = array("avatar", "avatar-woman");
  $avatarId = $spinoza[rand(0,1)];
}
?>

<div class="loader">
	<script type="text/javascript" src="/newworld/assets/js/jquery-latest.js"></script>
	<script type="text/javascript">
	$(window).load(function() {
		$(".loader").fadeOut("1000");
	})
	</script>
</div>
