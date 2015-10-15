<!DOCTYPE html>
<html>
<head>
<title>フォーム</title>
</head>
<body>
<?php if (isset($_GET['name']) && strlen($_GET['name']) > 0): ?>
<p><?php echo htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8'); ?>さんこんにちは</p>
<?php endif ; ?>

<?php


$r = 'r';
$tes[] = $r;
var_dump($tes);


?>

<form action = "sample.php" method="get">
	<p>名前を入力してください:
	<input type = "text" name="name">
	<input type = "submit" value="送信">
	</p>
<?php echo "testzzcxxcxz" ;>
</form>
</body>
</html>