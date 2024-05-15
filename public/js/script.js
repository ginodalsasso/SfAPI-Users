const membres_container = document.getElementById('#membres-container');

fetch('http://localhost:8000/api/membres')
.then((response) => response.json())
.then((data) => {
    const membres = data["hydra:member"];
    membres.forEach(membre => {
        let membre_box = document.createElement('div');
        membre_box.innerHTML = membre.last.toUpperCase() + '' + membre.first;
        membres_container.appendChild(membre_box);
    });
})