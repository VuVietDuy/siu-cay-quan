document.addEventListener("DOMContentLoaded", () => {
    const qrCodeElements = document.querySelectorAll("[id^='qrcode-']");

    qrCodeElements.forEach(element => {
        const qrData = element.getAttribute("data-qr-code");
        new QRCode(element, {
            text: qrData,
            width: 50,
            height: 50
        });
    });
});


console.log("Table management")