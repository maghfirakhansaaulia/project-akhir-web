document.getElementById("formulir").addEventListener("submit", function (e) {
  e.preventDefault();
  let nama = document.getElementById("nama");
  let namaValue = nama.value;

  localStorage.setItem("infoNama", namaValue);
});
