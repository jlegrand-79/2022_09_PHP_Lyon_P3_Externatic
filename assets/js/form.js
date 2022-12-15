let selectedPartner = document.querySelector('#offer_partner')
selectedPartner.firstChild.disabled = true
let recruitersOfPartner = document.querySelector('#offer_recruiter')
recruitersOfPartner.firstChild.disabled = true

selectedPartner.addEventListener('change', (event) => {
    fetch(window.location.protocol + "//" + window.location.host + '/api/partner_details/' + event.target.value)
        .then(response => response.json())
        .then(recruiters => {
            recruitersOfPartner.options.length = 0
            let option = document.createElement("option");
            option.value = ""
            option.text = "Ex : John Doe"
            option.disabled = true
            option.selected = true
            recruitersOfPartner.add(option)


            for (let recruiter of recruiters) {
                option = document.createElement("option");
                option.value = recruiter.id;
                option.text = recruiter.fullname;
                recruitersOfPartner.add(option)
            }
        })
})

let contractType = document.querySelector('#offer_contract')
contractType.firstChild.disabled = true

let selectedWorkField = document.querySelector('#offer_work_field')
selectedWorkField.firstChild.disabled = true
let stacksOfWorkField = document.querySelector('#offer_stack')

selectedWorkField.addEventListener('change', (event) => {
    fetch(window.location.protocol + "//" + window.location.host + '/api/work_field_details/' + event.target.value)
        .then(response => response.json())
        .then(stacks => {
            while (stacksOfWorkField.firstChild) {
                stacksOfWorkField.removeChild(stacksOfWorkField.lastChild);
            }
            for (let stack of stacks) {
                let checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.id = stack.id;
                checkbox.name = 'offer[stack]';
                checkbox.value = stack.id;

                let label = document.createElement('label')
                label.htmlFor = stack.id;
                label.appendChild(document.createTextNode(stack.name));

                stacksOfWorkField.appendChild(checkbox);
                stacksOfWorkField.appendChild(label);
            }
        })
})

