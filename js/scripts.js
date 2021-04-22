
const projects = document.getElementsByClassName('project')

for (let i = 0; i < projects.length; i++) {
	const project = projects[i];
  
  const status = project.querySelector('b').innerHTML
  
  if (status === "TO DO") {
  	project.classList.add('status-todo') 
  }
  
  if (status === "IN PROGRESS") {
  	project.classList.add('status-inprogress')
  }
  
  if (status === "DONE") { 
  	project.classList.add('status-done') 
  }
}

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


