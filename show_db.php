<?php
session_start();
$host = 'localhost';
$databaseName = 'global';
$user = 'root';
$pass = 'qwerty';

/* Функция подключения к базе данных */
function connectToDatabase($dbHost, $dbName, $dbUsername, $dbPassword)
{
    try
    {
        return new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUsername, $dbPassword);
    }
    catch(PDOException $PDOexception)
    {
        exit("<p>An error ocurred: Can't connect to database. </p><p>More preciesly: ". $PDOexception->getMessage(). "</p>");
    }
}

/* Функция отображает таблицы базы данных */
function showDB($db_name){
	
	$pdo2 = connectToDatabase($GLOBALS['host'], $db_name, $GLOBALS['user'], $GLOBALS['pass']);
	
	$stmt = $pdo2->prepare('SHOW TABLES');
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_COLUMN);
	
	foreach ($result as $row) {
		echo $row.'<br>';
	}
}

/* Функция отображает столбцы из таблицы базы данных */
function showColumns($db_name, $table_name){
	$pdo3 = connectToDatabase($GLOBALS['host'], $db_name, $GLOBALS['user'], $GLOBALS['pass']);
	$stmt = $pdo3->prepare('SELECT * FROM books');
	$stmt->execute();
	$meta = [];

	foreach(range(0, $stmt->columnCount() - 1) as $column_index)
	{
	  $meta[] = $stmt->getColumnMeta($column_index);
	}

	foreach($meta as $row)
	{
		print_r($row);
		echo '<br>';
	}
}
?>
<html> 
<head>
<style>
    table {
        border-spacing: 0;
        border-collapse: collapse;
    }

    table td, table th {
        border: 1px solid #ccc;
        padding: 5px;
    }
    
    table th {
        background: #eee;
    }

	.treeline, .treeline ul, .treeline li {
		margin: 0; padding: 0; line-height: 1.2; list-style: none;
	}
	.treeline ul {
		margin: 0 0 0 15px; /* отступ вертикальной линии */
	}
	.treeline > li:not(:only-child), .treeline li li {
		position: relative;
		padding: 3px 0 0 20px; /* отступ текста */
	}

	/* Стиль вертикальной линии */
	.treeline li:not(:last-child) {
		border-left: 1px solid #ccc;
	}
	
	/* Стили горизонтальной линии*/  
	.treeline li li:before, .treeline > li:not(:only-child):before {
		content: ""; position: absolute; top: 0; left: 0;
		width: 1.1em; height: .7em; border-bottom:1px solid #ccc;
	}

	/* Вертикальная линия последнего пункта в списка */ 
	.treeline li:last-child:before {
		width: calc(1.1em - 1px); border-left: 1px solid #ccc;
	}
	
</style>
<title>Список таблиц</title> 
</head> 
<body>
<div style="float: left">
<?php 
if(empty($_POST['db_name'])){
	echo '<form method="POST">
		<input type="text" name="db_name" placeholder="Название базы" value="" />
		<input type="text" name="table_name" placeholder="Название таблицы" value="" />
		<input type="submit" name="show" value= "Show!"/>
	</form>';
}
else{
	echo '<form method="POST">
		<input type="text" name="db_name" placeholder="Название базы" value="'.$_POST['db_name'].'" />
		<input type="text" name="table_name" placeholder="Название таблицы" value="'.$_POST['table_name'].'" />
		<input type="submit" name="show" value= "Show!"/>
	</form>';
	
	showDB($_POST['db_name']);
	echo'<br>';
	showColumns($_POST['db_name'], $_POST['table_name']);
}
?>
</div>
<div style="float: left;margin-left: 40px;"></div>
<div style="clear: both"></div>
<br>
<div>
<?php 
/*
<ul class="treeline">
   <li>Главное меню
     <ul>
      <li>База знаний
     <ul>
       <li>Компоненты</li>
       <li>Плагины</li>
       <li>Модули</li>
     </ul>
   </li>
   <li>Отзывы</li>
   <li>Контакты</li>
     </ul>
   </li>
</ul>
*/
?>

</div>
</body> 
</html>