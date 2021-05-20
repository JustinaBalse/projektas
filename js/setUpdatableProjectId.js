// Fetches updatables values from a row and stores into edit modal.

jQuery(document).ready(function () {
    $(".edit-row").click(function () {

        $("#edit-id").attr("value", $(this).attr('data-edit-button'));
        $("#edit-project-title-input").attr("value", $(this).attr('data-edit-button-name'));
        $("#edit-comment-area").val($(this).attr('data-edit-button-comment'));
    });

    $("#editableProject").click(function () {

        $("#edit-id").attr("value", $(this).attr('data-edit-button'));
        $("#edit-project-title-input").attr("value", $(this).attr('data-edit-button-name'));
        $("#edit-comment-area").val($(this).attr('data-edit-button-comment'));
    });

    $("#back-btn2").click(function () {
        location.reload();
    });
});