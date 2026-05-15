<script src="assets/js/app.js"></script>
<script>
function togglePassword(inputId, element) {
    const input = document.getElementById(inputId);

    if (!input) return;

    if (input.type === "password") {
        input.type = "text";
        element.textContent = "🙈";
    } else {
        input.type = "password";
        element.textContent = "👁️";
    }
}
</script>
</body>
</html>