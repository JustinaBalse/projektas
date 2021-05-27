
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
            if (input.value === "") {
                input.setCustomValidity(valOrFunction(options.emptyText, window, [input]));
            } else {
                input.setCustomValidity("");
            }
        }

        function invalid() {
            if (input.value === "") {
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

const loginInput = document.getElementById("login");
const loginPassword = document.getElementById("password");

if (loginInput !== null) {
    InvalidInputHelper(loginInput, {
        defaultText: "Please enter an email address!",

        emptyText: "Please enter an email address!",

        invalidText: function (input) {
            return 'The email address "' + input.value + '" is invalid!';
        }
    });
}

if (loginPassword !== null) {
    InvalidInputHelper(loginPassword, {
        defaultText: "Please enter a password!",

        emptyText: "Please enter a password!",

        invalidText: function (input) {
            return 'Password "' + input.value + '" is invalid!';
        }
    });
}

// Užduočių progreso diagramos animacija


const donut = document.getElementsByClassName("donut-percent");

if (donut.length > 0) {
    const donutPercent = document.getElementsByClassName("donut-percent")[0].getAttribute(value);

    document.querySelector('.progress-percent').style.setProperty('--p', donutPercent);
}

