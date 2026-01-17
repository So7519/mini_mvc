<!-- Liste des commandes -->
<style>
    .orders-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 40px;
    }

    .orders-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        border-bottom: 3px solid #DA291C;
        padding-bottom: 20px;
    }

    .orders-header h2 {
        font-size: 36px;
        font-weight: 700;
        color: #001f3f;
        margin: 0;
    }

    .orders-header a {
        padding: 12px 28px;
        background: #001f3f;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.2s;
    }

    .orders-header a:hover {
        background: #003570;
    }

    .orders-empty {
        text-align: center;
        padding: 80px 50px;
        background: #f8f9fb;
        border-radius: 12px;
        border: 1px solid #e8ecf1;
    }

    .orders-empty h3 {
        color: #001f3f;
        font-size: 24px;
        margin: 0 0 12px 0;
    }

    .orders-empty p {
        color: #5a6f7f;
        font-size: 15px;
        margin: 0 0 28px 0;
    }

    .orders-empty a {
        display: inline-block;
        padding: 14px 32px;
        background: #DA291C;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 700;
        transition: all 0.25s;
    }

    .orders-empty a:hover {
        background: #c01815;
    }

    .orders-list {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .order-card {
        border: 1px solid #e8ecf1;
        border-radius: 12px;
        padding: 24px;
        background: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.2s;
    }

    .order-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .order-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
        gap: 20px;
    }

    .order-card-info {
        flex: 1;
    }

    .order-card-title {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
    }

    .order-card-title h3 {
        font-size: 18px;
        font-weight: 700;
        color: #001f3f;
        margin: 0;
    }

    .status-badge {
        padding: 7px 16px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .status-badge.validee {
        background: rgba(34, 139, 34, 0.1);
        color: #228B22;
    }

    .status-badge.en_attente {
        background: rgba(218, 170, 28, 0.1);
        color: #DAA81C;
    }

    .status-badge.annulee {
        background: rgba(218, 41, 28, 0.1);
        color: #DA291C;
    }

    .order-card-meta {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-bottom: 16px;
    }

    .order-card-meta div {
        font-size: 13px;
        color: #5a6f7f;
        font-weight: 500;
    }

    .order-card-total {
        font-size: 28px;
        font-weight: 700;
        color: #DA291C;
    }

    .order-card-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
        min-width: 160px;
    }

    .details-btn {
        padding: 12px 24px;
        background: #DA291C;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        text-align: center;
        font-size: 13px;
        font-weight: 700;
        transition: all 0.25s;
        text-transform: uppercase;
        letter-spacing: 0.3px;
        border: none;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(218, 41, 28, 0.15);
    }

    .details-btn:hover {
        background: #c01815;
        box-shadow: 0 4px 12px rgba(218, 41, 28, 0.25);
    }

    .back-link {
        margin-top: 40px;
        text-align: center;
    }

    .back-link a {
        color: #001f3f;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    .back-link a:hover {
        color: #DA291C;
    }

    @media (max-width: 768px) {
        .orders-container {
            padding: 30px 20px;
        }

        .orders-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .order-card-header {
            flex-direction: column;
        }

        .order-card-actions {
            width: 100%;
            flex-direction: row;
        }

        .details-btn {
            flex: 1;
        }
    }
</style>

<div class="orders-container">
    <div class="orders-header">
        <h2>Mes commandes</h2>
        <a href="/products">Retour aux produits</a>
    </div>
    
    <?php if (empty($orders)): ?>
        <div class="orders-empty">
            <h3>Aucune commande</h3>
            <p>Vous n'avez pas encore passé de commande.</p>
            <a href="/products">Voir les produits</a>
        </div>
    <?php else: ?>
        <div class="orders-list">
            <?php foreach ($orders as $order): ?>
                <div class="order-card">
                    <div class="order-card-header">
                        <!-- Informations principales -->
                        <div class="order-card-info">
                            <div class="order-card-title">
                                <h3>Commande #<?= htmlspecialchars($order['id']) ?></h3>
                                <span class="status-badge <?= $order['statut'] ?>">
                                    <?php 
                                        if ($order['statut'] === 'validee') {
                                            echo 'Validée';
                                        } elseif ($order['statut'] === 'en_attente') {
                                            echo 'En attente';
                                        } elseif ($order['statut'] === 'annulee') {
                                            echo 'Annulée';
                                        } else {
                                            echo htmlspecialchars($order['statut']);
                                        }
                                    ?>
                                </span>
                            </div>
                            
                            <div class="order-card-meta">
                                <div>Date: <?= date('d/m/Y à H:i', strtotime($order['created_at'])) ?></div>
                            </div>
                            
                            <div class="order-card-total">
                                <?= number_format((float)$order['total'], 2, ',', ' ') ?> €
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="order-card-actions">
                            <a href="/orders/show?id=<?= htmlspecialchars($order['id']) ?>" class="details-btn">
                                Voir les détails
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <div class="back-link">
        <a href="/">Retour à l'accueil</a>
    </div>
</div>

