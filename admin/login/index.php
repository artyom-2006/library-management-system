<!DOCTYPE html>
<html lang="hy">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ղեկավարման վահանակ</title>
  <link rel="stylesheet" href="../../css/normalize.min.css">
  <link rel="stylesheet" href="../css/pages/log-in.css">
  <link rel="stylesheet" href="../../css/variables/variables.css">
  <link rel="shortcut icon" href="../resources/images/admin-icon.png" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="login form">
            <h2>Մուտք</h2>
            <form id="login-form">
                <input type="text" id="username-input" name="username" placeholder="Օգտանուն" autocomplete="off">
                <input type="password" id="password-input" name="password" placeholder="Գաղտնաբառ" autocomplete="off">
                <p class="error-message"></p>
                <button type="submit" class="button">Մուտք</button>
            </form>
        </div>
    </div>
    <script src="../js/pages/login-data.js"></script>
</body>
</html>