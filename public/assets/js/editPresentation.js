function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#picture1-pic')
                .attr('src', e.target.result);
            document.getElementById("picture1-title").innerHTML = "Nouvelle photo :";
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#picture2-pic')
                .attr('src', e.target.result);
            document.getElementById("picture2-title").innerHTML = "Nouvelle photo :";
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function readURL3(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#picture3-pic')
                .attr('src', e.target.result);
            document.getElementById("picture3-title").innerHTML = "Nouvelle photo :";
        };

        reader.readAsDataURL(input.files[0]);
    }
}

