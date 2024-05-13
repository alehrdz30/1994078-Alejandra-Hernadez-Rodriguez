function agregarProducto() {
    const form = document.getElementById('agregarForm');
    const formData = new FormData(form);

    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'agregar.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            const nuevoProducto = {
                nombre: formData.get('nombre'),
                cantidad: formData.get('cantidad'),
                imagen: 'ruta/a/la/nueva/imagen.jpg' // Obtén la ruta de la imagen agregada
            };

            // Actualizar la página menu.html
            actualizarMenuConNuevoProducto(nuevoProducto);
            
            // Mostrar mensaje de éxito
            const mensajeElement = document.getElementById('mensaje');
            mensajeElement.textContent = "Producto agregado correctamente";
            mensajeElement.classList.add('mensaje-exito');

            // Limpiar el formulario después de agregar el producto
            form.reset();
        } else {
            const mensajeElement = document.getElementById('mensaje');
            mensajeElement.textContent = "Error al agregar el producto";
            mensajeElement.classList.add('mensaje-error');
        }
    };

    xhr.send(formData);
}

function actualizarMenuConNuevoProducto(producto) {
    const contentContainer = document.querySelector('.content-container');

    // Crear un nuevo elemento div para el nuevo producto
    const nuevoElemento = document.createElement('div');
    nuevoElemento.classList.add('funko');
    nuevoElemento.setAttribute('data-producto-id', 'nuevo-id'); // Asignar un nuevo ID único

    nuevoElemento.innerHTML = `
        <img src="${producto.imagen}" alt="${producto.nombre}">
        <h3>${producto.nombre}</h3>
        <p>Cantidad en stock: ${producto.cantidad}</p>
    `;

    // Agregar el nuevo producto al inicio de la lista de productos
    contentContainer.insertBefore(nuevoElemento, contentContainer.firstChild);
}
