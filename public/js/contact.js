// document.addEventListener('DOMContentLoaded', () => {
//     const form = document.querySelector('form');
//     const emailInput = document.getElementById('email');
//     const objetInput = document.getElementById('objet');
//     const messageInput = document.getElementById('message');
//     const submitButton = document.getElementById('contact');

//     form.addEventListener('submit', async (e) => {
//         e.preventDefault();

//         let valid = true;
//         clearErrors();

//         // Validation de l'email
//         if (!validateEmail(emailInput.value)) {
//             showError(emailInput, "Veuillez entrer un email valide.");
//             valid = false;
//         }

//         // Validation de l'objet
//         if (objetInput.value.trim() === '') {
//             showError(objetInput, "L'objet ne peut pas être vide.");
//             valid = false;
//         }

//         // Validation du message
//         if (messageInput.value.trim() === '') {
//             showError(messageInput, "Le message ne peut pas être vide.");
//             valid = false;
//         }

//         if (valid) {
//             try {
//                 const response = await fetch('zoo/public/index?page=contact', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/x-www-form-urlencoded'
//                     },
//                     body: new URLSearchParams({
//                         email: emailInput.value,
//                         objet: objetInput.value,
//                         message: messageInput.value
//                     })
//                 });

//                 if (response.ok) {
//                     showSuccess("Votre message a bien été envoyé !");
//                     form.reset();
//                 } else {
//                     showError(form, "Une erreur est survenue lors de l'envoi du message.");
//                 }
//             } catch (error) {
//                 showError(form, "Impossible de contacter le serveur.");
//             }
//         }
//     });

//     function validateEmail(email) {
//         const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//         return emailPattern.test(email);
//     }

//     function showError(input, message) {
//         const errorDiv = document.createElement('div');
//         errorDiv.className = 'alert alert-danger mt-2';
//         errorDiv.textContent = message;
//         input.parentElement.appendChild(errorDiv);
//     }

//     function showSuccess(message) {
//         const successDiv = document.createElement('div');
//         successDiv.className = 'alert alert-success mt-2';
//         successDiv.textContent = message;
//         form.prepend(successDiv);
//         setTimeout(() => successDiv.remove(), 3000);
//     }

//     function clearErrors() {
//         document.querySelectorAll('.alert').forEach(alert => alert.remove());
//     }
// });

