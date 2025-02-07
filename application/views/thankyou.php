<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .thank-you-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        .thank-you-container h1 {
            color: rgb(227, 31, 31);
            margin: 0 0 15px;
        }
        .thank-you-container p {
            color: #555;
            margin: 0 0 20px;
            line-height: 1.5;
        }
        .thank-you-container a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            color: #fff;
            background-color:rgb(227, 31, 31);
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .thank-you-container a:hover {
            background-color: rgb(227, 31, 31);
        }
    </style>
</head>
<body>
    <div class="thank-you-container">
        <h1>Thank You For Registration!</h1>
        <p>Your registration was successful. <br> Your username and password have been sent to your registered email.</p>
        <a href="<?=base_url() ?>">Back to Home</a>
    </div>
</body>
</html>
