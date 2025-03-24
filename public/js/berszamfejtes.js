document.querySelectorAll(".btn-primary").forEach(function(button) {
    button.addEventListener("click", function() {
        const dolgozoId = this.closest("tr").querySelector("td:first-child").textContent;
        fetch("/api/dolgozo/" + dolgozoId + "/csekkolas")
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                const modalBody = document.querySelector("#berszam_modal .modal-body tbody");
                modalBody.innerHTML = "";
                data.forEach(function(csekk) {
                    modalBody.innerHTML += `
                        <tr>
                            <th scope="row">${csekk.DolgozoID}</th>
                            <td>${csekk.Vezeteknev}</td>
                            <td>${csekk.Keresztnev}</td>
                            <td>${csekk.Datum_Be}</td>
                            <td>${csekk.Datum_Ki}</td>
                            <td>${csekk.Ora}</td>
                            <td>${csekk.Ber}</td>
                            <td>${csekk.Bonusz}</td>
                            <td>${csekk.Vegosszeg}</td>
                        </tr>
                    `;
                });
            })
            .catch(function(error) {
                console.error("Hiba történt az adatok betöltésekor:", error);
                const modalBody = document.querySelector("#berszam_modal .modal-body tbody");
                modalBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-danger">Nem sikerült betölteni az adatokat.</td>
                    </tr>
                `;
            });
    });
});