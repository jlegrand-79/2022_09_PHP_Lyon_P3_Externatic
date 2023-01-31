const cityInput = document.getElementById("city");

let cityCheck = [];

if (cityInput) {

    cityInput.addEventListener("input", function () {
        const city = cityInput.value;
        const url = `https://geo.api.gouv.fr/communes?nom=` + city + `&fields=departement&boost=population&limit=5`;
        const options = { method: 'GET' }
        fetch(url, options)
            .then((response) => response.json())
            .then((data) => {
                const datalist = document.getElementById("cities");
                const selection = datalist.getElementsByTagName("option")
                const cityArray = []
                for (const option of selection) {
                    cityArray.push(option.value);
                }
                if (!cityArray.includes(city)) {
                    datalist.innerHTML = "";
                    for (const commune of data) {
                        datalist.innerHTML += '<option value="' + commune.nom + ' (' + commune.departement.code + ')">';
                        cityCheck.push(commune.nom + ' (' + commune.departement.code + ')');
                    }
                }
            }
            )
    });
}

const nope =
    "Veuillez sélectionner une ville dans la liste.";

let form = document.getElementById("form")

if (form) {

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let city = document.getElementById("city").value

        if (city) {

            if (cityCheck.includes(city) == false) {
                alert(nope);
            }
            else { form.submit() }
        }
        else { form.submit() }
    });
}

