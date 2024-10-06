<?php include('header.php'); ?>
<main class="main">
  <section id="hero" class="hero section card">
    <div class="info d-flex align-items-center">
      <div class="container">
        <?php 
          $id = ($_GET['id']) ? $_GET['id'] : 1;
          if($id > 0) {
            $sql = "SELECT * FROM tbl_pages where id = $id and status = 1";
            $result = $conn->query($sql);
            $row = $result->fetch_object();
            $fileName = $row->template.'.php';
            $content = $row->content;
            include_once("templates/".$fileName);
          }
        ?>
      </div>
    </div>
  </section>
</main>
<?php include('footer.php'); ?>