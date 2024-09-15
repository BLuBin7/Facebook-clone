<?php 
	$corner_image = "images/user_male.jpg";
	if(isset($USER)){
		if(file_exists($USER['profile_image'])) {
			$image_class = new Image();
			$corner_image = $image_class->get_thumb_profile($USER['profile_image']);
		} else {
			if($USER['gender'] == "Female") {
				$corner_image = "images/user_female.jpg";
			}
		}
	}
?>

<div id="blue_bar">
	<form method="get" action="<?=ROOT?>search">
		<div class="header-container">
			<a href="<?=ROOT?>home" class="logo">Facebook</a>
			<input type="text" id="search_box" name="find" placeholder="Search Facebook" />

			<?php if(isset($USER)): ?>
				<div class="user-menu">
					<a href="<?=ROOT?>profile">
						<img src="<?php echo ROOT . $corner_image ?>" class="profile-pic">
					</a>
					<a href="<?=ROOT?>logout" class="logout">Logout</a>
					<a href="<?=ROOT?>notifications" class="notifications">
						<img src="<?=ROOT?>notif.svg" class="notif-icon">
						<?php $notif = check_notifications(); ?>
						<?php if($notif > 0): ?>
							<div class="notif-count"><?= $notif ?></div>
						<?php endif; ?>
					</a>
					<a href="<?=ROOT?>messages" class="messages">
						<svg fill="orange" class="message-icon" viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.971l-11.986 9.713zm-5.425-1.822l-6.575-5.329v12.501l6.575-7.172zm10.85 0l6.575 7.172v-12.501l-6.575 5.329zm-1.557 1.261l-3.868 3.135-3.868-3.135-8.11 8.848h23.956l-8.11-8.848z"/></svg>
						<?php $notif = check_messages(); ?>
						<?php if($notif > 0): ?>
							<div class="notif-count"><?= $notif ?></div>
						<?php endif; ?>
					</a>
				</div>
			<?php else: ?>
				<a href="<?=ROOT?>login" class="login">Login</a>
			<?php endif; ?>
		</div>
	</form>
</div>

<style>
	#blue_bar {
		background-color: #0165E1;
		padding: 10px 0;
		color: white;
	}
	.header-container {
		width: 800px;
		margin: auto;
		display: flex;
		align-items: center;
		justify-content: space-between;
		
	}
	.logo {
		font-size: 30px;
		color: white;
		text-decoration: none;
		margin-right: 10px; 
	}
	#search_box {
		width: 300px;
		padding: 5px;
		border-radius: 5px;
		border: none;
	}
	.user-menu {
		display: flex;
		align-items: center;
		margin-left: auto;
	}
	.profile-pic {
		width: 50px;
		border-radius: 50%;
		margin-right: 10px;
	}
	.logout, .login {
		font-size: 13px;
		color: white;
		margin-left: 10px;
		text-decoration: none;
	}
	.notifications, .messages {
		position: relative;
		margin-left: 10px;

	}
	.notif-icon, .message-icon {
		width: 25px;
		margin-top: 10px;

	}
	.notif-count {
		background-color: red;
		color: white;
		position: absolute;
		right: -10px;
		top: -5px;
		width: 15px;
		height: 15px;
		border-radius: 50%;
		padding: 2px;
		text-align: center;
		font-size: 12px;

	}
</style>
