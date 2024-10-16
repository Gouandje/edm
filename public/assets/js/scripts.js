document.getElementById("menu-toggle").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("wrapper").classList.toggle("toggled");
});

// Graphique avec Chart.js
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar', // Type de graphique (bar, line, pie, etc.)
        data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin'],
            datasets: [{
                label: 'Ventes',
                data: [12, 19, 8, 5, 2, 3],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)', // Vert
                    'rgb(47, 67, 98) !important', // Bleu
                    'rgba(255, 206, 86, 0.2)', // Jaune
                    'rgba(255, 99, 132, 0.2)', // Rouge
                    'rgba(153, 102, 255, 0.2)', // Violet
                    'rgba(255, 159, 64, 0.2)'  // Orange
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)', // Vert
                    'rgba(54, 162, 235, 1)', // Bleu
                    'rgba(255, 206, 86, 1)', // Jaune
                    'rgba(255, 99, 132, 1)', // Rouge
                    'rgba(153, 102, 255, 1)', // Violet
                    'rgba(255, 159, 64, 1)'  // Orange
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});

// pagination
document.addEventListener('DOMContentLoaded', function () {
    const cardsPerPage = 6; // Nombre de cartes par page
    const studentCards = document.querySelectorAll('.student-card-item');
    const totalCards = studentCards.length;
    const totalPages = Math.ceil(totalCards / cardsPerPage);
    const pagination = document.getElementById('pagination');

    let currentPage = 1;

    function showPage(page) {
        // Cacher toutes les cartes
        studentCards.forEach((card, index) => {
            card.style.display = 'none';
        });

        // Calculer les indices des cartes à afficher
        const start = (page - 1) * cardsPerPage;
        const end = start + cardsPerPage;

        // Afficher les cartes de la page actuelle
        for (let i = start; i < end && i < totalCards; i++) {
            studentCards[i].style.display = 'block';
        }

        // Mettre à jour les classes actives de la pagination
        const paginationItems = pagination.querySelectorAll('li');
        paginationItems.forEach((item, index) => {
            if (index === page) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }

    function setupPagination() {
        // Créer les éléments de pagination
        for (let i = 1; i <= totalPages; i++) {
            const li = document.createElement('li');
            li.classList.add('page-item');
            if (i === 1) li.classList.add('active');

            const a = document.createElement('a');
            a.classList.add('page-link');
            a.href = '#';
            a.textContent = i;
            a.dataset.page = i;

            a.addEventListener('click', function (e) {
                e.preventDefault();
                currentPage = Number(this.dataset.page);
                showPage(currentPage);
            });

            li.appendChild(a);
            pagination.appendChild(li);
        }

        // Boutons Précédent et Suivant
        // Bouton Précédent
        const prevLi = document.createElement('li');
        prevLi.classList.add('page-item');

        const prevA = document.createElement('a');
        prevA.classList.add('page-link');
        prevA.href = '#';
        prevA.textContent = 'Précédent';
        prevA.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });

        prevLi.appendChild(prevA);
        pagination.insertBefore(prevLi, pagination.firstChild);

        // Bouton Suivant
        const nextLi = document.createElement('li');
        nextLi.classList.add('page-item');

        const nextA = document.createElement('a');
        nextA.classList.add('page-link');
        nextA.href = '#';
        nextA.textContent = 'Suivant';
        nextA.addEventListener('click', function (e) {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        nextLi.appendChild(nextA);
        pagination.appendChild(nextLi);
    }

    setupPagination();
    showPage(currentPage);
});