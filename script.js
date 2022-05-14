let sd = document.querySelector(".sd");
let sdBtn = document.querySelector(".sdBtn");
sdBtn.onclick = function() {
  sd.classList.toggle("active");  
  if(sd.classList.contains("active")){
  sdBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sdBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
