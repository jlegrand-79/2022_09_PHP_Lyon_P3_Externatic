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
    if (selectedPartner.value) {
        let recruiterValue = recruitersOfPartner.value
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

// Form Address Prefill with Partner or Recruiter Details

let offerAddress = document.querySelector('#offer_address')
let offerAddressComplement = document.querySelector('#offer_addressComplement')
let offerPostalCode = document.querySelector('#offer_postalCode')
let offerCity = document.querySelector('#offer_city')

if (selectedPartner && recruitersOfPartner && offerAddress && offerAddressComplement && offerPostalCode && offerCity) {
    // on change
    selectedPartner.addEventListener('change', (event) => {
        offerAddress.value = ''
        offerAddressComplement.value = ''
        offerPostalCode.value = ''
        offerCity.value = ''
        fetch(window.location.protocol + "//" + window.location.host + '/api/partner/' + event.target.value + '/address/')
            .then(response => response.json())
            .then(partnerAddress => {
                offerAddress.value = partnerAddress.address
                offerAddressComplement.value = partnerAddress.addressComplement
                offerPostalCode.value = partnerAddress.postalCode
                offerCity.value = partnerAddress.city
            }
            )
    })
    recruitersOfPartner.addEventListener('change', (event) => {
        offerAddress.value = ''
        offerAddressComplement.value = ''
        offerPostalCode.value = ''
        offerCity.value = ''
        fetch(window.location.protocol + "//" + window.location.host + '/api/recruiter/' + event.target.value + '/address/')
            .then(response => response.json())
            .then(recruiterAddress => {
                offerAddress.value = recruiterAddress.address
                offerAddressComplement.value = recruiterAddress.addressComplement
                offerPostalCode.value = recruiterAddress.postalCode
                offerCity.value = recruiterAddress.city
            }
            )
    })
}

// Contract field
let contractType = document.querySelector('#offer_contract')
if (contractType) {
    contractType.firstChild.disabled = true
}

// Stacks field
let selectedWorkField = document.querySelector('#offer_workField')
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
    if (selectedWorkField.value) {
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
let birthday1 = document.querySelector('#candidate_birthday_day')
let birthday2 = document.querySelector('#candidate_birthday_month')
let birthday3 = document.querySelector('#candidate_birthday_year')

if (gender && birthday1 && birthday2 && birthday3) {
    gender.firstChild.disabled = true
    birthday1.firstChild.disabled = true
    birthday2.firstChild.disabled = true
    birthday3.firstChild.disabled = true
}
