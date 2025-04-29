<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Error Pages</title>
    <style>
        .error-container {
            text-align: center;
            padding: 50px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            margin: 20px auto;
            max-width: 600px;
        }

        .error-container h1 {
            font-size: 48px;
            color: #721c24;
            margin-bottom: 10px;
        }

        .error-container p {
            font-size: 18px;
            color: #721c24;
            margin-bottom: 20px;
        }

        .error-container a {
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border: 1px solid #007bff;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .error-container a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

    <!-- 408 Error Page -->
    <div class="error-container">
        <h1>408 - Request Timeout</h1>
        <p>Время ожидания запроса истекло. Попробуйте снова.</p>
        <a href="/note">Вернуться на главную</a>
    </div>

</body>
</html>