<?php if(isset($_GET['err']) AND $_GET['err'] !== '') { ?>
    <div class="alert-message danger">
        <p><?php echo htmlspecialchars($_GET['err']); ?></p>
    </div>
<?php } ?>