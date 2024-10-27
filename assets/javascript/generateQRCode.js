
var qrcode = new QRCode("qrcode");

const qrcodeContainer = $('.qrcode-container')


function makeCode () {    
  var elText = document.getElementById("table_id");
  
  if (!elText.value) {
    return;
  }

  const data = "http://localhost:8000/qrcode" + elText.value
  
  qrcode.makeCode(data);

  console.log(qrcode)
}

makeCode();

document.getElementById("table_id").oninput = function (e) {
    console.log(e.target.value)
    if (e.target.value) {
      
    }
    qrcodeContainer.removeClass("d-none")
    makeCode();
  }

document.getElementById("exportBtn").addEventListener("click", function() {
    html2canvas(document.querySelector("#qrcode")).then(canvas => {
        // Tạo đường dẫn cho ảnh từ canvas
        var imgURL = canvas.toDataURL("image/png");

        // Tạo một thẻ link để tải ảnh
        var downloadLink = document.createElement("a");
        downloadLink.href = imgURL;
        downloadLink.download = "exported_image.png";
        downloadLink.click();
    });
});

