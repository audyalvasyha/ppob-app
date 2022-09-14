// const brand = document.querySelector(".brand > h3");

// // Menambahkan class show
// document.getElementById("angleLeft").classList.add("show");

// const sideEffect = (st) => {
//   let al = document.getElementById("angleLeft");
//   let bar = document.getElementById("btnBars");
//   if (st == "show") {
//     (sidebar.style.width = "80px"), (brand.style.display = "none");
//     al.classList.remove("show");
//     bar.classList.add("show");
//     getWidth(80);
//   } else {
//     (sidebar.style.width = "256px"), (brand.style.display = "block");
//     al.classList.add("show");
//     bar.classList.remove("show");
//     getWidth(256);
//   }
// };

// btnToggle.onclick = () => {
//   if (document.getElementById("angleLeft").classList.contains("show")) {
//     sideEffect("show"); // show btn-bars
//   } else {
//     sideEffect("hide"); // hide btn-bars
//   }
// };

// const getWidth = (w) => {
//   let c = document.querySelectorAll("li.item-menu > span:last-child");
//   if (w == 80) {
//     for (let i = 0; i < c.length; i++) {
//       document.querySelectorAll("li.item-menu")[i].style.justifyContent =
//         "center";
//       c[i].style.display = "none";
//     }
//   } else {
//     for (let i = 0; i < c.length; i++) {
//       document.querySelectorAll("li.item-menu")[i].style.justifyContent =
//         "start";
//       c[i].style.display = "block";
//     }
//   }
// };

// Code diatas adalah sementara
function btnToggle() {
  // menjalankan fungsi saat btn-bars di klik
  const sidebar = document.getElementById("sidebar");
  const bgSide = document.getElementById("bgSide");
  // Configurasi behavior tombol
  let param = [
    { targetName: sidebar, value: "show" },
    { targetName: bgSide, value: "bg-side" },
  ];

  // Filter nilai atribute class target
  if (sidebar.classList.contains("show")) {
    toggle.hideBar(param); // object fungsi untuk menyembunyikan sidebar
  } else {
    toggle.showBar(param); // object fungsi untuk menampilkan sidebar
  }
}
// Object Literal yang membuat method behavior btn-bars
const toggle = {
  hideBar: function (targets) {
    targets.map((attr) => {
      attr.targetName.classList.remove(attr.value);
    });
    return (document.body.style.overflow = "scroll");
  },
  showBar: function (targets) {
    targets.map((attr) => {
      attr.targetName.classList.add(attr.value);
    });
    return (document.body.style.overflow = "hidden");
  },
};
