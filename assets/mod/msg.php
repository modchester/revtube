<?php if(isset($_GET['msg']) AND $_GET['msg'] !== '') { ?>
    <div class="alert-message success">
        <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
    </div>
<?php } ?>