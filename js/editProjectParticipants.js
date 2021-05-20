const addParticipantsButtonEditModal = document.getElementsByName("add-project-participants-edit-modal2")[0];


addParticipantsButtonEditModal.addEventListener("click", function(){

    const addParticipantsFormEditModal = document.getElementsByClassName("participants-form-edit-modal")[0];
    const jsonEncodedEditModalParticipants = document.getElementById("edit-project-hidden-project-participants").value;

// Atkoduojame json užkoduotą dalyvių sąrašą, kuris atėjo per formos hidden input.

    const decodedParticipants = JSON.parse(jsonEncodedEditModalParticipants);

    const label = document.createElement('label');
    label.className = "w-100";
    label.innerText = "Add Project Participant";
    addParticipantsFormEditModal.appendChild(label);

    const div = document.createElement('div');
    div.className = "d-flex flex-row";
    addParticipantsFormEditModal.appendChild(div);

    const input = document.createElement('input');
    input.className = "form-control text-left pl-3 border ml-0 mt-0";
    input.type = "email";
    input.name = "project-user-input-edit-modal";
    input.id = "project-user-input-edit-modal";
    input.maxlength = "70";
    input.pattern = "[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$";
    input.oninvalid = "this.setCustomValidity('Invalid format')";
    input.oninput = "this.setCustomValidity('')";
    input.onclick = "this.value='';";
    div.appendChild(input);

    const button = document.createElement('button');
    button.className = "btn bg-success text-white mt-0 mb-2 ml-3 mr-0";
    button.name = "add-participant-edit-modal";
    button.id ="add-participant-edit-modal";
    button.type = "button";
    div.appendChild(button);

    const i = document.createElement('i');
    i.className = "fas fa-plus";
    button.appendChild(i);

    const p = document.createElement('p');
    p.className = "h6 small text-secondary";
    p.innerText = "Insert participant's email.";
    addParticipantsFormEditModal.appendChild(p);

    // Esančių projekto dalyvių sąrašo spausdinimmas.
    let  index = 0;

    for (let i = 0; i < decodedParticipants.length; i++) {

        index = participantPrint(addParticipantsFormEditModal, index, decodedParticipants[i]);
    }

    addParticipantsButtonEditModal.remove();



    button.addEventListener("click", function(){

        const wrongEmail = " Invalid format";
        const emailInput = document.getElementById("project-user-input-edit-modal").value;

        // const deletedParticipantsString = ""

        document.getElementById("project-user-input-edit-modal").value = "";

        // Vartotojų pridėjimo laukelyje ivesto teksto tikrinimas ar email.

        if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(emailInput)) {
            participantPrint(addParticipantsFormEditModal, index, emailInput);
        }else {

            const invalidInput = document.getElementsByClassName('invalid-participant-email');

            if (invalidInput.length === 0) {

                const participant = document.createElement('p');
                participant.className = "w-100 px-0 my-2 text-secondary";
                participant.classList.add('text-danger');
                participant.classList.add('invalid-participant-email');
                input.placeholder = emailInput;
                participant.innerText = wrongEmail;
                addParticipantsFormEditModal.insertBefore(participant, p);
            }

            input.addEventListener("click", function(){
                input.placeholder = "";
                const invalidMessage = document.getElementsByClassName("invalid-participant-email")[0];
                invalidMessage.remove();
            });
        }
        index++;
    });


    const submit = document.getElementsByName("submit-project-btn")[0];
    submit.addEventListener("click", function(){

        const emails = document.getElementsByClassName("added-participants");
        const login = document.getElementById("edit-project-hidden-email").value;

        let addedParticipantsString = login;

        for (let i = 0; i < emails.length; i++) {
            addedParticipantsString = addedParticipantsString + "," + emails[i].innerText;
        }

        document.getElementById("edit-project-hidden-email").value = addedParticipantsString;
        console.log(addedParticipantsString);
    });
});

function participantPrint(addParticipantsFormEditModal, index, email) {

    const row = document.createElement('div');
    row.className = "d-flex flex-row participant-row";
    addParticipantsFormEditModal.appendChild(row);

    const participant = document.createElement('p');
    participant.className = "w-100 px-0 my-2 text-secondary";
    participant.innerText = email;
    participant.classList.add('added-participants');
    row.appendChild(participant);

    const deleteButton = document.createElement('button');
    deleteButton.className = "btn bg-light text-secondary mt-0 mb-2 ml-2 mr-0";
    deleteButton.name = "delete-participant";
    deleteButton.type = "button";
    deleteButton.id = "delete-" + email;
    row.appendChild(deleteButton);

    const i = document.createElement('i');
    i.className = "fas fa-times";
    deleteButton.appendChild(i);

    deleteButton.addEventListener("click", function(){

        deletedParticipantsAddingToHiddenInput(email);
        row.remove();
        return index--;
    });
}

function deletedParticipantsAddingToHiddenInput(email) {

    const hiddenDeletedParticipants = document.getElementById("edit-project-hidden-deleted-participants");

    if (hiddenDeletedParticipants.value === "") {
        hiddenDeletedParticipants.value = email;
    } else {
        hiddenDeletedParticipants.value = hiddenDeletedParticipants.value + "," + email;
    }
}