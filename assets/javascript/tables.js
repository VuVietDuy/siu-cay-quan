document.addEventListener("DOMContentLoaded", () => {
  const qrCodeElements = document.querySelectorAll("[id^='qrcode-']");

  qrCodeElements.forEach((element) => {
    const qrData = element.getAttribute("data-qr-code");
    new QRCode(element, {
      text: "http://172.17.0.1:8000/menu?table=2",
      width: 50,
      height: 50,
    });
  });
});

// document.addEventListener('DOMContentLoaded', function () {
//     const updateTableButtons = document.querySelectorAll('.updateTableBtn');

//     updateTableButtons.forEach(button => {
//         button.addEventListener('click', function () {
//             console.log("first")
//             // Lấy dữ liệu từ các thuộc tính data-*
//             const tableId = this.getAttribute('data-table-id');
//             const capacity = this.getAttribute('data-table-capacity');
//             const status = this.getAttribute('data-table-status');
//             const isActive = this.getAttribute('data-table-active') == "1";
//             console.log(tableId)

//             // Điền dữ liệu vào các trường trong modal
//             document.getElementById('table_id').value = tableId;
//             document.getElementById('capacity').value = capacity;
//             document.querySelector('select[name="status"]').value = status;
//             document.getElementById('isActiveCheckBox').checked = isActive;

//             // Hiển thị phần QR code nếu có
//             document.getElementById('qrcode').innerText = `QR code for Table ${tableId}`;
//             document.querySelector('.qrcode-container').classList.remove('d-none');
//         });
//     });
// });
