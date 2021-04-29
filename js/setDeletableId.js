// Fetches updatables values from a row and stores into edit modal.

jQuery(document).ready(function () {
    $(".delete-row").click(function () {

        $("#delete-id").attr("value", $(this).attr('data-delete-button'));
    });
});