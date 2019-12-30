console.log("-> Image Switcher Loaded!");

let featured_img = document.querySelector(".profile-img");
let img_gallery_item = (document.onclick = getSelectedImageSrc);

function getSelectedImageSrc(e) {
  featured_img.src = e.srcElement.src;
}
