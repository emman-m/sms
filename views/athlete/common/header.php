<div class="header">
    <div class="profile">
        <div class="profile-pic">
            <img src="<?php echo "../assets/uploads/docs/{$_SESSION['user_id']}/{$_SESSION['picture']}" ?>"
                alt="User Icon" class="profile-pic" onError="this.onerror=null;this.src='../assets/images/empty.png'">
        </div>
        <div class="profile-info">
            <h2><?php echo $_SESSION['full_name'] ?></h2>
            <p><?= Sport::getDescription($_SESSION['sport']) ; ?></p>
        </div>
    </div>
    <a href="../logout" class="sms-btn btn-white">Logout</a>
</div>