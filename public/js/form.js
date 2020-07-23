$(function() {
    var viewImage = function(input, localImage) {
        if (input.files) {
            var qtdImagens = input.files.length;
            for (i = 0; i < qtdImagens; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img class="miniatura">')).attr('src', event.target.result).appendTo(localImage);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#addFotoGaleria').on('change', function() {
        viewImage(this, 'div.galeria');
    });
    });

    