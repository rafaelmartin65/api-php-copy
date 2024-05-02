document.getElementById("botonAceptar").addEventListener("click", () => {
  console.log("Carga de formulario");
  const form = document.getElementById("formularioMantenimiento");
  const formData = new FormData(form);
  const formDataJson = Object.fromEntries(formData.entries());
  console.log(formDataJson);

  if (ultimo + 1 == formDataJson["id"]) {
    // Configurar las opciones de la solicitud fetch
    const fetchOptions = {
      method: "POST",
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(formDataJson),
    };
    // Enviar la solicitud fetch al la API
    fetch("http://localhost/API-PHP/Ejercicio10-API/", fetchOptions)
      .then((response) => response.text())
      .then((data) => {
        console.log("Respuesta del servidor:", data);
        fetch("subeFoto.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.text())
          .then((devuelve) => {
            console.log(devuelve);
          });
        // location.href ="./index.php";
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  } else {
    // Configurar las opciones de la solicitud fetch
    const fetchOptions = {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formDataJson),
    };
    // Enviar la solicitud fetch al servidor de la API
    fetch("http://localhost/API-PHP/Ejercicio10-API/" + formDataJson.id, fetchOptions)
      .then((response) => response.text())
      .then((data) => {
        console.log("Respuesta del servidor:", data);
        fetch("subeFoto.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.text())
          .then((devuelve) => {
            console.log(devuelve);
          });
        location.href ="./index.php";
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
});

function cargafoto() {
  document.getElementById("foto").src = window.URL.createObjectURL(
    document.getElementById("nuevaFoto").files[0]
  );
}
