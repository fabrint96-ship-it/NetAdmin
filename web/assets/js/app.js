const buscador = document.getElementById("buscar");

if (buscador) {
    buscador.addEventListener("keyup", function () {
        const filtro = this.value.toLowerCase();
        const filas = document.querySelectorAll(".fila-equipo");

        filas.forEach(fila => {
            const texto = fila.textContent.toLowerCase();
            fila.style.display = texto.includes(filtro) ? "" : "none";
        });
    });
}

const deleteLinks = document.querySelectorAll(".delete-link");

deleteLinks.forEach(link => {
    link.addEventListener("click", function (e) {
        const confirmar = confirm("¿Seguro que quieres eliminar este registro?");
        if (!confirmar) {
            e.preventDefault();
        }
    });
});