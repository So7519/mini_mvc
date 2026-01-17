<link rel="stylesheet" href="/css/products.css">

<!-- Liste des produits -->
<div class="products-section">
    <div class="products-header">
        <h2>Liste des produits</h2>
        <a href="/products/create">➕ Ajouter un produit</a>
    </div>
    
    <?php if (empty($products)): ?>
        <div class="empty-products">
            <p>Aucun produit disponible.</p>
            <a href="/products/create">Créer le premier produit</a>
        </div>
    <?php else: ?>
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <!-- Image du produit -->
                    <div class="product-image <?= empty($product['image_url']) ? 'no-image' : '' ?>">
                        <?php if (!empty($product['categorie_nom'])): ?>
                            <div class="product-category"><?= htmlspecialchars($product['categorie_nom']) ?></div>
                        <?php endif; ?>
                        
                        <?php if (!empty($product['image_url'])): ?>
                            <img 
                                src="<?= htmlspecialchars($product['image_url']) ?>" 
                                alt="<?= htmlspecialchars($product['nom']) ?>"
                                onerror="this.parentElement.classList.add('no-image')"
                            >
                        <?php else: ?>
                            <span>Aucune image</span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Contenu produit -->
                    <div class="product-content">
                        <h3 class="product-title">
                            <?= htmlspecialchars($product['nom']) ?>
                        </h3>
                        
                        <?php if (!empty($product['description'])): ?>
                            <p class="product-description">
                                <?= htmlspecialchars($product['description']) ?>
                            </p>
                        <?php endif; ?>
                        
                        <!-- Info prix et stock -->
                        <div class="product-info">
                            <div class="product-price">
                                <div class="product-price-value">
                                    <?= number_format((float)$product['prix'], 2, ',', ' ') ?> €
                                </div>
                            </div>
                            <div class="product-stock <?= $product['stock'] > 10 ? 'available' : ($product['stock'] > 0 ? 'low' : '') ?>">
                                📦 Stock: <?= htmlspecialchars($product['stock']) ?>
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="product-actions">
                            <a href="/products/show?id=<?= htmlspecialchars($product['id']) ?>" class="product-action-btn details">
                                👁️ Détails
                            </a>
                            <form method="POST" action="/cart/add-from-form" style="flex: 1; margin: 0;">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                                <input type="hidden" name="quantite" value="1">
                                <input type="hidden" name="user_id" value="1">
                                <button type="submit" 
                                        class="product-action-btn cart"
                                        <?= $product['stock'] <= 0 ? 'disabled title="Stock épuisé"' : '' ?>>
                                    🛒 Panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <div class="products-footer">
        <a href="/" class="back">← Retour à l'accueil</a>
        <a href="/cart?user_id=1" class="cart">🛒 Voir mon panier</a>
    </div>
</div>

