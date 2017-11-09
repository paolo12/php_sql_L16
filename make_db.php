<?php
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

/* Функция создает таблицу в базе данных */
function makeTable($table_name){
	var_dump($table_name);
	echo '<br>';
	print_r($table_name);
	echo '<br>';
	$pdo = connectToDatabase($GLOBALS['host'],  $GLOBALS['databaseName'], $GLOBALS['user'], $GLOBALS['pass']);
	$stmt = $pdo->prepare('CREATE TABLE IF NOT EXISTS ? (`id` int(11) NOT NULL AUTO_INCREMENT, PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8');
	$stmt->bindValue(1, strval($table_name), PDO::PARAM_STR);
	$stmt->execute();
	echo '<br>';
	$arr = $stmt->errorInfo();
	echo '<br>';
	print_r($arr);
}

function addField(){
	/*
	$_POST['field_name'], $_POST['field_types']
	ALTER TABLE car ADD create_date create_date create_date create_date create_date create_date create_date create_date create_date create_date create_date create_date TIMESTAMPTIMESTAMPTIMESTAMPTIMESTAMPTIMESTAMPTIMESTAMPTIMESTAMPTIMESTAMPTIMESTAMP;
	*/
}

$select_fild_type = '<select name="field_types"><option value=""><optgroup label="armscii8"><option>armscii8_bin<option>armscii8_general_ci</optgroup><optgroup label="ascii"><option>ascii_bin<option>ascii_general_ci</optgroup><optgroup label="big5"><option>big5_bin<option>big5_chinese_ci</optgroup><optgroup label="binary"><option>binary</optgroup><optgroup label="cp1250"><option>cp1250_bin<option>cp1250_croatian_ci<option>cp1250_czech_cs<option>cp1250_general_ci<option>cp1250_polish_ci</optgroup><optgroup label="cp1251"><option>cp1251_bin<option>cp1251_bulgarian_ci<option>cp1251_general_ci<option>cp1251_general_cs<option>cp1251_ukrainian_ci</optgroup><optgroup label="cp1256"><option>cp1256_bin<option>cp1256_general_ci</optgroup><optgroup label="cp1257"><option>cp1257_bin<option>cp1257_general_ci<option>cp1257_lithuanian_ci</optgroup><optgroup label="cp850"><option>cp850_bin<option>cp850_general_ci</optgroup><optgroup label="cp852"><option>cp852_bin<option>cp852_general_ci</optgroup><optgroup label="cp866"><option>cp866_bin<option>cp866_general_ci</optgroup><optgroup label="cp932"><option>cp932_bin<option>cp932_japanese_ci</optgroup><optgroup label="dec8"><option>dec8_bin<option>dec8_swedish_ci</optgroup><optgroup label="eucjpms"><option>eucjpms_bin<option>eucjpms_japanese_ci</optgroup><optgroup label="euckr"><option>euckr_bin<option>euckr_korean_ci</optgroup><optgroup label="gb18030"><option>gb18030_bin<option>gb18030_chinese_ci<option>gb18030_unicode_520_ci</optgroup><optgroup label="gb2312"><option>gb2312_bin<option>gb2312_chinese_ci</optgroup><optgroup label="gbk"><option>gbk_bin<option>gbk_chinese_ci</optgroup><optgroup label="geostd8"><option>geostd8_bin<option>geostd8_general_ci</optgroup><optgroup label="greek"><option>greek_bin<option>greek_general_ci</optgroup><optgroup label="hebrew"><option>hebrew_bin<option>hebrew_general_ci</optgroup><optgroup label="hp8"><option>hp8_bin<option>hp8_english_ci</optgroup><optgroup label="keybcs2"><option>keybcs2_bin<option>keybcs2_general_ci</optgroup><optgroup label="koi8r"><option>koi8r_bin<option>koi8r_general_ci</optgroup><optgroup label="koi8u"><option>koi8u_bin<option>koi8u_general_ci</optgroup><optgroup label="latin1"><option>latin1_bin<option>latin1_danish_ci<option>latin1_general_ci<option>latin1_general_cs<option>latin1_german1_ci<option>latin1_german2_ci<option>latin1_spanish_ci<option>latin1_swedish_ci</optgroup><optgroup label="latin2"><option>latin2_bin<option>latin2_croatian_ci<option>latin2_czech_cs<option>latin2_general_ci<option>latin2_hungarian_ci</optgroup><optgroup label="latin5"><option>latin5_bin<option>latin5_turkish_ci</optgroup><optgroup label="latin7"><option>latin7_bin<option>latin7_estonian_cs<option>latin7_general_ci<option>latin7_general_cs</optgroup><optgroup label="macce"><option>macce_bin<option>macce_general_ci</optgroup><optgroup label="macroman"><option>macroman_bin<option>macroman_general_ci</optgroup><optgroup label="sjis"><option>sjis_bin<option>sjis_japanese_ci</optgroup><optgroup label="swe7"><option>swe7_bin<option>swe7_swedish_ci</optgroup><optgroup label="tis620"><option>tis620_bin<option>tis620_thai_ci</optgroup><optgroup label="ucs2"><option>ucs2_bin<option>ucs2_croatian_ci<option>ucs2_czech_ci<option>ucs2_danish_ci<option>ucs2_esperanto_ci<option>ucs2_estonian_ci<option>ucs2_general_ci<option>ucs2_general_mysql500_ci<option>ucs2_german2_ci<option>ucs2_hungarian_ci<option>ucs2_icelandic_ci<option>ucs2_latvian_ci<option>ucs2_lithuanian_ci<option>ucs2_persian_ci<option>ucs2_polish_ci<option>ucs2_roman_ci<option>ucs2_romanian_ci<option>ucs2_sinhala_ci<option>ucs2_slovak_ci<option>ucs2_slovenian_ci<option>ucs2_spanish2_ci<option>ucs2_spanish_ci<option>ucs2_swedish_ci<option>ucs2_turkish_ci<option>ucs2_unicode_520_ci<option>ucs2_unicode_ci<option>ucs2_vietnamese_ci</optgroup><optgroup label="ujis"><option>ujis_bin<option>ujis_japanese_ci</optgroup><optgroup label="utf16"><option>utf16_bin<option>utf16_croatian_ci<option>utf16_czech_ci<option>utf16_danish_ci<option>utf16_esperanto_ci<option>utf16_estonian_ci<option>utf16_general_ci<option>utf16_german2_ci<option>utf16_hungarian_ci<option>utf16_icelandic_ci<option>utf16_latvian_ci<option>utf16_lithuanian_ci<option>utf16_persian_ci<option>utf16_polish_ci<option>utf16_roman_ci<option>utf16_romanian_ci<option>utf16_sinhala_ci<option>utf16_slovak_ci<option>utf16_slovenian_ci<option>utf16_spanish2_ci<option>utf16_spanish_ci<option>utf16_swedish_ci<option>utf16_turkish_ci<option>utf16_unicode_520_ci<option>utf16_unicode_ci<option>utf16_vietnamese_ci</optgroup><optgroup label="utf16le"><option>utf16le_bin<option>utf16le_general_ci</optgroup><optgroup label="utf32"><option>utf32_bin<option>utf32_croatian_ci<option>utf32_czech_ci<option>utf32_danish_ci<option>utf32_esperanto_ci<option>utf32_estonian_ci<option>utf32_general_ci<option>utf32_german2_ci<option>utf32_hungarian_ci<option>utf32_icelandic_ci<option>utf32_latvian_ci<option>utf32_lithuanian_ci<option>utf32_persian_ci<option>utf32_polish_ci<option>utf32_roman_ci<option>utf32_romanian_ci<option>utf32_sinhala_ci<option>utf32_slovak_ci<option>utf32_slovenian_ci<option>utf32_spanish2_ci<option>utf32_spanish_ci<option>utf32_swedish_ci<option>utf32_turkish_ci<option>utf32_unicode_520_ci<option>utf32_unicode_ci<option>utf32_vietnamese_ci</optgroup><optgroup label="utf8"><option>utf8_bin<option>utf8_croatian_ci<option>utf8_czech_ci<option>utf8_danish_ci<option>utf8_esperanto_ci<option>utf8_estonian_ci<option>utf8_general_ci<option>utf8_general_mysql500_ci<option>utf8_german2_ci<option>utf8_hungarian_ci<option>utf8_icelandic_ci<option>utf8_latvian_ci<option>utf8_lithuanian_ci<option>utf8_persian_ci<option>utf8_polish_ci<option>utf8_roman_ci<option>utf8_romanian_ci<option>utf8_sinhala_ci<option>utf8_slovak_ci<option>utf8_slovenian_ci<option>utf8_spanish2_ci<option>utf8_spanish_ci<option>utf8_swedish_ci<option>utf8_turkish_ci<option>utf8_unicode_520_ci<option>utf8_unicode_ci<option>utf8_vietnamese_ci</optgroup><optgroup label="utf8mb4"><option>utf8mb4_bin<option>utf8mb4_croatian_ci<option>utf8mb4_czech_ci<option>utf8mb4_danish_ci<option>utf8mb4_esperanto_ci<option>utf8mb4_estonian_ci<option>utf8mb4_general_ci<option>utf8mb4_german2_ci<option>utf8mb4_hungarian_ci<option>utf8mb4_icelandic_ci<option>utf8mb4_latvian_ci<option>utf8mb4_lithuanian_ci<option>utf8mb4_persian_ci<option>utf8mb4_polish_ci<option>utf8mb4_roman_ci<option>utf8mb4_romanian_ci<option>utf8mb4_sinhala_ci<option>utf8mb4_slovak_ci<option>utf8mb4_slovenian_ci<option>utf8mb4_spanish2_ci<option>utf8mb4_spanish_ci<option>utf8mb4_swedish_ci<option>utf8mb4_turkish_ci<option>utf8mb4_unicode_520_ci<option>utf8mb4_unicode_ci<option>utf8mb4_vietnamese_ci</optgroup></select>';
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
</style>
<title>Список таблиц</title> 
</head> 
<body>
<div style="float: left">
<?php 
	if(empty($_POST['make_table_name'])){
		echo 'Введите имя таблицы:';
		echo '<form method="POST">
			<input type="text" name="make_table_name" placeholder="Название таблицы" value="" />
			<input type="submit" name="make_table" value= "Make!"/>
		</form>';
	}
	else{
		makeTable($_POST['make_table_name']);
		echo 'Таблица '.$_POST["make_table_name"].' создана!<br>';
		echo '<table>
			<tr>
				<th>Название поля</th>
				<th>Значение поля</th>
				<th>Тип поля</th>
				<th></th>
			</tr>
			<form method="POST">
				<tr>
					<td><input type="text" name="field_name" placeholder="Название поля" value="" /></td>
					<td>'.$select_fild_type.'</td>
					<td><input type="text" name="field_value" placeholder="Значение поля" value="" /></td>
					<td><input type="hidden" name="table_name" value="'.$_POST["make_table_name"].'">
					<input type="submit" name="add_field" value= "Добавить поле"/></td>
				</tr>
			</form>
		</table>';
	}
?>
</div>
<div style="float: left;margin-left: 40px;"></div>
<div style="clear: both"></div>
</body> 
</html>