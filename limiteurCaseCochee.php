<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Comment limiter le nombre de cases checkbox cochées en JavaScript ?</title>
</head>
<body>
<input type="checkbox" id="case1" class="case" onClick="doAction(id)"> Case 1
<br>
<input type="checkbox" id="case2"  class="case" onClick="doAction(id)"> Case 2
<br>
<input type="checkbox" id="case3"  class="case" onClick="doAction(id)"> Case 3
<br>
<input type="checkbox" id="case4"  class="case" onClick="doAction(id)"> Case 4
<br>
<input type="checkbox" id="case5"  class="case" onClick="doAction(id)"> Case 5
<script>
function doAction(idCase) {
	var max = 3;
	var z = 0;
	var checkBox = document.getElementById(idCase)
	var checkboxes = document.getElementsByClassName("case");
	for (var i = 0; i < checkboxes.length; i++) {
		if (checkboxes.item(i).checked == true) {
		z++
		}
	}
	if (z > max) {
		checkBox.checked = false;
		}
}
</script>
</body>
</html>