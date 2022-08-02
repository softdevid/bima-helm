const searchButton = document.querySelectorAll(".search-button");
searchButton.forEach(function (sBtn) {
  sBtn.addEventListener("click", async function () {
    const input = this.previousElementSibling.value;
    const id = this.previousElementSibling.id;
    const data = kecamatan.filter((kec) => kec.label.toLowerCase().includes(input.toLowerCase()));
    updateSelect(id, data);
  });
});

function updateSelect(id, data) {
  document.querySelectorAll(`#select-${id} option`).forEach((option) => option.remove());
  let option = "";
  data.forEach((dt) => {
    option += `<option value="${dt.value}">${dt.label}</option>`;
  });
  document.getElementById(`select-${id}`).innerHTML = option;
}

//get data ONGKIR
document.getElementById("get").addEventListener("click", async function () {
  const from = document.getElementById("select-from").value;
  const to = document.getElementById("select-to").value;
  const weight = document.getElementById("weight").value;

  const data = await getData(from, to, weight);
  console.log(data);
});

async function getData(from, to, weight) {
  try {
    const response = await fetch(`getData.php?action=hitung_auto&kec=${to}&kurir=jne:jnt:anteraja:ninja:sicepat&asal=${from}&berat=${weight}`);
    const data = await response.json();
    return data.rajaongkir;
  } catch (err) {
    return console.log(err);
  }
}
