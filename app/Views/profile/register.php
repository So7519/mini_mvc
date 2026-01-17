<div class="profile-container">
    <!-- En-tête -->
    <div class="profile-header">
        <h1>Inscription</h1>
        <p>Créez votre compte</p>
    </div>

    <!-- Formulaire Inscription -->
    <div class="form-container register">
        
        <div id="registerAlert" class="alert"></div>
        
        <form id="registerForm" class="auth-form">
            <div class="form-group">
                <label for="registerName">Nom complet</label>
                <input 
                    type="text" 
                    id="registerName" 
                    name="nom" 
                    required 
                    placeholder="Jean Dupont"
                >
            </div>
            <div class="form-group">
                <label for="registerEmail">Email</label>
                <input 
                    type="email" 
                    id="registerEmail" 
                    name="email" 
                    required 
                    placeholder="votre@email.com"
                >
            </div>
            <div class="form-group">
                <label for="registerPassword">Mot de passe</label>
                <input 
                    type="password" 
                    id="registerPassword" 
                    name="password" 
                    required 
                    placeholder="••••••••"
                >
            </div>
            <div class="form-group">
                <label for="registerPasswordConfirm">Confirmer mot de passe</label>
                <input 
                    type="password" 
                    id="registerPasswordConfirm" 
                    name="passwordConfirm" 
                    required 
                    placeholder="••••••••"
                >
            </div>
            <button type="submit" class="submit-btn register">S'inscrire</button>
        </form>

        <!-- Lien connexion -->
        <div class="auth-link-container">
            <p>
                Vous avez déjà un compte ?
                <a href="/profile" class="auth-link">Connectez-vous</a>
            </p>
        </div>
    </div>

    <!-- Retour accueil -->
    <div class="back-link register">
        <a href="/">← Retour à l'accueil</a>
    </div>
</div>

<script>
    // Formulaire inscription
    document.getElementById('registerForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const nom = document.getElementById('registerName').value;
        const email = document.getElementById('registerEmail').value;
        const password = document.getElementById('registerPassword').value;
        const passwordConfirm = document.getElementById('registerPasswordConfirm').value;
        const alert = document.getElementById('registerAlert');

        if (password !== passwordConfirm) {
            alert.className = 'alert error';
            alert.textContent = '❌ Les mots de passe ne correspondent pas';
            return;
        }

        try {
            const response = await fetch('/api/register', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nom, email, password })
            });

            const data = await response.json();

            if (response.ok && data.success) {
                alert.className = 'alert success';
                alert.textContent = '✅ ' + data.message;
                setTimeout(() => location.href = '/', 1500);
            } else {
                alert.className = 'alert error';
                alert.textContent = '❌ ' + (data.error || 'Erreur');
            }
        } catch (error) {
            alert.className = 'alert error';
            alert.textContent = '❌ Erreur: ' + error.message;
        }
    });
</script>
