
<?php 
function getNo($date) {
$host = 'localhost'; 
$user = 'root'; 
$password = ''; 
$db_name = 'note45';
$link = mysqli_connect($host, $user, $password, $db_name) or die(mysqli_error($link)); 
$query = "SELECT * FROM notes WHERE num_day = $date";
$result = mysqli_query($link, $query); 
return $note = mysqli_fetch_assoc($result); 
} 


if (isset($_REQUEST['date'])) { 
$day = filter_var($_REQUEST['date'], FILTER_SANITIZE_NUMBER_INT); 
$note = getNo($day);
} 
$date = $_REQUEST['date'];

if (isset($_REQUEST['save'])) { 
$note = getNo($date);
require_once 'db_connect.php'; 

if(!empty($note)) { 
$data = filter_var(htmlspecialchars(trim($_REQUEST['note'])), FILTER_SANITIZE_STRING); 
$query = "UPDATE notes SET text = '$data' WHERE num_day = $date";
$result = mysqli_query($link, $query); 
$note = getNo($date);
} else { 
$note = filter_var(htmlspecialchars(trim($_REQUEST['note'])), FILTER_SANITIZE_STRING); 
$query = "INSERT notes(num_day,text) VALUES ($date, '$note')"; 
$result = mysqli_query($link, $query); 
$note = getNo($date);
} 
} 
?> 

<!DOCTYPE html> 
<html lang="ru-RU">
<head> 
<meta charset="utf-8"> 
<title>Органайзер</title> 
<link rel="stylesheet" href="bootstrap3/css/bootstrap.css"> 
<link rel="stylesheet" href="css/styles.css"> 
<link rel="stylesheet" href="css/admin.css"> 
</head> 
<body> 
<div id="wrapper"> 
<h1>Органайзер</h1> 

<?php require_once 'pagination.php'; 

if (empty($_REQUEST['date'])) {
$note = getNo($num_day);
}
?>

<div id="form"> 
<form action="" method="POST"> 
<p> 
<textarea name="note" class="form-control" placeholder="Ваш отзыв"><?=$note['text']?></textarea>
</p> 
<input type="hidden" name="date" value="<?=$num_day?>"> 
<p><input type="submit" name="save" class="btn btn-info btn-block" value="Сохранить"></p> 
</form> 
</div> 
</div> 
</body> 
</html>