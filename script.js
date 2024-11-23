// Efecto de desplazamiento suave en la navegación
document.querySelectorAll('.navbar .nav-link').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        const targetId = this.getAttribute('href').substring(1); // Elimina el '#'
        const targetElement = document.getElementById(targetId);
        
        window.scrollTo({
            top: targetElement.offsetTop - 50,  // Ajusta el desplazamiento si es necesario
            behavior: 'smooth'
        });
    });
});

// Efecto de mostrar un mensaje de éxito cuando se envía el formulario de contacto
document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita que el formulario se envíe de forma predeterminada
    
    // Simula el envío exitoso del formulario
    setTimeout(function() {
        alert('Formulario enviado con éxito. ¡Gracias por contactarnos!');
    }, 500);
});

// Muestra la fecha actual en el formulario de contacto (campo "fecha")
document.querySelector('input[name="fecha"]').value = new Date().toISOString().split('T')[0];

// Animación de transición suave para elementos de la tabla cuando se carga la página
window.onload = function() {
    const rows = document.querySelectorAll('table tbody tr');
    rows.forEach((row, index) => {
        setTimeout(() => {
            row.style.opacity = 1;
            row.style.transition = 'opacity 0.5s ease-in-out';
        }, index * 200);  // Animar filas con un pequeño retraso
    });
};
