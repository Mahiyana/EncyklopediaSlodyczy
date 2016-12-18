<!DOCTYPE html>

<html>

  <head>
    <meta charset = "utf-8">
	<meta name = "author" content = "Maja & Róża">
	<meta name = "description" content = "Strona główna Encyklopedii Słodyczy">
    <title>Strona główna</title>
	<link rel="stylesheet" type="text/css" href="../css/layout.css">
    <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet"> 
    <script type="application/javascript" src="../javascript/weekday.js"></script>
	<script type="application/javascript" src="../javascript/index_menu_list_mouse_movement.js"></script>
	<script type="application/javascript" src="../javascript/licznik_linkow.js"></script>
 </head>
  
  <body onload = "weekday(); link_counter();">
    <div class='background'>
	<div id='menu_header' class='absolute'>
	<nav>
	<p id='title'> Encyklopedia Słodyczy</p>
		<table id='menu_header_table'>
			<tr>
				<td><a href = '../html/index.html'>Strona główna</a></td>
				<td><a href = '../php/recipes.php'>Przepisy</a></td>
				<td><a href = '../php/history.php'>Historia</a></td>
			</tr>
		</table>
    </nav>
	</div>
    <div class="box">
	<div onmouseover='menu_mouseover()' onmouseout='menu_mouseout()' id="menu_list">
	<table id='menu_list_table'>
		<tr>
			<td>
				<details>
				<summary><a href = 'sweet_chocolate.html'>Czekolada</a></summary>
				<ul>
				<li>Mleczna</li>
				<li>Biała</li>
				<li>Gorzka</li>
				</ul>
				</details>
			</td>
		</tr>
		<tr>
			<td><a href='karmel.html'>Karmel</a></td>
		</tr>
		<tr>
			<td>
				<details>
				<summary><a href='lizaki.html'>Lizaki</a></summary>
				<ul>
				<li>Wodne</li>
				<li>Mleczne</li>
				</ul>
				</details>
			</td>
		</tr>
		<tr>
			<td>
				<details>
				<summary><a href='lody.html'>Lody</a></summary>
				<ul>
				<li>Wodne</li>
				<li>Mleczne</li>
				</ul>
				</details>
			</td>
		</tr>
		<tr>
			<td>
				<details>
				<summary><a href='ciastka.html'>Ciastka</a></summary>
				<ul>
				<li>Pszenne</li>
				<li>Owsiane</li>
				</ul>
				</details>
			</td>
		</tr>
		<tr>
			<td>
				<details>
				<summary><a href='zelki.html'>Żelki</a></summary>
				<ul>
				<li>Zwykłe</li>
				<li>Kwaśne</li>
				<li>Z pianką mleczną</li>
				</ul>
				</details>
			</td>
		</tr>
		<tr>
			<td><a href='miod.html'>Miód</a></td>
		</tr>
		<tr>
			<td><a href='cukier.html'>Cukier</a></td>
		</tr>
		<tr>
			<td><a href='krowki.html'>Krówki</a></td>
		</tr>
		<tr>
			<td>
				<details>
				<summary><a href='rurki.html'>Rurki</a></summary>
				<ul>
				<li>Z kremem</li>
				<li>W czekoladzie</li>
				</ul>
				</details>
			</td>
		</tr>
	</table>
	</div>
	<div class="contents_plain">
    <img src='../pictures/pralinka.png'  class='image_rotate' alt='Przykład samotnej pralinki'><h1 id='powitanie'>Witaj w naszej Encyklopedii Słodyczy</h1>

    <?php
      session_start();
      if(isset($_SESSION["logged"])){
        print($_SESSION["logged"]);
      }
      else{
       print("Sesja nie ustawiona");
      }
       
    ?>

	</div>
	</div>
    </div>
	</body>

</html>
