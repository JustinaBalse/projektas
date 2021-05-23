// Backgroundas uzvedant pele ant filtro tabu

$(document).ready(function() {
    $("#totalProjectsTab").hover(
        function() { $(this).addClass("bg-light"); },
        function() { $(this).removeClass("bg-light"); }
    );

    $("#completedProjectsTab").hover(
        function() { $(this).addClass("bg-light"); },
        function() { $(this).removeClass("bg-light"); }
    );

    $("#pendingProjectsTab").hover(
        function() { $(this).addClass("bg-light"); },
        function() { $(this).removeClass("bg-light"); }
    );
});
