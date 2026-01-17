<!-- Vue du panier -->
<style>
    .cart-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 50px 40px;
    }

    .cart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        border-bottom: 3px solid #DA291C;
        padding-bottom: 20px;
    }

    .cart-header h2 {
        font-size: 36px;
        font-weight: 700;
        color: #001f3f;
        margin: 0;
    }

    .cart-header a {
        padding: 12px 28px;
        background: #001f3f;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .cart-header a:hover {
        background: #003570;
    }

    .alert {
        padding: 16px;
        margin-bottom: 28px;
        border-radius: 8px;
        border-left: 4px solid;
        display: none;
    }

    .alert.show {
        display: block;
    }

    .alert.success {
        background: rgba(34, 139, 34, 0.08);
        color: #228B22;
        border-left-color: #228B22;
    }

    .alert.error {
        background: rgba(218, 41, 28, 0.08);
        color: #DA291C;
        border-left-color: #DA291C;
    }

    .cart-empty {
        text-align: center;
        padding: 80px 50px;
        background: #f8f9fb;
        border-radius: 12px;
        border: 1px solid #e8ecf1;
    }

    .cart-empty h3 {
        color: #001f3f;
        font-size: 24px;
        margin: 0 0 12px 0;
    }

    .cart-empty p {
        color: #5a6f7f;
        font-size: 15px;
        margin: 0 0 28px 0;
    }

    .cart-empty a {
        display: inline-block;
        padding: 14px 32px;
        background: #DA291C;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 700;
        transition: all 0.25s;
    }

    .cart-empty a:hover {
        background: #c01815;
    }

    .cart-content {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 32px;
    }

    .cart-items-section h3 {
        font-size: 18px;
        font-weight: 700;
        color: #001f3f;
        margin: 0 0 24px 0;
    }

    .cart-item {
        border: 1px solid #e8ecf1;
        border-radius: 12px;
        padding: 20px;
        background: white;
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.2s;
    }

    .cart-item:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .cart-item-image {
        width: 120px;
        height: 120px;
        flex-shrink: 0;
        background: linear-gradient(135deg, #f8f9fb 0%, #eef1f5 100%);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .cart-item-content {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .cart-item-title {
        font-size: 16px;
        font-weight: 700;
        color: #001f3f;
        margin: 0 0 8px 0;
    }

    .cart-item-title a {
        color: #001f3f;
        text-decoration: none;
        transition: color 0.2s;
    }

    .cart-item-title a:hover {
        color: #DA291C;
    }

    .cart-item-category {
        font-size: 12px;
        color: #5a6f7f;
        margin-bottom: 8px;
    }

    .cart-item-price {
        font-size: 24px;
        font-weight: 700;
        color: #DA291C;
        margin-bottom: 16px;
    }

    .cart-item-controls {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
    }

    .quantity-form {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .quantity-form label {
        font-size: 14px;
        font-weight: 600;
        color: #001f3f;
    }

    .quantity-form input {
        width: 60px;
        padding: 8px;
        border: 1px solid #d4dae0;
        border-radius: 6px;
        font-size: 14px;
    }

    .quantity-form button {
        padding: 8px 16px;
        background: #001f3f;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .quantity-form button:hover {
        background: #003570;
    }

    .remove-form button {
        padding: 8px 16px;
        background: #DA291C;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .remove-form button:hover {
        background: #c01815;
    }

    .cart-item-subtotal {
        margin-top: 12px;
        font-size: 13px;
        color: #5a6f7f;
    }

    .clear-cart {
        margin-top: 24px;
        padding-top: 24px;
        border-top: 1px solid #e8ecf1;
    }

    .clear-cart button {
        padding: 12px 24px;
        background: #DA291C;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s;
    }

    .clear-cart button:hover {
        background: #c01815;
    }

    .cart-summary {
        border: 1px solid #e8ecf1;
        border-radius: 12px;
        padding: 28px;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        position: sticky;
        top: 100px;
    }

    .cart-summary h3 {
        font-size: 18px;
        font-weight: 700;
        color: #001f3f;
        margin: 0 0 24px 0;
    }

    .summary-line {
        display: flex;
        justify-content: space-between;
        margin-bottom: 16px;
        padding-bottom: 16px;
        border-bottom: 1px solid #f0f2f5;
    }

    .summary-line:last-of-type {
        border-bottom: none;
    }

    .summary-line span {
        color: #5a6f7f;
        font-weight: 600;
    }

    .summary-line strong {
        color: #001f3f;
        font-weight: 700;
    }

    .summary-total {
        display: flex;
        justify-content: space-between;
        padding-top: 20px;
        border-top: 2px solid #DA291C;
        margin-bottom: 28px;
    }

    .summary-total span:first-child {
        font-size: 18px;
        font-weight: 700;
        color: #001f3f;
    }

    .summary-total span:last-child {
        font-size: 28px;
        font-weight: 700;
        color: #DA291C;
    }

    .submit-order-btn {
        width: 100%;
        padding: 16px;
        background: #DA291C;
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.25s;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        box-shadow: 0 4px 12px rgba(218, 41, 28, 0.2);
    }

    .submit-order-btn:hover {
        background: #c01815;
        box-shadow: 0 6px 16px rgba(218, 41, 28, 0.3);
    }

    .continue-shopping {
        margin-top: 20px;
        text-align: center;
    }

    .continue-shopping a {
        color: #001f3f;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    .continue-shopping a:hover {
        color: #DA291C;
    }

    @media (max-width: 768px) {
        .cart-container {
            padding: 30px 20px;
        }

        .cart-content {
            grid-template-columns: 1fr;
        }

        .cart-summary {
            position: static;
        }
    }
</style>

<div class="cart-container">
    <div class="cart-header">
        <h2>Mon panier</h2>
        <a href="/products">Continuer les achats</a>
    </div>
    
    <!-- Messages de succès/erreur -->
    <?php if (isset($message) && $message): ?>
        <div class="alert <?= $messageType === 'success' ? 'success' : 'error' ?> show">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    
    <?php if (empty($cartItems)): ?>
        <div class="cart-empty">
            <h3>Votre panier est vide</h3>
            <p>Ajoutez des produits à votre panier pour commencer vos achats.</p>
            <a href="/products">Voir les produits</a>
        </div>
    <?php else: ?>
        <div class="cart-content">
            <!-- Liste des articles -->
            <div class="cart-items-section">
                <h3>Articles dans votre panier</h3>
                
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item">
                        <!-- Image du produit -->
                        <div class="cart-item-image">
                            <?php if (!empty($item['image_url'])): ?>
                                <img 
                                    src="<?= htmlspecialchars($item['image_url']) ?>" 
                                    alt="<?= htmlspecialchars($item['nom']) ?>"
                                    onerror="this.style.display='none'"
                                >
                            <?php endif; ?>
                        </div>
                        
                        <!-- Informations du produit -->
                        <div class="cart-item-content">
                            <h4 class="cart-item-title">
                                <a href="/products/show?id=<?= htmlspecialchars($item['id']) ?>">
                                    <?= htmlspecialchars($item['nom']) ?>
                                </a>
                            </h4>
                            
                            <?php if (!empty($item['categorie_nom'])): ?>
                                <div class="cart-item-category"><?= htmlspecialchars($item['categorie_nom']) ?></div>
                            <?php endif; ?>
                            
                            <div class="cart-item-price">
                                <?= number_format((float)$item['prix'], 2, ',', ' ') ?> €
                            </div>
                            
                            <!-- Gestion de la quantité -->
                            <div class="cart-item-controls">
                                <form method="POST" action="/cart/update" class="quantity-form">
                                    <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['panier_id']) ?>">
                                    <label for="quantite_<?= htmlspecialchars($item['panier_id']) ?>">Quantité :</label>
                                    <input 
                                        type="number" 
                                        id="quantite_<?= htmlspecialchars($item['panier_id']) ?>" 
                                        name="quantite" 
                                        value="<?= htmlspecialchars($item['quantite']) ?>" 
                                        min="1" 
                                        max="<?= htmlspecialchars($item['stock']) ?>"
                                        required
                                    >
                                    <button type="submit">Mettre à jour</button>
                                </form>
                                
                                <form method="POST" action="/cart/remove" class="remove-form">
                                    <input type="hidden" name="cart_id" value="<?= htmlspecialchars($item['panier_id']) ?>">
                                    <button 
                                        type="submit" 
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')"
                                    >
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                            
                            <div class="cart-item-subtotal">
                                Sous-total: <strong><?= number_format((float)$item['prix'] * (int)$item['quantite'], 2, ',', ' ') ?> €</strong>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
                <!-- Bouton vider le panier -->
                <div class="clear-cart">
                    <form method="POST" action="/cart/clear">
                        <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
                        <button 
                            type="submit" 
                            onclick="return confirm('Êtes-vous sûr de vouloir vider tout votre panier ?')"
                        >
                            Vider le panier
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Résumé de la commande -->
            <div class="cart-summary">
                <h3>Résumé de la commande</h3>
                
                <div class="summary-line">
                    <span>Sous-total :</span>
                    <strong><?= number_format((float)$total, 2, ',', ' ') ?> €</strong>
                </div>
                
                <div class="summary-line">
                    <span>Frais de livraison :</span>
                    <strong>Gratuit</strong>
                </div>
                
                <div class="summary-total">
                    <span>Total :</span>
                    <span><?= number_format((float)$total, 2, ',', ' ') ?> €</span>
                </div>
                
                <form method="POST" action="/orders/create">
                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">
                    <button type="submit" class="submit-order-btn">Valider la commande</button>
                </form>
                
                <div class="continue-shopping">
                    <a href="/products">Continuer les achats</a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

