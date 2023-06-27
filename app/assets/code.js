class Save {
  static guardar() {
    const bodyForm = document.getElementById("form-input");
    const formulary = new FormData(bodyForm);
    console.log(formulary);
    fetch("../controllers/programas/guardar.php", {
      method: "POST",
      body: formulary,
    })
      .then((res) => console.log(res.json()))
      .then((data) => {
        console.log(data);
      })
      .catch((error) => console.log(error));
  }
}