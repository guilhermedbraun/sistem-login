<?php
    if(!isset($_SESSION['ativo']))
    {
        header('Location: ../index.php');
    }
?>
    <footer class="<?php echo isset($footer_class)?$footer_class:'' ;?>">
        <p class="copyright">&copy; 2023 - Profinchange</p>
    </footer>