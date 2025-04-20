
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form-contacto");

    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const nombre = document.getElementById("nombre").value.trim();
            const correo = document.getElementById("correo").value.trim();
            const mensaje = document.getElementById("mensaje").value.trim();

            const data = {
                nombre: nombre,
                correo: correo,
                mensaje: mensaje
            };

            fetch("http://localhost:8000/contacto", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(result => {
                if (result.mensaje) {
                    alert("✅ " + result.mensaje);
                    form.reset();
                } else {
                    alert("❌ Error: " + result.error);
                }
            })
            .catch(error => {
                console.error("Error al enviar el formulario:", error);
                alert("❌ Ocurrió un error al enviar el formulario.");
            });
        });
    }
});
