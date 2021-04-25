function check() {

    var edit_project_title_element = document.getElementById("edit-project-title-input");
    var value = edit_project_title_element.value;

    // removes empty space in the beggining and in the end

    if (value[0] === " " || value[value.length - 1] === " ") {
        edit_project_title_element.setCustomValidity("Delete spaces in the front or back");
    } else {

        value = value.trim();

        // checks if symbols are <3 length

        if (value.length < 3) {
            edit_project_title_element.setCustomValidity("Title must contain 3 or more symbols");
        } else {
            edit_project_title_element.setCustomValidity("");
        }

    }
}

// add check function to change event
window.onload = function () {
    document.getElementById("edit-project-title-input").onchange = check;
}

// triggers change event to check validity
$('#edit-project-title-input').keydown(function (e) {
    setTimeout(function () {
        $('#edit-project-title-input').trigger('change');
    }, 100);
})