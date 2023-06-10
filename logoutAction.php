<?php
  session_start();
?>

  <script>
    location.replace("<?php echo $_SESSION["page"]; ?>");
  </script>

<?php
  session_destroy();
?>