<?php
$servername = "localhost";
$username = "root";
$password = "pass";
$dbname = "ency";

$handle = new mysqli($servername, $username, $password);
$found = mysqli_select_db($handle, $dbname);

if ($found)
{
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
  die("Coś nie wyszło z połączeniem, a konkretnie: " . $conn ->connect_error);
}

$sql2 = "USE ency;";
if ($conn->query($sql2) === TRUE){
  }else{
  die("Coś nie wyszło z wybraniem bazy danych żeby utworzyć w niej tabele, a konkretnie: " . $conn->error);
}
$reglogin = $_POST["reglogin"];
$regpassword = $_POST["regpassword"];
$repregpassword = $_POST["repregpassword"];
$regname = $_POST["regname"];
$regemail = $_POST["regemail"];
$sql = "SELECT * FROM users WHERE login='" . trim($reglogin) . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	die("Podany login juz istnieje w bazie danych.");
}

$sql = "SELECT * FROM users WHERE email='" . trim($regemail) . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
	die("Podany email juz istnieje w bazie danych.");
}
if (strlen($reglogin)>30)
{
	die("Login jest zbyt dlugi. Nie mozna tak nie przez formularz ;<");
}
if (strlen($regpassword)>30)
{
	die("Haslo jest zbyt dlugie. Nie mozna tak nie przez formularz ;<");
}
if (strlen($regname)>30)
{
	die("Imie jest zbyt dlugie. Nie mozna tak nie przez formularz ;<");
}
if (strlen($regemail)>30)
{
	die("Email jest zbyt dlugi. Nie mozna tak nie przez formularz ;<");
}
if (!isset($_SESSION["logged"]))
{
if (empty(trim($reglogin)) || trim($reglogin) == "")
{
	die("Twoj login jest niepoprawny.");
}
if (empty(trim($regpassword)) || trim($regpassword) == "" || trim($regpassword) != trim($repregpassword))
{
	die("Twoje haslo jest niepoprawne.");
}
if (empty(trim($regname)) || trim($regname) == "")
{
	die("Twoje imie jest niepoprawne.");
}
if (empty(trim($regemail)) || trim($regemail) == "")
{
	die("Twoj email jest niepoprawny.");
}
	$sql4 = "INSERT INTO users (login, password, name, email) VALUES ('" . $reglogin . "', '" . $regpassword . "', '" . $regname . "', '" . $regemail . "');";
if ($conn->query($sql4) === TRUE){
  echo "Twoje dane zostały dodane do bazy!<br/>";
}else{
  die("Coś nie wyszło z dodawaniem twoich danych, a konkretnie: " . $conn->error);
}
}
else
{
	$sql = "SELECT * FROM users WHERE login='" . trim($_SESSION["logged"]) . "'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$old_login = $row['login'];
	$old_password = $row['password'];
	$old_name = $row['name'];
	$old_email = $row['email'];
	if (empty(trim($reglogin)) || trim($reglogin) == "")
	{
		$new_login = $old_login;
	}
	else
	{
		$new_login = $reglogin;
	}
	if (empty(trim($regpassword)) || trim($regpassword) == "")
	{
		$new_password = $old_password;
	}
	else
	{
		$new_password = $regpassword;
	}
	if (empty(trim($regname)) || trim($regname) == "")
	{
		$new_name = $old_name;
	}
	else
	{
		$new_name = $regname;
	}
	if (empty(trim($regemail)) || trim($regemail) == "")
	{
		$new_email = $old_email;
	}
	else
	{
		$new_email = $regemail;
	}
	$sql = "UPDATE users SET login='" . $new_login . "', password='" . $new_password . "', name='" . $new_name . "', email='" . $new_email . "' WHERE login='" . trim($_SESSION["logged"]) . "';";
	if ($conn->query($sql) === TRUE)
	{
		echo "Twoje dane zostaly edytowane!";
	}
	else
	{
		die("Cos nie wyszlo z edytowaniem twoim danych a konkretnie: " . $conn->error);
	}
}

$conn->close();
}
else
{
	echo "<p>Nie ma żadnej bazy danych na tym serwerze :(</p>";
}

?>
