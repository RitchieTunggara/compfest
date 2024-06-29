<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container label {
            display: block;
            margin: 10px 0 5px;
        }
        .container input, .container select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Reservation Form</h2>
    <form action="submit_reservation.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" required>

        <label for="service">Service:</label>
        <select id="service" name="service" required>
            <option value="haircut">Haircut and Styling</option>
            <option value="massage">Manicure and Pedicure</option>
            <option value="manicure">Facial Treatments</option>
        </select>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="time">Time:</label>
        <select id="time" name="time" required>
            <option value="slot1">09.00 AM - 10.00 AM</option>
            <option value="slot1">10.00 AM - 11.00 AM</option>
            <option value="slot1">11.00 AM - 12.00 PM</option>
            <option value="slot1">12.00 PM - 01.00 PM</option>
            <option value="slot1">01.00 PM - 02.00 PM</option>
            <option value="slot1">02.00 PM - 03.00 PM</option>
            <option value="slot1">03.00 PM - 04.00 PM</option>
            <option value="slot1">04.00 PM - 05.00 PM</option>
            <option value="slot1">05.00 PM - 06.00 PM</option>
            <option value="slot1">06.00 PM - 07.00 PM</option>
            <option value="slot1">07.00 PM - 08.00 PM</option>
            <option value="slot1">08.00 PM - 09.00 PM</option>
        </select>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>

        <button type="submit">Submit Reservation</button>
    </form>
</div>

</body>
</html>