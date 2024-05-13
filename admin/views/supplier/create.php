<h2>Thêm mới nhà cung cấp</h2>
<form method="post" action="" enctype="multipart/form-data">


  
    <div class="form-group">
        <label for="title_detail">Nhập tên nhà cung cấp</label>
        <textarea name="supplier" id="title_detail"
                  class="form-control"><?php echo isset($_POST['supplier']) ? $_POST['supplier'] : '' ?></textarea>
    </div>

    <div class="form-group">
        <label for="title_detail">Địa chỉ</label>
        <textarea name="address" id="title_detail"
                  class="form-control"><?php echo isset($_POST['address']) ? $_POST['address'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="title_detail">Số điện thoại</label>
        <textarea name="mobile" id="title_detail"
                  class="form-control"><?php echo isset($_POST['mobile']) ? $_POST['mobile'] : '' ?></textarea>
    </div>
   

    <input type="submit" class="btn btn-primary" name="submit" value="Thêm mới"/>
    <a href="index.php?controller=supplier&action=index" class="btn btn-default">Back</a>
</form>