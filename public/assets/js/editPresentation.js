function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();

        reader.onload = function (e) {
            $(input).siblings("img").attr('src', e.target.result);
            $(input).siblings("h4").html("Nouvelle photo :");
        };

        reader.readAsDataURL(input.files[0]);
    }
}