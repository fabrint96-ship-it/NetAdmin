const buscador = document.getElementById("buscar");

if (buscador) {
    buscador.addEventListener("keyup", function () {
        const filtro = this.value.toLowerCase();
        const filas = document.querySelectorAll(".fila-equipo");

        filas.forEach(fila => {
            fila.style.display = fila.textContent.toLowerCase().includes(filtro) ? "" : "none";
        });
    });
}