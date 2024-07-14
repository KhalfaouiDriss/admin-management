document.addEventListener('DOMContentLoaded', () => {
    const loginBtn = document.querySelector('.loginBtn');
    const username = document.querySelector('.username');
    const password = document.querySelector('.password');

    loginBtn.addEventListener('click', async (event) => {
        event.preventDefault(); // Prevent form submission

        if (validateForm()) {
            try {
                const data = await getData();
                console.log(data);
                if (data) {
                    const foundAdmin = data.find(e => e.username === username.value && e.password === password.value);
                    if (foundAdmin) {
                        window.location.href = `Components/index.php?id_admin=${foundAdmin.id_admin}`;
                    } else {
                        alert("Nom d'utilisateur ou mot de passe incorrect");
                    }
                } else {
                    alert("Erreur lors de la récupération des données");
                }
            } catch (error) {
                console.error('Erreur lors de la récupération des données :', error);
                alert("Erreur lors de la récupération des données");
            }
        } else {
            alert("Veuillez remplir tous les champs");
        }
    });

    function validateForm() {
        return username.value.trim() !== "" && password.value.trim() !== "";
    }

    async function getData() {
        try {
            const response = await fetch('./Models/api/admins.php', {
                method: 'POST',
                body: new FormData(document.getElementById('loginForm')) // Pass form data
            });
            if (!response.ok) {
                throw new Error('Échec de la récupération des données');
            }
            return await response.json();
        } catch (error) {
            throw error;
        }
    }
});
