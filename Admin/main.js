// input enter

// Get the input field
var inputField = document.getElementById("inputField");

// Add an event listener to the input field
inputField.addEventListener("keydown", function(event) {
  // Check if the pressed key is Enter (key code 13)
  if (event.key === "Enter") {
    // Change the location to the new HTML file
    window.location.href = "file:///D:/THUAN/VS%20Code/first%20web/Admin/adminOrderManagement.html";
  }
});

function indexClick() {
  window.location.href = "http://127.0.0.1:5500/Sign-in.html";
} 

function paymentButton() {
  alert("Bạn đã đặt hàng thành công !");
}

function addUserButton() {
  alert("Đã thêm người dùng thành công !")
}

function totalClick(click) {
  const totalClicks = document.getElementById('totalClicks');
  const sumvalue = parseInt(totalClicks.innerText) + click;
  console.log(sumvalue + click);
  totalClicks.innerText = sumvalue;

  // avoid negatives
  if(sumvalue < 0) {
    totalClicks.innerText = 0;
  }
}

// xóa ảnh
const imageContainer = document 
            .getElementById('imageContainer'); 
  
        imageContainer.addEventListener('click', 
            function (event) {
            if (event.target.classList.contains('deleteButton')) {
              const imageElement = event.target.previousElementSibling;
              imageElement.parentNode.removeChild(imageElement);
            }
          }); 
