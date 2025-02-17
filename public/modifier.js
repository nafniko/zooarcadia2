document.addEventListener('DOMContentLoaded', () => {
    // Fonction pour rendre modifiable le titre
    const titreElements = document.querySelectorAll('.titre');
    
    titreElements.forEach((titre) => {
        titre.addEventListener('dblclick', () => {
            const currentText = titre.textContent;
            let id = titre.dataset.id;
            console.log(id);
            titre.style.display = 'none'; // Cacher le texte actuel
            const input = document.createElement('input');
            input.classList.add('form-control');
            input.value = currentText;

            // Ajouter le champ de saisie dans le DOM
            titre.parentElement.appendChild(input);
            input.focus();

            // Gérer la perte de focus ou la touche 'Enter'
            input.addEventListener('blur', () => {
                const updatedText = input.value.trim();
                titre.textContent = updatedText; // Mettre à jour le texte du titre
                titre.style.display = 'inline'; // Afficher le titre mis à jour

                let controller ='';

                if(titre.dataset.controller=='content'){
                    controller = 'public/index.php?page=content';
                    
                }
                else if(titre.dataset.controller=='service'){
                    controller = 'public/index.php?page=services';
                   
                }
                // console.log(titre.dataset.id);
                // console.log(titre.dataset.idService);


                const dataToSend = `action=admin&update=1&id=${id}&titre=${encodeURIComponent(updatedText)}`;
                console.log('Données envoyées au serveur :', dataToSend);
                // Envoyer la nouvelle valeur au serveur
                fetch(controller, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `action=admin&update=1&id=${id}&titre=${encodeURIComponent(updatedText)}`
                })
                .then(response => response.text())
                .then(data => console.log(data));

                input.remove(); // Supprimer le champ de saisie
            });

            // Si l'utilisateur appuie sur "Enter", valider le champ
            input.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    input.blur(); // Simuler la perte de focus
                }
            });
        });
    });

    // Fonction pour rendre modifiable la description
    const descriptionElements = document.querySelectorAll('.description');
    descriptionElements.forEach((description) => {
        description.addEventListener('dblclick', () => {
            const currentText = description.textContent;
            description.style.display = 'none'; // Cacher la description actuelle
            const textarea = document.createElement('textarea');
            textarea.classList.add('form-control');
            textarea.style.border = 'none';
            textarea.style.outline = 'none';
            textarea.style.resize = 'none';
            textarea.style.background = 'transparent';
            textarea.style.width = '300px';
            textarea.style.height = '300px';
            textarea.value = currentText;

            // Ajouter le champ de saisie dans le DOM
            description.parentElement.appendChild(textarea);
            textarea.focus();

            // Gérer la perte de focus ou la touche 'Enter'
            textarea.addEventListener('blur', () => {
                const updatedText = textarea.value.trim();
                description.textContent = updatedText; // Mettre à jour la description
                description.style.display = 'inline'; // Afficher la description mise à jour
                // No need to assign a value to controller
                let controller ='';
                if(description.dataset.controller=='content'){
                     controller = 'src/Controllers/ContentControllers.php';
                }
                else if(description.dataset.controller=='service'){
                        controller = 'src/Controllers/ServiceControllers.php';
                }
                // Envoyer la nouvelle valeur au serveur
                const id = description.dataset.id;
                fetch(controller, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: `action=admin&update=1&id=${id}&descriptions=${encodeURIComponent(updatedText)}`
                })
                .then(response => response.text())
                .then(data => console.log(data));

                textarea.remove(); // Supprimer le champ de saisie
            });

            // Si l'utilisateur appuie sur "Enter", valider le champ
            textarea.addEventListener('keydown', (event) => {
                if (event.key === 'Enter') {
                    textarea.blur(); // Simuler la perte de focus
                }
            });
        });
    });
});