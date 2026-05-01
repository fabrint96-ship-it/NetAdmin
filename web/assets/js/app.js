const buscador = document.getElementById("buscar");

if (buscador) {
    buscador.addEvemntListener("keyup", function() {
        const filtro = this.value.toLowerCase();
        const filas = document.querySelectorAll(".fila-equipo");

        filas.forEach(fila=> {
            const texto = fila.textContent.toLowerCase();

            if(texto.includes(filtro)){
                fila.computedStyleMap.display = "";
            }else{
                fila.computedStyleMap.display="none";
            }
        });
    });
}

const enlacesEliminar = document.querySelectorAll(".delete-link");

enlacesEliminar.forEach(enlace => {
    enlace.addEventListener("click",function(e){
        const confirmar= confirm("¿Seguro que quieres eliminar este registro?");

        if(!confirmar){
            e.preventDefault();
        }
    });
});