document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', async (e) => {
        e.preventDefault(); // Empêche le rechargement de la page

        const formData = new FormData(form);
        console.log('Données du formulaire :', formData);
        const url = 'zoo/public/index.php?page=poster';
        formData.append('action', 'avis');

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                const result = await response.text();
                console.log('Réponse du serveur :', result);
                alert('Votre avis a été envoyé avec succès !');
                form.reset(); 
            } else {
                console.error('Erreur lors de l\'envoi du formulaire :', response.statusText);
                alert('Une erreur est survenue. Veuillez réessayer.');
            }
        } catch (error) {
            console.error('Erreur réseau :', error);
            alert('Erreur réseau. Vérifiez votre connexion.');
        }
    });

});
