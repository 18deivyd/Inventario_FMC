// Incluye la librería en tu HTML con <script src="https://unpkg.com/html5-qrcode"></script>

const html5QrCode = new Html5Qrcode("qr-reader");
const barcodeInput = document.getElementById("barcode-input");

const config = { fps: 10, qrbox: { width: 250, height: 250 } };

// Función que se activa cuando se detecta un código
const qrCodeSuccessCallback = (decodedText, decodedResult) => {
    // Asigna el valor decodificado al input
    barcodeInput.value = decodedText;
    // Opcional: detén el escáner después de una lectura exitosa
    html5QrCode.stop();
};

// Inicia el escáner con la cámara trasera
html5QrCode.start(
    { facingMode: { exact: "environment" } },
    config,
    qrCodeSuccessCallback
);