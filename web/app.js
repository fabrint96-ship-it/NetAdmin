const buscador = document.getElementById("buscar");

if (buscador) {
    buscador.addEventListener("keyup", function () {
        const filtro = this.value.toLowerCase();
        const cards = document.querySelectorAll(".card");

        cards.forEach(card => {
            const texto = card.textContent.toLowerCase();
            card.style.display = texto.includes(filtro) ? "block" : "none";
        });
    });
}
