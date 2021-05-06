// Fetches updatables values from a row and stores into edit modal.

jQuery(document).ready(function () {
    $(".edit-row").click(function () {

        $("#edit-task-id").attr("value", $(this).attr('data-edit-task-button'));
        $("#edit-task-title-input").attr("value", $(this).attr('data-edit-button-name'));
        $("#edit-task-description-area").val($(this).attr('data-edit-button-comment'));
        $('#edit-priority-select').val($(this).attr('data-edit-select-priority')).change();
        $('#edit-status-select').val($(this).attr('data-edit-select-status')).change();
    });

    $(".status-table-item").click(function () {
        $("#status-table-item-click").attr("value", "true");
    });
});