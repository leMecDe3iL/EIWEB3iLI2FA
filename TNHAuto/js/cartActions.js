// Fonction pour ajouter un article au panier
function addToCart(itemId, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'panier/addToCart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200) {
            console.log('Réponse du serveur : ', this.responseText);
            // Vous pouvez mettre à jour l'affichage du panier ici
        }
    };
    xhr.send('itemId=' + itemId + '&quantity=' + quantity);
}

// Fonction pour mettre à jour la quantité d'un article dans le panier
function updateCart(itemId, quantity) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../panier/updateCart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200) {
            console.log('Réponse du serveur : ', this.responseText);
            // Vous pouvez mettre à jour l'affichage du panier ici
        }
    };
    xhr.send('itemId=' + itemId + '&quantity=' + quantity);
}

// Fonction pour supprimer un article du panier
function removeFromCart(itemId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../panier/removeFromCart.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (this.status == 200) {
            console.log('Réponse du serveur : ', this.responseText);
            // Vous pouvez mettre à jour l'affichage du panier ici
        }
    };
    xhr.send('itemId=' + itemId);
}

// Fonction pour charger le panier de l'utilisateur
function loadCart() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../panier/loadCart.php', true); // Assurez-vous que le chemin est correct
    xhr.onload = function () {
        if (this.status == 200) {
            var cartItems = JSON.parse(this.responseText);
            var content = '';
            cartItems.forEach(function(item) {
                content += '<div class="cart-item">' +
                           '<img src="images/' + item.image + '" alt="' + item.name + '" style="width:100px;height:100px;">' +
                           '<p>' + item.name + '</p>' +
                           '<p>Quantité: ' + item.quantite + '</p>' +
                           '<p>Prix unitaire: ' + item.price + ' €</p>' +
                           '<button onclick="updateCart(' + item.id + ', this.previousElementSibling.value)">Mettre à jour</button>' +
                           '<input type="number" value="' + item.quantite + '" min="1">' +
                           '<button onclick="removeFromCart(' + item.id + ')">Supprimer</button>' +
                           '</div>';
            });
            document.getElementById('cart-items').innerHTML = content;
        }
    };
    xhr.send();
}