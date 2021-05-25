// Fetches updatables values from a row and stores into edit modal.

jQuery(document).ready(function () {
    $(".edit-row").click(function () {

        $("#edit-task-id").attr("value", $(this).attr('data-edit-task-button'));
        // Assignee dropdown sąrašo koregavimas''
        $("#assignee-drop-down1").attr("value", $(this).attr('data-edit-assignee')).text($(this).attr('data-edit-assignee'));
        const dropDown = document.getElementsByClassName("assignee-drop-down");
        for (let i = 1; i < dropDown.length; i++) {

            if (dropDown[i].value === dropDown[0].value) {
                dropDown[i].remove();
            }
        }
        
        $("#edit-task-title-input").attr("value", $(this).attr('data-edit-button-name'));
        $("#edit-task-description-area").val($(this).attr('data-edit-button-comment'));
        $('#edit-priority-select').val($(this).attr('data-edit-select-priority')).change();
        $('#edit-status-select').val($(this).attr('data-edit-select-status')).change();
    });

    $(".status-table-item").click(function () {
        $("#status-table-item-click").attr("value", "true");
    });
});