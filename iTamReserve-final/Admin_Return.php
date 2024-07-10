<?php
session_start();

function connectToDatabase()
{
    $conn = mysqli_connect('localhost', 'root', '', 'iTamReserve');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function updateEquipmentAvailability($conn, $equipmentId, $quantityToReturn)
{
    $query = "SELECT available_quantity, quantity FROM equipment WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $equipmentId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_assoc($result);

    if ($data) {
        $newQuantity = $data['available_quantity'] + $quantityToReturn;
        if ($newQuantity > $data['quantity']) {
            return "Cannot return more equipment than the total stock.";
        }
        $updateQuery = "UPDATE equipment SET available_quantity = ? WHERE id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "ii", $newQuantity, $equipmentId);
        mysqli_stmt_execute($updateStmt);
        return "Equipment returned successfully, new available quantity: " . $newQuantity;
    } else {
        return "Equipment not found.";
    }
}

$conn = connectToDatabase();
$successMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipmentId = mysqli_real_escape_string($conn, $_POST['equipment']);
    $quantityToReturn = (int)$_POST['quantity'];
    $result = updateEquipmentAvailability($conn, $equipmentId, $quantityToReturn);

    if (strpos($result, 'successfully')) {
        $successMessage = $result;
    } else {
        $errorMessage = $result;
    }
}

$equipmentRecords = mysqli_query($conn, "SELECT id, name, type, available_quantity FROM equipment");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Return Equipment</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">
                <img src="logo.png" alt="Logo">
                <div class="admin-name">
                    <h1>Hello, <?php echo isset($_SESSION['full_name']) ? htmlspecialchars($_SESSION['full_name']) : 'admin'; ?>!</h1>
                </div>
            </div>
            <div class="itamreserve-logo">
                <img src="iTamReservelogo.png" alt="itamreserve-logo">
            </div>
            <div class="nav-buttons">
                <form action="admin.php" method="POST">
                    <button type="submit" class="home">Home</button>
                </form>
                <form action="Start.php" method="POST">
                    <button type="submit" class="logout">Logout</button>
                </form>
            </div>
        </header>
        <div class="main-content">
            <div class="form-section">
                <h2>Return Form</h2>
                <form action="" method="POST">
                    <label for="equipment">Borrowed Equipment</label>
                    <select id="equipment" name="equipment" required>
                        <option value="" disabled selected>Select Equipment</option>
                        <?php
                        if (mysqli_num_rows($equipmentRecords) > 0) {
                            while ($row = mysqli_fetch_assoc($equipmentRecords)) {
                                echo "<option value='" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['name']) . " </option>";
                            }
                        } else {
                            echo "<option value='' disabled>No equipment available</option>";
                        }
                        ?>
                    </select>
                    <label for="quantity">Quantity to Return</label>
                    <input type="number" id="quantity" name="quantity" min="1" required>
                    <button type="submit">Return</button>
                    <?php if ($errorMessage) : ?>
                        <div class="error-message"><?php echo $errorMessage; ?></div>
                    <?php endif; ?>
                    <?php if ($successMessage) : ?>
                        <div class="success-message"><?php echo $successMessage; ?></div>
                    <?php endif; ?>
                </form>
            </div>
            <div class="record-section">
                <h2>Equipment Record</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Equipment</th>
                            <th>Available Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = mysqli_query($conn, "SELECT name, available_quantity FROM equipment");
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr><td style='color: #002b16; text-align: center;'>" . htmlspecialchars($row['name']) . "</td><td style='color: #002b16; text-align: center;'>" . htmlspecialchars($row['available_quantity']) . "</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2' style='color: #002b16; text-align: center;'>No records found</td></tr>";
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>