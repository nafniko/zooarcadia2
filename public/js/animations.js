document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.card.mycard').forEach((card) => {
        card.addEventListener('click', () => {
            card.classList.toggle('size-card');
            const details = card.querySelector('.details');
            details.classList.toggle('visually-hidden-focusable');
            const animalId = card.getAttribute('data-animal-id');
            console.log(`ID de l'animal : ${animalId}`);
            
            fetch('public/index.php?page=stat', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ animalId: animalId }),
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message); 
            })
            .catch(error => {
                console.error('Erreur lors de l\'incrémentation du compteur:', error);
            });
        });
    });
});

// document.getElementById('animal').addEventListener('change', function() {
//     let selectedOption = this.options[this.selectedIndex]; // Récupérer l'option sélectionnée
//     document.getElementById('id_animal').value = selectedOption.value; // Récupérer l'ID
//     document.getElementById('prenom_animal').value = selectedOption.getAttribute('data-prenom'); // Récupérer le prénom
// });

