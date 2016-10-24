<?php 

if (!isset($_REQUEST['date'])) { 
$num_day = date('N', time()); 
} else { 
$num_day = $_REQUEST['date']; 
} 
$active = ' class="active"'; 
$week = [1=>'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье']; 

function rusMonth() { 
$months = [1=>'Января', "Февраля", "Марта", "Апреля", "Майа",
"Июня", "Июля", "Авгуса", "Сентября", "Октября", "Ноября", "Декабря"];
$str = $months[date('n')];
    return $str;

} 

$today = date('d', time()) . ' ' . rusMonth() . ' ' . date('Y',time()) . ' год'; 
?> 

<div> 
<p class="date"><span>Сегодня: </span><?=$today?></p> 
<nav> 
<ul class="pagination"> 
<?php foreach ($week as $key => $day) :?>
    <li<?php if($key == $num_day) echo $active;?><a href="date=<?=$key?>"><?=$day?></a></li>
<? endforeach; ?> 
</ul> 
</nav> 
</div>