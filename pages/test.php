<html>
<head>
	<title></title>
	<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>

	<button name="test">  test ajax </button>
	<input type="text" name="inputtest"/>

</body>
<script>
$('button[name=test]').click(function(){
	
	$('input[name=inputtest]').css("border", "1px solid red");

	
});
</script>
</html>