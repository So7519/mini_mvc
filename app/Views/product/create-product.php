<!-- Formulaire pour créer un nouveau produit -->
<style>
    .form-section {
        max-width: 700px;
        margin: 0 auto;
        padding: 50px 40px;
    }

    .form-section h2 {
        font-size: 36px;
        font-weight: 700;
        color: #001f3f;
        margin: 0 0 40px 0;
        border-bottom: 3px solid #DA291C;
        padding-bottom: 16px;
    }

    .alert {
        padding: 16px;
        margin-bottom: 28px;
        border-radius: 8px;
        display: none;
        border-left: 4px solid;
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

    .form-group {
        margin-bottom: 28px;
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 700;
        color: #001f3f;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
        padding: 12px;
        border: 2px solid #d4dae0;
        border-radius: 6px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.2s;
        background: white;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        outline: none;
        border-color: #DA291C;
        box-shadow: 0 0 0 3px rgba(218, 41, 28, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-hint {
        font-size: 12px;
        color: #5a6f7f;
        margin-top: 6px;
        font-weight: 500;
    }

    .image-preview {
        margin-top: 20px;
        padding: 20px;
        background: linear-gradient(135deg, #f8f9fb 0%, #eef1f5 100%);
        border: 2px solid #d4dae0;
        border-radius: 8px;
        text-align: center;
    }

    .image-preview p {
        font-weight: 700;
        color: #001f3f;
    }

    .image-preview img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 6px;
        object-fit: contain;
    }

    .form-actions {
        display: flex;
        gap: 16px;
        margin-top: 40px;
    }

    .submit-btn {
        flex: 1;
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
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(218, 41, 28, 0.2);
    }

    .submit-btn:hover {
        background: #c01815;
        box-shadow: 0 8px 20px rgba(218, 41, 28, 0.3);
    }

    .back-links {
        margin-top: 40px;
        display: flex;
        gap: 32px;
        font-size: 14px;
    }

    .back-links a {
        color: #001f3f;
        text-decoration: none;
        font-weight: 700;
        transition: all 0.2s;
    }

    .back-links a:hover {
        color: #DA291C;
    }

    .two-cols {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 600px) {
        .form-section {
            padding: 30px 20px;
        }

        .form-section h2 {
            font-size: 28px;
        }

        .two-cols {
            grid-template-columns: 1fr;
        }

        .back-links {
            flex-direction: column;
            gap: 16px;
        }
    }
</style>

<div class="form-section">
    <h2>Ajouter un produit</h2>
    
    <!-- Message de succès ou d'erreur -->
    <?php if (isset($message)): ?>
        <div class="alert <?= isset($success) && $success ? 'success' : 'error' ?> show">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    
    <form method="POST" action="/products" style="display: flex; flex-direction: column;">
        <div class="form-group">
            <label for="nom">Nom du produit</label>
            <input 
                type="text" 
                id="nom" 
                name="nom" 
                required 
                maxlength="150"
                value="<?= isset($old_values['nom']) ? htmlspecialchars($old_values['nom']) : '' ?>"
                placeholder="Ex: Maillot PSG Nike 2025"
            >
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea 
                id="description" 
                name="description"
                placeholder="Décrivez le produit en détail..."
            ><?= isset($old_values['description']) ? htmlspecialchars($old_values['description']) : '' ?></textarea>
            <span class="form-hint">Optionnel. Jusqu'à 500 caractères.</span>
        </div>
        
        <div class="two-cols">
            <div class="form-group">
                <label for="prix">Prix (€)</label>
                <input 
                    type="number" 
                    id="prix" 
                    name="prix" 
                    required 
                    step="0.01"
                    min="0"
                    value="<?= isset($old_values['prix']) ? htmlspecialchars($old_values['prix']) : '' ?>"
                    placeholder="0.00"
                >
            </div>
            
            <div class="form-group">
                <label for="stock">Stock</label>
                <input 
                    type="number" 
                    id="stock" 
                    name="stock" 
                    required 
                    min="0"
                    value="<?= isset($old_values['stock']) ? htmlspecialchars($old_values['stock']) : '' ?>"
                    placeholder="0"
                >
            </div>
        </div>
        
        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select id="categorie_id" name="categorie_id">
                <option value="">-- Sélectionnez une catégorie --</option>
                <?php if (isset($categories)): ?>
                    <?php foreach ($categories as $categorie): ?>
                        <option 
                            value="<?= $categorie['id'] ?>"
                            <?= (isset($old_values['categorie_id']) && $old_values['categorie_id'] == $categorie['id']) ? 'selected' : '' ?>
                        >
                            <?= htmlspecialchars($categorie['nom']) ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
            <span class="form-hint">Optionnel.</span>
        </div>
        
        <div class="form-group">
            <label for="image_url">URL de l'image</label>
            <input 
                type="url" 
                id="image_url" 
                name="image_url" 
                value="<?= isset($old_values['image_url']) ? htmlspecialchars($old_values['image_url']) : '' ?>"
                placeholder="https://exemple.com/image.jpg"
            >
            <span class="form-hint">Optionnel. Lien direct vers l'image.</span>
        </div>
        
        <!-- Aperçu de l'image si une URL est fournie -->
        <?php if (!empty($old_values['image_url']) && filter_var($old_values['image_url'], FILTER_VALIDATE_URL)): ?>
            <div class="image-preview">
                <p>Aperçu de l'image</p>
                <img 
                    src="<?= htmlspecialchars($old_values['image_url']) ?>" 
                    alt="Aperçu"
                    onerror="this.parentElement.style.display='none'"
                >
            </div>
        <?php endif; ?>
        
        <div class="form-actions">
            <button type="submit" class="submit-btn">Créer le produit</button>
        </div>
    </form>
    
    <div class="back-links">
        <a href="/products">Voir la liste des produits</a>
        <a href="/">Retour à l'accueil</a>
    </div>
</div>

