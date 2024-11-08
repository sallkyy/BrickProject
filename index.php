<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Помощник Пешехода</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <img src="logo_png.png" alt="Логотип команды" class="logo_png">
        <h1 class="header-title">ПОМОЩНИК ПЕШЕХОДА</h1>
        <div class="header-buttons">
            <button class="login-button">Вход</button>
            <button class="register-button">Регистрация</button>
        </div>
    </div>
    <div class="content">
        <h2>ЛЕНТА СОБЫТИЙ</h2>
        <div class="event-window">
            <div class="event-date">18.10.2024 13:13 (5 минут назад)</div>
            <div class="event-description">Краткое описание события 1...</div>
            <div class="event-sim">СИМ: 123456</div>
            <div class="event-user">Опубликовал: Иван Иванов</div>
        </div>
        <div class="event-window">
            <div class="event-date">18.10.2024 13:15 (1 минута назад)</div>
            <div class="event-description">Краткое описание события 2...</div>
            <div class="event-sim">СИМ: 654321</div>
            <div class="event-user">Опубликовал: Петр Петров</div>
        </div>
        <div class="event-window">
            <div class="event-date">18.10.2024 13:20 (3 минуты назад)</div>
            <div class="event-description">Краткое описание события 3...</div>
            <div class="event-sim">СИМ: 789012</div>
            <div class="event-user">Опубликовал: Анна Смирнова</div>
        </div>
        <div class="event-window">
            <div class="event-date">18.10.2024 13:25 (2 минуты назад)</div>
            <div class="event-description">Краткое описание события 4...</div>
            <div class="event-sim">СИМ: 345678</div>
            <div class="event-user">Опубликовал: Сергей Сергеев</div>
        </div>
        <div class="event-window">
            <div class="event-date">18.10.2024 13:30 (1 минута назад)</div>
            <div class="event-description">Краткое описание события 5...</div>
            <div class="event-sim">СИМ: 901234</div>
            <div class="event-user">Опубликовал: Ольга Олегова</div>
        </div>
    </div>

    <button class="report-issue">СООБЩИТЬ О СИТУАЦИИ</button>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="modal-title">Вход</h2>
            <form id="loginForm" method="POST" action="login.php">
                <div class="input-container">
                    <input type="text" name="username" placeholder="Логин" required>
                    <input type="password" name="password" placeholder="Пароль" required>
                </div>
                <button type="submit">Войти</button>
            </form>
            <div class="modal-switch">Нет аккаунта? <span id="switchToRegister">Зарегистрируйтесь</span></div>
        </div>
    </div>
    
    <style>
        .success-auth {
            display: block;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: green; 
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
    
    <style>
        .error-auth {
            display: block; 
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: red; 
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>

    <?php if (isset($_POST['auth'])): ?>
        <div id="popup" class="success-auth"><?php echo htmlspecialchars($_POST['auth']); ?></div>
    <?php endif; ?>


    <?php if (isset($_POST['errorAuth'])): ?>
        <div id="popup" class="error-auth"><?php echo htmlspecialchars($_POST['errorAyth']); ?></div>
    <?php endif; ?>
    
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="modal-title">Регистрация</h2>
            <form id="registerForm" method="post" action="register.php"> 
                <div class="input-container">
                    <input type="text" name="username" placeholder="Логин" required>
                    <input type="email" name="email" placeholder="Email" required> 
                    <input type="password" name="password" placeholder="Пароль" required> 
                </div>
                <button type="submit" class="register-button-large">Зарегистрироваться</button>
            </form>
            <div class="modal-switch">Уже есть аккаунт? <span id="switchToLogin">Войдите</span></div>
        </div>
    </div>

    <style>
        .success-message {
            display: block;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: green; 
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
    
    <style>
        .error-message {
            display: block; 
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: red; 
            color: white;
            padding: 15px;
            border-radius: 5px;
            z-index: 1000;
        }
    </style>
    
    <?php if (isset($_GET['success'])): ?>
        <div id="popup" class="success-message"><?php echo htmlspecialchars($_GET['success']); ?></div>
    <?php endif; ?>


    <?php if (isset($_GET['error'])): ?>
        <div id="popup" class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <script>
   
        const popup = document.getElementById('popup');
        if (popup) {
       
            setTimeout(() => {
                popup.style.display = 'none';
            }, 3000);
        }
    </script>

    <div id="reportModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="modal-title">Сообщить о ситуации</h2>
            <form id="reportForm">
                <input type="text" placeholder="Краткое название события*" required>
                <textarea placeholder="Описание происшествия*" required></textarea>
                <input type="text" placeholder="ФИО*" required>
                <input type="text" placeholder="Контактный номер телефона*" required>
                <input type="text" placeholder="Telegram">
                <input type="text" placeholder="Номер СИМ">
                <div class="attach-photos">Прикрепить фотографии</div>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </div>

    <script>
    var loginModal = document.getElementById('loginModal');
    var registerModal = document.getElementById('registerModal');
    var reportModal = document.getElementById('reportModal');

    var loginBtn = document.querySelector('.login-button');
    var registerBtn = document.querySelector('.register-button');
    var reportBtn = document.querySelector('.report-issue');

    var spans = document.getElementsByClassName('close');

    loginBtn.onclick = function() {
        loginModal.style.display = 'block';
    }

    registerBtn.onclick = function() {
        registerModal.style.display = 'block';
    }

    reportBtn.onclick = function() {
        reportModal.style.display = 'block';
    }

    for (var i = 0; i < spans.length; i++) {
        spans[i].onclick = function() {
            loginModal.style.display = 'none';
            registerModal.style.display = 'none';
            reportModal.style.display = 'none';
        }
    }

    window.onclick = function(event) {
        if (event.target == loginModal || event.target == registerModal || event.target == reportModal) {
            loginModal.style.display = 'none';
            registerModal.style.display = 'none';
            reportModal.style.display = 'none';
        }
    }

    var switchToRegister = document.getElementById('switchToRegister');
    var switchToLogin = document.getElementById('switchToLogin');

    switchToRegister.onclick = function() {
        loginModal.style.display = 'none';
        registerModal.style.display = 'block';
    }

    switchToLogin.onclick = function() {
        registerModal.style.display = 'none';
        loginModal.style.display = 'block';
    }
    </script>
</body>
</html>