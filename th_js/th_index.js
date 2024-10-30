function th_agregarComentario(event, comentariosId) {
    event.preventDefault();

    const nombreInput = document.getElementById(`nombre-${comentariosId.split('-')[1]}`);
    const comentarioInput = document.getElementById(`comentario-${comentariosId.split('-')[1]}`);
    const listaComentarios = document.getElementById(comentariosId);

    const nuevoComentario = document.createElement("div");
    nuevoComentario.classList.add("comentario");
    nuevoComentario.innerHTML = `<strong>${nombreInput.value}:</strong> ${comentarioInput.value}`;

    listaComentarios.appendChild(nuevoComentario);

    nombreInput.value = '';
    comentarioInput.value = '';
}


