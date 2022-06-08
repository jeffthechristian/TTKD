
<div class="menu-bar">
        <div class="burger-button">
            <button class="accent-link nav-button"><i class="fa-solid fa-bars"></i></button>
        </div>
        <ul class="menu-items">
            <li><a href="index.php">Sākums</a></li>
            <li><a href="forum.php">Forums</a></li>
            <li><a href="rules.php">Noteikumi</a></li>
        </ul>
        <?php if (!isset($_SESSION['is-logged-in'])): ?>
        <ul class="user-options">
            <li><a href="login.php">Ienākt</a></li>
            <li><a href="register.php" class="accent-link">Reģistrēties</a></li>
        </ul>
        <?php else: ?>
        <ul class="user-options">
            <li><p>Labdien, <?php echo $_SESSION['username']; ?>!</p></li>
            <li><a href="profile.php?profileid=<?php echo $_SESSION['user-id']; ?>">Profils</a></li>
            <li><a href="logout.php" class="accent-link">Iziet</a></li>
        </ul>
        <?php endif; ?>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />