<!DOCTYPE html>
<html>
<head>
	<title>Chapkfet qrCode scanner</title>
	<script src="js/html5-qrcode.min.js"></script>
	
</head>
<body>
	<div id="reader" width="600px"></div>
</body>

<script type="text/javascript">
		function onScanSuccess(decodedText, decodedResult) {
    // Handle on success condition with the decoded text or result.
    console.log(`Scan result: ${decodedText}`, decodedResult);
}

var html5QrcodeScanner = new Html5QrcodeScanner(
	"reader", { fps: 10, qrbox: 250 });
html5QrcodeScanner.render(onScanSuccess);
	</script>
</html>