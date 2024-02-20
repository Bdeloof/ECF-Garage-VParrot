// Filtrage des véhicules

const priceInput = document.getElementById("price");
const kilometreInput = document.getElementById("kilometre");
const yearInput = document.getElementById("year");

const priceOutput = document.getElementById("priceValue");
const kilometreOutput = document.getElementById("kilometreValue");
const yearOutput = document.getElementById("yearValue");

const displayValue = (input, output) => {
    output.textContent = input.value;
};

priceInput.addEventListener("input", () => {
    displayValue(priceInput, priceOutput);
});

kilometreInput.addEventListener("input", () => {
    displayValue(kilometreInput, kilometreOutput);
});

yearInput.addEventListener("input", () => {
    displayValue(yearInput, yearOutput);
});

// EventListener de recherche pour les véhicules filtrés

const buttonFilter = document.querySelector('.button-filter');
const announcementCard = document.querySelector('.announcement-card'); 

buttonFilter.addEventListener('click', () => {
    const priceValue = document.getElementById('Price').value;
    const kilometreValue = document.getElementById('kilometre').value;
    const yearValue = document.getElementById('year').value;

// Requête pour les véhicules 
const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const annoncementFilter = JSON.parse(xhr.responseText);
                announcementCard.innerHTML = ''; 
                annoncementFilter.forEach(annonce => {                    
                    const article = document.createElement('article');
                    article.classList.add('carte-service');

                    const divAnnouncementCard = document.createElement('div');
                    divAnnouncementCard.classList.add('announcement-card'); 
                    divCarteAnnonce.innerHTML = `
                        {{ announcement.getTitle }}
                        {{ announcement.getDescription }}
                        {{ announcement.getTechnicalInfo }}
                        {{ announcement.getBrand }}
                        {{ announcement.getPrice }}
                        {{ announcement.getYear }}
                        {{ announcement.getKilometre }}
                        <a class="boutondetails" href="{{ path('app_contact', {'id': announcement.id}) }}" target="_blank">Demande d'informations</a>
                    `;

                    article.appendChild(divAnnouncementCard);
                    announcementCard.appendChild(article);
                });
            } else {
                
            }
        }
    };

    const url = `/filter-announcement?year=${yearValue}&price=${priceValue}&kilometre=${kilometreValue}`;
    xhr.open('GET', url, true);
    xhr.send();
});