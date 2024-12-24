var qrcode = new QRCode("qrcode");

const qrcodeContainer = document.querySelector(".qrcode-container");

function makeCode() {
  var elText = document.getElementById("table_id");

  if (!elText.value) {
    return;
  }

  const data = `http://10.20.182.203:8000/menu?table=${elText.value}`;

  qrcode.makeCode(data);

  console.log(qrcode);
}

makeCode();

document.getElementById("table_id").oninput = function (e) {
  console.log(e.target.value);
  if (e.target.value) {
  }
  qrcodeContainer.classList.remove("d-none");
  makeCode();
};

document.getElementById("exportBtn").addEventListener("click", function () {
  html2canvas(document.querySelector("#qrcode")).then((canvas) => {
    var imgURL = canvas.toDataURL("image/png");

    var downloadLink = document.createElement("a");
    downloadLink.href = imgURL;
    downloadLink.download =
      "qr_code_table_" + document.getElementById("table_id").value + ".png";
    downloadLink.click();
  });
});

const colorPicker = document.getElementById("colorPicker");

// Lắng nghe sự kiện 'change' khi người dùng chọn màu
colorPicker.addEventListener("change", function () {
  const color = colorPicker.value;
  console.log(color); // In ra giá trị màu đã chọn

  // Cập nhật màu nền của QR Code khi chọn màu mới
  document.querySelector("#qrcode").style.color = color;
});
