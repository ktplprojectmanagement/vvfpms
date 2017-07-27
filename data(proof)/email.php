<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
	$(document).ready(function(){

	$("#button").click(function(){

		var regexp = /^([a-z]{3,5})([0-9]{0,3})([@]{1})([a-z]{2,6})([.]{1})([a-z]{2,3})$/;
		var assign = $("#test").val();
		if ($("#test").val() == '') 
		{
			alert("Please enter text.");
		}
		else if(!regexp.test(assign))
		{
			alert("Please enter valid text.");
		}
		
});

});
</script>
</head>
<body>

	<p>EMAIL ID: <input type="text" id="test"></p>
	<button id="button">insert</button>

</body>
</html>