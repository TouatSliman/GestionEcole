const profilePic = document.querySelector(".profilePic");
const imageInput = document.querySelector(".fileInput");


imageInput.addEventListener("change", function () {
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    const uploadedImage = reader.result;
    profilePic.setAttribute("src", uploadedImage);
  });
  reader.readAsDataURL(this.files[0]);
});
