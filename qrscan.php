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

const html5QrCode = new Html5Qrcode("reader");
const qrCodeSuccessCallback = (decodedText, decodedResult) => {
     document.location.href = `hints/${decodedText}.php`;
};
const config = { fps: 10, qrbox: { width: 250, height: 250 } };

// If you want to prefer front camera
html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	</script>
</html>