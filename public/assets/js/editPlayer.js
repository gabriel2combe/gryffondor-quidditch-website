function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#player-picture')
                .attr('src', e.target.result);
            document.getElementById("player-picture-title").innerHTML = "Nouvelle photo :";
        };

        reader.readAsDataURL(input.files[0]);
    }
}