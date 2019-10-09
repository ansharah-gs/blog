<!DOCTYPE html>
<html>
<head>
	<title>Test Page</title>
</head>
<body>
	<h1><?= htmlspecialchars($name, ENT_QUOTES)?></h1>
	<h1>{{$name}}</h1>

</body>
</html>