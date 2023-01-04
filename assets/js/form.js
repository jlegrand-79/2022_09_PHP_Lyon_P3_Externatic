// Recruiter Field
let selectedPartner = document.querySelector('#offer_partner')
let recruitersOfPartner = document.querySelector('#offer_recruiter')

function clearPartnerField(select) {
    select.options.length = 0
    let option = document.createElement("option");
    option.value = ""
    option.text = "Ex : John Doe"
    option.disabled = true
    option.selected = true
    select.add(option)
}

if (selectedPartner && recruitersOfPartner) {
    selectedPartner.firstChild.disabled = true
    recruitersOfPartner.firstChild.disabled = true
    let recruiterValue = recruitersOfPartner.value

    // on change
    selectedPartner.addEventListener('change', (event) => {
        fetch(window.location.protocol + "//" + window.location.host + '/api/partner_details/' + event.target.value)
            .then(response => response.json())
            .then(recruiters => {
                clearPartnerField(recruitersOfPartner)

                for (let recruiter of recruiters) {
                    let option = document.createElement("option");
                    option.value = recruiter.id;
                    option.text = recruiter.fullname;
                    recruitersOfPartner.add(option)
                }
            })
    })

    // for edit
    if (selectedPartner.value == true) {
        fetch(window.location.protocol + "//" + window.location.host + '/api/partner_details/' + selectedPartner.value)
            .then(response => response.json())
            .then(recruiters => {
                clearPartnerField(recruitersOfPartner)

                for (let recruiter of recruiters) {
                    let option = document.createElement("option");
                    option.value = recruiter.id;
                    option.text = recruiter.fullname;
                    recruitersOfPartner.add(option)
                    recruitersOfPartner.value = recruiterValue
                }
            })
    } else {
        clearPartnerField(recruitersOfPartner)
    }
}

// Contract field
let contractType = document.querySelector('#offer_contract')
if (contractType) {
    contractType.firstChild.disabled = true
}

// Stacks field
let selectedWorkField = document.querySelector('#offer_work_field')
let stacksOfWorkField = document.querySelector('#offer_stack')

if (selectedWorkField && stacksOfWorkField) {
    selectedWorkField.firstChild.disabled = true
    stacksOfWorkField.className = "d-flex flex-row flex-wrap justify-content-evenly"
    let allStacks = stacksOfWorkField.querySelectorAll('input')
    let stacksValue = []

    for (let i = 0; i < allStacks.length; i++) {
        if (allStacks[i].checked == true) {
            stacksValue.push(allStacks[i].value)
        }
    }

    // on change
    selectedWorkField.addEventListener('change', (event) => {
        fetch(window.location.protocol + "//" + window.location.host + '/api/work_field_details/' + event.target.value)
            .then(response => response.json())
            .then(stacks => {
                while (stacksOfWorkField.firstChild) {
                    stacksOfWorkField.removeChild(stacksOfWorkField.lastChild);
                }
                for (let stack of stacks) {

                    let div = document.createElement('div')
                    div.className = 'form-check'

                    let checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.id = stack.id;
                    checkbox.name = 'offer[stack][]';
                    checkbox.value = stack.id;
                    checkbox.className = 'form-check-input'

                    let label = document.createElement('label')
                    label.htmlFor = stack.id;
                    label.className = 'form-check-label'
                    label.appendChild(document.createTextNode(stack.name));

                    div.appendChild(checkbox);
                    div.appendChild(label);
                    stacksOfWorkField.appendChild(div);

                }
            })
    })

    // for edit
    if (selectedWorkField.value == 2) {
        fetch(window.location.protocol + "//" + window.location.host + '/api/work_field_details/' + selectedWorkField.value)
            .then(response => response.json())
            .then(stacks => {
                while (stacksOfWorkField.firstChild) {
                    stacksOfWorkField.removeChild(stacksOfWorkField.lastChild);
                }
                for (let stack of stacks) {

                    let div = document.createElement('div')
                    div.className = 'form-check'

                    let checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.id = stack.id;
                    checkbox.name = 'offer[stack][]';
                    checkbox.value = stack.id;
                    checkbox.className = 'form-check-input'

                    let label = document.createElement('label')
                    label.htmlFor = stack.id;
                    label.className = 'form-check-label'
                    label.appendChild(document.createTextNode(stack.name));

                    div.appendChild(checkbox);
                    div.appendChild(label);
                    stacksOfWorkField.appendChild(div);

                    for (let stackValue of stacksValue) {
                        if (stack.id == stackValue) {
                            checkbox.checked = true
                        }
                    }

                }
            })
    }
}

// Technologies field
let technologies = document.querySelector('legend')
if (technologies) {
    technologies.className = 'form-label'
}

// Candidate form
let gender = document.querySelector('#candidate_gender')
let birthday = document.querySelector('.input-group').children

if (gender && birthday) {
    gender.firstChild.disabled = true
    birthday.firstChild.disabled = true
}
