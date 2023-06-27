let elmtsMostrados = 0;

const masInfo = document.querySelector(".container-info");
const containerAbsoluto = document.querySelector("#container-absoluto")
const darMensaje = document.querySelector("#mensajes")




containerAbsoluto.addEventListener('click', (e) => {
     if(e.target.id == containerAbsoluto.id){
      containerAbsoluto.style.height = "100%" 
      containerAbsoluto.style.display = "none";
     }
})

function eliminarPrograma (param) {
    Programa.eliminar(param).then((res) => console.log(res))
}



function actualizar(param) {
  Programa.editar(param).then((res) => {
    masInfo.innerHTML = `<h2>${res.nomb_programa} - ${res.snies} </h2>
    <div class="info-programa">INSTITUCION: <spam class="info-programa-rta">${res.nomb_inst} </spam>
    </div>
    <div class="info-programa">Creditos: <spam class="info-programa-rta">${res.creditos}</spam>
    </div>
    <div class="info-programa">SEMESTRES: <spam class="info-programa-rta">${res.semestres}</spam>
    </div>
    <div class="info-programa">PERIOCIDAD: <spam class="info-programa-rta">${res.periocidad}</spam>
    </div>
    <div class="info-programa">ESTADO: <spam class="info-programa-rta">${res.nomb_estado}</spam></div>
    <div class="info-programa">UBICACION: <spam class="info-programa-rta">${res.nomb_munic}/${res.nomb_depto}</spam></div>
    <div class="info-programa">NIVEL ACADEMICO: <spam class="info-programa-rta">${res.nomb_nivel}</spam></div>
    <div class="info-programa">MODALIDAD: <spam class="info-programa-rta">${res.nomb_modalidad}</spam></div>
    <div class="info-programa">RECONOCIMIENTOS: <spam class="info-programa-rta">${res.nomb_tipo}</spam></div>
    <div class="info-programa">CAMPO AMPLIO: <spam class="info-programa-rta">${res.nomb_amplio}</spam></div>
    <div class="info-programa">CAMPO ESPECIFICO: <spam class="info-programa-rta">${res.nomb_especifico}</spam></div>
    <div class="info-programa">CAMPO DETALLADO: <spam class="info-programa-rta">${res.nomb_detallado}</spam></div>` 
  });
  masInfo.style.display = "flex"
  darMensaje.style.display = "none";
  containerAbsoluto.style.display = "block";
  containerAbsoluto.style.height = "170vh" 
};
const concatenarProgramas = document.getElementById("agregar-programas");
const contenedorTabla = document.querySelector(".container-table")

function cargarContenido() {
  Programa.grupoScroll(elmtsMostrados).then((res) => {
    elmtsMostrados = elmtsMostrados + 10;
    res.forEach((re) => {
      concatenarProgramas.innerHTML += `
      <tr >
      <th scope="row">${re.snies}</th>
      <td>${re.nomb_programa}</td>
      <td>${re.nomb_inst} </td>
      <td>${re.nomb_munic}</td>
      <td>${re.nomb_modalidad}</td>
      <td><a name="" id="" class="btn btn-danger" href="#" role="button" onclick="eliminarPrograma(${re.snies})">Eliminar</a><a name="" id=""
              class="btn btn-primary" onclick="actualizar(${re.snies})" role="button">Actualizar</a><a name="" id=""
              class="btn btn-success" href="#" role="button">Mas</a></td>
  </tr>`;
    });
  });
}


contenedorTabla.addEventListener("scroll", (e) => {
  if (
    contenedorTabla.scrollTop + contenedorTabla.clientHeight ==
    contenedorTabla.scrollHeight
  ) {
    cargarContenido();
  }
});



class Programa {
  

  static async grupoScroll(cantidad) {
    const formu = new FormData();
    formu.append("cantidad", cantidad);
    const respuesta = fetch("../controllers/programas/listar.php", {
      method: "POST",
      body: formu,
    })
      .then((res) => res.json())
      .then((data) => {
        return data;
      })

      .catch((error) => console.log(error));
    return respuesta;
  }

  

  static async editar(snies) {
    const formu = new FormData();
    formu.append("snies", snies);
    console.log(formu)
    const respuesta = fetch("../controllers/programas/actualizar.php", {
      method: "POST",
      body: formu
    })
      .then((res) => res.json())
      .then((data) => {
        return data;
      })

      .catch((error) => console.log(error));
    return respuesta;
  }

  static async eliminar(snies) {
    const formulario = new FormData();
    formulario.append("snies", snies);
    console.log(formulario);
    fetch("../controllers/programas/eliminar.php", {
      method: "POST",
      body: formulario,
    })
      .then((res) => res.json().then((re) => {
        if(re){
          darMensaje.style.display = "block";
          containerAbsoluto.style.display = "block";
          masInfo.style.display = "none"
          darMensaje.innerHTML = `PROGRAMA ${snies} ELIMINADO CORRECTAMENTE`
        }
      }))
      .then((data) => {
       
      })
      .catch((error) => console.log(error));
    
  }
}

cargarContenido();

