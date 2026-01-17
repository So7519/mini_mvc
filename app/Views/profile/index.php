<div class="profile-container">
    <!-- En-tête -->
    <div class="profile-header">
        <h1>Connexion</h1>
        <p>Accédez à votre compte</p>
    </div>

    <!-- Formulaire Connexion -->
    <div class="form-container login">
        
        <div id="loginAlert" class="alert"></div>
        
        <form id="loginForm" class="auth-form">
            <div class="form-group">
                <label for="loginEmail">Email</label>
                <input 
                    type="email" 
                    id="loginEmail" 
                    name="email" 
                    required 
                    placeholder="votre@email.com"
                >
            </div>
            <div class="form-group">
                <label for="loginPassword">Mot de passe</label>
                <input 
                    type="password" 
                    id="loginPassword" 
                    name="password" 
                    required 
                    placeholder="••••••••"
                >
            </div>
            <button type="submit" class="submit-btn login">Se connecter</button>
        </form>

        <!-- Lien inscription -->
        <div class="auth-link-container">
            <p>
                Vous n'êtes pas inscrit ?
                <a href="/profile/register" class="auth-link">Inscrivez-vous</a>
            </p>
        </div>
    </div>

    <!-- Retour accueil -->
    <div class="back-link login">
        <a href="/">← Retour à l'accueil</a>
    </div>
</div>

<script>
    // Formulaire connexion
    document.getElementById('loginForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;
        const alert = document.getElementById('loginAlert');

        try {
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ email, password })
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
