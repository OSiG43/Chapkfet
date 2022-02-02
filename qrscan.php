<!DOCTYPE html>
<html>
<head>
	<title>Chapkfet qrCode scanner</title>
	<script src="js/html5-qrcode.min.js"></script>
    	<link rel="stylesheet" href="../css/qrscan.css">
	
</head>
<body>
	<a href="../index.php" class="button">Accueil</a>
	<div id="reader" width="95%"></div>
</body>

<script type="text/javascript">

const html5QrCode = new Html5Qrcode("reader");
const qrCodeSuccessCallback = (decodedText, decodedResult) => {
     document.location.href = `${decodedText}`;
};
const config = { fps: 10, qrbox: { width: 250, height: 250 } };

// If you want to prefer front camera
html5QrCode.start({ facingMode: "environment" }, config, qrCodeSuccessCallback);
	</script>
</html>