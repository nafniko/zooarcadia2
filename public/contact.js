// document.querySelector("form").addEventListener("submit", function (event) {
//     event.preventDefault();

//     const formData = new FormData(this);

//     fetch("public/index?page=contact", {
//         method: "POST",
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         alert(data.message);
//         if (data.success) {
//             this.reset();
//         }
//     })
//     .catch(error => {
//         console.error("Erreur :", error);
//         alert("Une erreur s'est produite.");
//     });
// });
