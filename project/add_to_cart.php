<?php
include("header.php");
if(!isset($_SESSION['role']) || $_SESSION['role']!= 'User') {
    echo "<script>alert('You must be logged in as a User to access this page.'); window.location.href='signin.php'</script>";
    exit();
}
?>
<style>
    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 15px;
        text-align: left;
    }

    thead {
        background-color: #f7f7f7;
        border-bottom: 1px solid #ddd;
    }

    tbody tr {
        border-bottom: 1px solid #ddd;
    }

    tbody tr:last-child {
        border-bottom: none;
    }

    tbody tr:hover {
        background-color: #f2f2f2;
    }

    td:first-child {
        width: 100px;
        text-align: center;
    }

    td:first-child img {
        width: 80px;
        height: 80px;
        border-radius: 10px;
    }




    td:last-child {
        width: 100px;
        text-align: center;
    }

    td:last-child button {
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        background-color: #ff0000;
        color: #fff;
        cursor: pointer;
    }

    td:last-child button:hover {
        background-color: #cc0000;
    }
    .total-amount {
    margin-top: 20px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f9f9f9;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.total-amount span{
    font-weight: bolder;
    font-size: 20px;
    margin-right: 10px;

}

.continue-shopping {
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background-color 0.3s;
}

.continue-shopping:hover {
    background-color: #0056b3;
}
</style>
<body>
    <div class="container mt-5 mb-5">
        <h1>Your Cart</h1>

        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                include('connect.php');


                if(!isset($_SESSION['role']))

                // Initialize the cart session if not set
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                // Add item to cart if cartID is provided
                if (isset($_GET['cartID'])) {
                    $cartID = intval($_GET['cartID']);
                    if (!in_array($cartID, $_SESSION['cart'])) {
                        $_SESSION['cart'][] = $cartID;
                    }
                }

                // Remove item from cart if removeID is provided
                if (isset($_POST['removeID'])) {
                    $removeID = intval($_POST['removeID']);
                    if (($key = array_search($removeID, $_SESSION['cart'])) !== false) {
                        unset($_SESSION['cart'][$key]);
                    }
                }

                // Display cart items
                if (!empty($_SESSION['cart'])) {
                    $cartIDs = implode(',', array_map('intval', $_SESSION['cart']));
                    $query = "SELECT * FROM `books` WHERE book_id IN ($cartIDs)";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><img src="images/<?php echo htmlspecialchars($row['book_image']); ?>" height="40" width="30" alt="<?php echo htmlspecialchars($row['book_title']); ?>"></td>
                            <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                            <td><?php echo htmlspecialchars($row['book_price']); ?></td>
                            <td>
                                <div class="item-container">
                                    <button class="button" onclick="updateQuantity(this, -1)">-</button>
                                    <input type="text" class="quantity" value="1" readonly>
                                    <button class="button" onclick="updateQuantity(this, 1)">+</button>
                                </div>
                            </td>
                            <td>
                                <p>
                                    <input type="hidden" class="input-price" value="<?php echo $row['book_price']; ?>">
                                    $ <span class="total-price"><?php echo htmlspecialchars($row['book_price']); ?></span>
                                </p>
                            </td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="removeID" value="<?php echo $row['book_id']; ?>">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                        }
                    }
                } else {
                    echo "<tr><td colspan='6'>Your cart is empty.</td></tr>";
                }
                ?>

            </tbody>
        </table>
<div class="total-amount">
    <strong>Total Amount: $<span id="cartTotal">0</span></strong>
    <a href="submit_purchase.php" class="btn btn-primary">Buy Now</a>
    <a href="index.php" class="continue-shopping">Continue Shopping</a>
</div>

    </div>

    <script>
    function updateQuantity(button, change) {
        
        const row = button.closest('tr');
        
        const quantityInput = row.querySelector('.quantity');
        const inputPrice = row.querySelector(".input-price").value;
        const totalPriceElement = row.querySelector('.total-price');
        
        let quantity = parseInt(quantityInput.value);
        
        quantity = Math.max(1, quantity + change);
        
        quantityInput.value = quantity;
        
        const totalPrice = quantity * parseFloat(inputPrice);
        totalPriceElement.textContent = totalPrice.toFixed(2);
        
        updateTotalAmount();
    }
    
    function updateTotalAmount() {
        let total = 0;
        
        document.querySelectorAll('.total-price').forEach((priceElement) => {
            total += parseFloat(priceElement.textContent);
        });
        
        document.getElementById('cartTotal').textContent = total.toFixed(2);
    }

    window.onload = updateTotalAmount;
</script>


<?php
include("footer.php");
?>
