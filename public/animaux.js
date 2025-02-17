     const imageAnimaux = document.querySelectorAll("img");
    imageAnimaux.forEach(element => {
        element.addEventListener("click", () => {
            if (confirm("Voulez-vous vraiment supprimer " + element.dataset.prenom + " ?")) {
                fetch("public/index.php?page=animal", {
                    method: "POST",
                    body: new URLSearchParams({
                        action: "admin",
                        delete: element.dataset.id
                    })
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert("Suppression réussie : " + result.message);
                        element.remove();
                    } else {
                        alert("Erreur : " + result.message);
                    }
                })
                .catch(error => console.error("Erreur lors de la suppression :", error));
            }
        });
    });