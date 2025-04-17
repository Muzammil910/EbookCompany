<?php
session_start();

// Check if the user is logged in or not
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
    // User is not logged in, redirect to login page
    header('Location: login.php');
    exit();
}

// Initialize the cart session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle form submissions for adding items to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_price = $_POST['book_price'];
    $quantity = intval($_POST['quantity']);
    $book_image = $_POST['book_image'];

    // Add or update the item in the cart
    if (isset($_SESSION['cart'][$book_id])) {
        $_SESSION['cart'][$book_id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$book_id] = [
            'title' => $book_title,
            'price' => $book_price,
            'quantity' => $quantity,
            'image' => $book_image,
        ];
    }

    // Redirect to cart page
    header("Location: cart.php");
    exit();
}

// Function to calculate the total cart price
function calculateTotalPrice() {
    $total_price = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total_price += $item['price'] * $item['quantity'];
    }
    return $total_price;
}

// Function to count total items in the cart
if (!function_exists('getCartItemCount')) {
    function getCartItemCount() {
        if (isset($_SESSION['cart'])) {
            $itemCount = 0;
            foreach ($_SESSION['cart'] as $item) {
                $itemCount += $item['quantity']; 
            }
            return $itemCount;
        }
        return 0;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $response = ['status' => 'error'];

    if ($_POST['action'] == 'update_quantity' && isset($_POST['book_id'], $_POST['quantity'])) {
        $book_id = $_POST['book_id'];
        $new_quantity = intval($_POST['quantity']);

        if ($new_quantity > 0 && isset($_SESSION['cart'][$book_id])) {
            $_SESSION['cart'][$book_id]['quantity'] = $new_quantity;
            $response['status'] = 'success';
            $response['item_total'] = $_SESSION['cart'][$book_id]['price'] * $new_quantity;
            $response['total_price'] = calculateTotalPrice();
            $response['cart_item_count'] = getCartItemCount();
        }
    } elseif ($_POST['action'] == 'remove_item' && isset($_POST['book_id'])) {
        $book_id = $_POST['book_id'];
        if (isset($_SESSION['cart'][$book_id])) {
            unset($_SESSION['cart'][$book_id]);
            $response['status'] = 'success';
            $response['total_price'] = calculateTotalPrice();
            $response['cart_item_count'] = getCartItemCount();
        }
    }

    echo json_encode($response);
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<?php
include("header.php");
?>
<style>
    /* Custom Button Styles */
.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
}

.btn-warning:hover,
.btn-warning:focus,
.btn-warning:active {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #212529;
    box-shadow: none;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
    color: #fff;
}

.btn-success:hover,
.btn-success:focus,
.btn-success:active {
    background-color: #28a745;
    border-color: #28a745;
    color: #fff;
    box-shadow: none;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: #fff;
}

.btn-danger:hover,
.btn-danger:focus,
.btn-danger:active {
    background-color: #dc3545;
    border-color: #dc3545;
    color: #fff;
    box-shadow: none;
}

</style>
<body>
    <div class="container mt-5 mb-5">
    <h1>Your Cart</h1>
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
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
                $total_price = 0;
                foreach ($_SESSION['cart'] as $id => $item):
                    $total = $item['price'] * $item['quantity'];
                    $total_price += $total;
                ?>
                    <tr id="row-<?php echo $id; ?>">
                        <td><img src="images/<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" style="width:50px;"></td>
                        <td><?php echo $item['title']; ?></td>
                        <td>PKR <?php echo number_format($item['price'], 2); ?></td>
                        <td>
                            <div class="quantity-wrapper">
                                <button type="button" class="quantity-minus btn text-white" data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>" style="background-color: #1a1a1a; border-color: #1a1a1a;">-</button>
                                 <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" min="1" class="quantity-input" data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>">
                                <button type="button" class="quantity-plus btn text-white" data-id="<?php echo $id; ?>" data-price="<?php echo $item['price']; ?>" style="background-color: #1a1a1a; border-color: #1a1a1a;">+</button>
                            </div>
                        </td>
                        <td class="item-total" id="item-total-<?php echo $id; ?>">PKR <?php echo number_format($total, 2); ?></td>
                        <td>
                            <button type="button" class="remove-item btn text-dark" data-id="<?php echo $id; ?>" style="background-color: #ff7a5c; border-color: #1a1a1a;">Remove</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4"><strong>Total Price</strong></td>
                    <td colspan="2"><strong class="cart-total">PKR <?php echo number_format($total_price, 2); ?></strong></td>
                </tr>
            </tbody>
        </table>
        
        <!-- Purchase Button -->
        <div class="mt-3">
            <a href="submit_purchase.php" class="btn btn-primary">Buy Now</a>
        </div>

    <?php endif; ?>
    </div>
    <script>
$(document).ready(function() {
    // Handle quantity change
    $('.quantity-minus, .quantity-plus').on('click', function() {
        const $input = $(this).siblings('.quantity-input');
        let quantity = parseInt($input.val());
        const bookId = $(this).data('id');
        const price = parseFloat($(this).data('price'));

        if ($(this).hasClass('quantity-minus') && quantity > 1) {
            quantity--;
       
        } else if ($(this).hasClass('quantity-plus')) {
            quantity++;
        }

        // Update the input value
        $input.val(quantity);

        // Send AJAX request to update quantity
        $.post('cart.php', {
            action: 'update_quantity',
            book_id: bookId,
            quantity: quantity
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === 'success') {
                // Update the item's total price and the cart's total price
                $(`#item-total-${bookId}`).text(`PKR ${data.item_total.toFixed(2)}`);
                $('.cart-total').text(`PKR ${data.total_price.toFixed(2)}`);
                $('#cart-count').text(data.cart_item_count); // Update cart count in the header
            }
        });
    });

    // Handle remove item
    $('.remove-item').on('click', function() {
        const bookId = $(this).data('id');

        // Send AJAX request to remove item
        $.post('cart.php', {
            action: 'remove_item',
            book_id: bookId
        }, function(response) {
            const data = JSON.parse(response);
            if (data.status === 'success') {
                // Remove the item row from the table and update the total price
                $(`#row-${bookId}`).remove();
                $('.cart-total').text(`PKR ${data.total_price.toFixed(2)}`);
                $('#cart-count').text(data.cart_item_count); // Update cart count in the header
            }
        });
    });
});
</script>


  


<?php
include("footer.php");
?>

</body>
</html>