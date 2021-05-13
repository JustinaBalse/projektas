
(function (exports) {
    function valOrFunction(val, ctx, args) {
        if (typeof val == "function") {
            return val.apply(ctx, args);
        } else {
            return val;
        }
    }

    function InvalidInputHelper(input, options) {
        input.setCustomValidity(valOrFunction(options.defaultText, window, [input]));

        function changeOrInput() {
            if (input.value == "") {
                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
            } else {
                input.setCustomValidity("");
            }
        }

        function invalid() {
            if (input.value == "") {
                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
            } else {
                input.setCustomValidity(valOrFunction(options.invalidText, window, [input]));
            }
        }

        input.addEventListener("change", changeOrInput);
        input.addEventListener("input", changeOrInput);
        input.addEventListener("invalid", invalid);
    }
    exports.InvalidInputHelper = InvalidInputHelper;
})(window);

InvalidInputHelper(document.getElementById("login"), {
    defaultText: "Please enter an email address!",

    emptyText: "Please enter an email address!",

    invalidText: function (input) {
        return 'The email address "' + input.value + '" is invalid!';
    }
});

InvalidInputHelper(document.getElementById("password"), {
    defaultText: "Please enter a password!",

    emptyText: "Please enter a password!",

    invalidText: function (input) {
        return 'Password "' + input.value + '" is invalid!';
    }
});

// Užduočių progreso diagramos animacija

let donut = document.getElementsByClassName("donut-percent")[0];
let donutPercent = donut.getAttribute(value);

document.querySelector('.progress-percent').style.setProperty('--p',donutPercent);

