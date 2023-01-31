// script for prefilling recruiter address with partners one
let partner = document.querySelector('#recruiter_partner')
let recruiterAddress = document.querySelector('#recruiter_address')
let recruiterAddressComplement = document.querySelector('#recruiter_addressComplement')
let recruiterPostalCode = document.querySelector('#recruiter_postalCode')
let recruiterCity = document.querySelector('#recruiter_city')

if (partner && recruiterAddress) {
    // on change
    partner.addEventListener('change', (event) => {
        recruiterAddress.value = ''
        recruiterAddressComplement.value = ''
        recruiterPostalCode.value = ''
        recruiterCity.value = ''
        fetch(window.location.protocol + "//" + window.location.host + '/api/partner/' + event.target.value + '/address/')
            .then(response => response.json())
            .then(partnerAddress => {
                recruiterAddress.value = partnerAddress.address
                recruiterAddressComplement.value = partnerAddress.addressComplement
                recruiterPostalCode.value = partnerAddress.postalCode
                recruiterCity.value = partnerAddress.city
            }
            )
    })
}