<?php
  $accounts = array(
    'maja' => 'haslomai',
    'roza' => 'haslorozy',
  );
  session_start();
  $username=trim($_POST['login']);
  $password=trim($_POST['password']);
  
  if(($accounts[$username] == $password) && !empty($_POST['login']) && !empty($_POST['password']) ){
    $_SESSION['logged']=$username;
    header("Location: profile.php");
  }  
  else{
     if(!empty($_POST['login']) || !empty($_POST['password']) ){
     print("<p>Zły login i/lub hasło</p>");
     }
  }

  if(isset($_POST['logout'])){
    unset($_SESSION['logged']);
    header("Location: index.php");
  }
  ?>
<div class='background'>
	<div id='menu_header' class='absolute'>
	<nav>
	<p id='title'> Encyklopedia Słodyczy</p>
		<table id='menu_header_table'>
			<tr>
				<td><a href = '../php/index.php'>Strona główna</a></td>
				<td><a href = '../php/recipes.php'>Przepisy</a></td>
				<td><a href = '../php/history.php'>Historia</a></td>
<?php
if(isset($_SESSION['logged'])){
  ?>

				<td><a href = '../php/profile.php'>Profil</a></td>
<?php } ?>
			</tr>
		</table>
    </nav>
  </div>  
