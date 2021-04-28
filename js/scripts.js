
var projects = document.getElementsByClassName('project')

for (let i = 0; i < projects.length; i++) {
	var project = projects[i];
  
  var status = project.querySelector('b').innerHTML
  
  if (status === "TO DO") {
  	project.style.color="#c02c2c";
  }
  
  if (status === "IN PROGRESS") {
  	project.style.color="#0275d8";
  }
  
  if (status === "DONE") { 
  	project.style.color="#3ea556";
  }
}

var tasks = document.getElementsByClassName('task')

for (let i = 0; i < tasks.length; i++) {
	var task = tasks[i];
  
  var taskStatus = task.querySelector('b').innerHTML
  
  if (taskStatus === "TO DO") {
  	task.style.color="#c02c2c";
  }
  
  if (taskStatus === "IN PROGRESS") {
  	task.style.color="#0275d8";
  }
  
  if (taskStatus === "DONE") { 
  	task.style.color="#3ea556";
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


