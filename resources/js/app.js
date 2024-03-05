import Dropzone from "dropzone";

/**
 * Por defecto dropzone va a buscar un elemento que tenga la
 * clase de dropzone, pero nosotros queremos darle el comportamiento
 */
Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aquí tu imagen",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
});

dropzone.on("success", (file, response) => {
    // se toma response.imagen porque asi retornamos el json (en ImagenController)
    document.querySelector('[name="imagen"]').value = response.imagen;
});
