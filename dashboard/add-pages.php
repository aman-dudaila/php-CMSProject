<?php include('includes/header.php'); ?>
<?php
$templatesArr = ['default', 'left_nav', 'category', 'products','contact_us'];
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    extract($_REQUEST);   
    if (!$id > 0) { 
        $sql = "INSERT INTO tbl_pages(name,status,content, page_order, template) VALUES('$pagename','$status','$content','$page_order','$template')";
        $result = $conn->query($sql);
        if ($result == true) {
            header('Location:pages-data.php');
            echo "inserted";
        } else {
            echo $conn->error;
        }
    } else {
        $sql = "UPDATE tbl_pages SET name='$pagename', status='$status', content='$content', page_order='$page_order', template='$template' where id = $id";
        $result = $conn->query($sql);
        if ($result) {
            header('Location:pages-data.php');
        } else {
            echo $conn->error;
        }
    }
}
?>
<?php 
$sql= "SELECT * FROM tbl_pages WHERE id='$id'";
$result= $conn->query($sql);
$row= $result->fetch_object();
?>

<div class="m-4">
    <div class="action d-flex justify-content-between">
        <h2><?php echo ($id > 0) ? 'Update' :'Add New'; ?> Page</h2>
        <a href="pages-data.php">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
    <form action="" method="post">
        <div class="mb-3 mt-3">
            <label for="name" class="form-label"> Name :</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name"
                name="pagename" value="<?php echo $row->name; ?>">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status :</label>
            <select class="custom-select" id="inputGroupSelect02" name="status">
                <option selected>Status</option>
                <option value="1" <?php echo ($row->status == 1) ? 'selected' : ''; ?> >active</option>
                <option value="0" <?php echo ($row->status == 0) ? 'selected' : ''; ?>>in-active</option>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="name" class="form-label"> Menu Order :</label>
            <input type="text" class="form-control" id="page_order" placeholder="Enter name"
                name="page_order" value="<?php echo $row->page_order; ?>">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Template :</label>
            <select class="custom-select" id="template" name="template">
                <option selected value="">Select Template</option>
                <?php foreach($templatesArr as $key=>$value) { ?>
                    <option value="<?php echo $value; ?>" <?php echo ($row->template == $value) ? 'selected' : ''; ?> ><?php echo ucfirst($value) ?></option>
                <?php }?>
            </select>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content :</label>
            <textarea name="content" class="form-control"><?php echo $row->content; ?></textarea>
        </div>
        <div class="mb-3 mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<?php include('includes/footer.php'); ?>