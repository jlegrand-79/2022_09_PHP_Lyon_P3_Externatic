let selectStatus = document.getElementsByClassName('selectStatusCandidacy')

if (selectStatus) {
    for (const candidacy of selectStatus) {
        let actualStatus = candidacy.value
        candidacy.addEventListener('change', function () {
            let confirmation = confirm("Confirmez-vous le changement de statut de cette candidature ?")

            if (confirmation == true) {
                let candidacyId = candidacy.name
                fetch('/api/edit_candidacy_status/' + candidacyId + '/' + candidacy.value)
                    .then(response => response.json())
                    .then(done => {
                        if (done == true) {
                            let rowCandidacy = document.getElementById('candidacy' + candidacyId)
                            let rowCandidacyMobile = document.getElementById('candidacyMobile' + candidacyId)

                            if (candidacy.value == "Refusée") {
                                rowCandidacy.classList.remove("bg-lightPink")
                                rowCandidacy.classList.add("bg-darkGrey")
                                rowCandidacyMobile.classList.remove("bg-lightPink")
                                rowCandidacyMobile.classList.add("bg-darkGrey")
                            } else if (candidacy.value == "Acceptée") {
                                rowCandidacy.classList.remove("bg-darkGrey")
                                rowCandidacy.classList.add("bg-lightPink")
                                rowCandidacyMobile.classList.remove("bg-darkGrey")
                                rowCandidacyMobile.classList.add("bg-lightPink")
                                console.log(window.location.pathname)
                                if (window.location.pathname == '/candidacy/' || window.location.pathname == '/candidacy/recruiter') {
                                    let offerLink = rowCandidacy.querySelector('a').href
                                    document.location.href = offerLink;
                                }
                                else {
                                    document.location.pathname = window.location.pathname
                                }
                            } else {
                                rowCandidacy.classList.remove("bg-darkGrey")
                                rowCandidacy.classList.remove("bg-lightPink")
                                rowCandidacyMobile.classList.remove("bg-darkGrey")
                                rowCandidacyMobile.classList.remove("bg-lightPink")

                            }
                        }
                    })

            } else {
                candidacy.value = actualStatus
            }
        })
    }
}