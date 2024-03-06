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

    /**
     * Si el usuario manda el formulario y la imagen es válida,
     *  pero está mal algo en la data entonces hace persistente la imagen */
    init: function () {
        // Si el value de la imagen tiene valor
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            // por colocar un size
            imagenPublicada.size = 1234;
            imagenPublicada.name =
                document.querySelector('[name="imagen"]').value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );

            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", function (file, response) {
    // se toma response.imagen porque asi retornamos el json (en ImagenController)
    document.querySelector('[name="imagen"]').value = response.imagen;
});

dropzone.on("removedfile", function () {
    // reseteo del valor (si se elimina la imagen)
    document.querySelector('[name="imagen"]').value = "";
});
