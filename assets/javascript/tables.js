document.addEventListener("DOMContentLoaded", () => {
    const qrCodeElements = document.querySelectorAll("[id^='qrcode-']");

    qrCodeElements.forEach(element => {
        const qrData = element.getAttribute("data-qr-code");
        new QRCode(element, {
            text: "http://172.17.0.1:8000/menu?table=1",
            width: 50,
            height: 50
        });
    });
});


console.log("Table management")