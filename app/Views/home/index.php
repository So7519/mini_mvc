<!-- Page d'accueil style PSG Store -->

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', sans-serif;
        color: #333;
    }

    .hero-banner {
        background: linear-gradient(135deg, #DA291C 0%, #001f3f 100%);
        color: white;
        padding: 80px 20px;
        text-align: center;
        margin-bottom: 60px;
        border-bottom: 8px solid #DA291C;
    }

    .hero-banner h1 {
        font-size: 56px;
        font-weight: 800;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .hero-banner p {
        font-size: 20px;
        margin-bottom: 30px;
        opacity: 0.95;
    }

    .hero-btn {
        display: inline-block;
        padding: 16px 40px;
        background: white;
        color: #DA291C;
        text-decoration: none;
        border-radius: 4px;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s ease;
        cursor: pointer;
        border: 2px solid white;
    }

    .hero-btn:hover {
        background: transparent;
        color: white;
        transform: translateY(-2px);
    }

    .collections-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        margin-bottom: 80px;
    }

    .section-title {
        font-size: 42px;
        font-weight: 700;
        margin-bottom: 50px;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: center;
        color: #222;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin: 60px 0;
    }

    .feature-card {
        background: white;
        padding: 35px 25px;
        border-radius: 8px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border-top: 4px solid #DA291C;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .feature-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .feature-card h3 {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 10px;
        color: #222;
    }

    .feature-card p {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
    }

    .cta-section {
        background: #f8f8f8;
        padding: 60px 20px;
        text-align: center;
        margin: 60px 0;
        border-radius: 8px;
    }

    .cta-section h2 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 20px;
        color: #222;
    }

    .cta-section p {
        font-size: 18px;
        margin-bottom: 30px;
        color: #666;
    }

    @media (max-width: 768px) {
        .hero-banner h1 {
            font-size: 36px;
        }

        .hero-banner p {
            font-size: 16px;
        }

        .section-title {
            font-size: 28px;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Banner -->
<div class="hero-banner">
    <h1>✨ Collection PSG Exclusive ✨</h1>
    <p>Découvrez nos maillots et articles officiels</p>
    <a href="/products" class="hero-btn">Parcourir la collection</a>
</div>

<!-- Features Section -->
<div class="collections-section">
    <h2 class="section-title">Pourquoi Choisir Notre Collection ?</h2>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">✨</div>
            <h3>Qualité Premium</h3>
            <p>Maillots officiels PSG avec matériaux de haute qualité</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">🚚</div>
            <h3>Livraison Rapide</h3>
            <p>Expédition rapide et sécurisée de vos commandes</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">💯</div>
            <h3>Authentiques</h3>
            <p>100% maillots officiels certifiés PSG</p>
        </div>

        <div class="feature-card">
            <div class="feature-icon">🤝</div>
            <h3>Support Client</h3>
            <p>Équipe dédiée pour vous assister</p>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section">
    <h2>Prêt à commander ?</h2>
    <p>Parcourez notre sélection complète et commandez vos maillots préférés</p>
    <a href="/cart" class="hero-btn" style="background: #DA291C; color: white; border-color: #DA291C;">🛒 Voir le panier</a>
</div>


