<h2>Cập nhật nhà cung cấp</h2>
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="supplier">Tên nhà cung cấp</label>
        <input type="text" name="supplier"
               value="<?php echo isset($_POST['supplier']) ? $_POST['supplier'] : $supplier->supplier; ?>"
               class="form-control" id="supplier"/>
    </div>
    
    <div class="form-group">
        <label for="address">Địa chỉ</label>
        <textarea name="address" id="address"
                  class="form-control"><?php echo isset($_POST['address']) ? $_POST['address'] : $supplier->address; ?></textarea>
    </div>
    
    <div class="form-group">
        <label for="mobile">Điện thoại</label>
        <input type="text" name="mobile"
               value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : $supplier->mobile; ?>"
               class="form-control" id="mobile"/>
    </div>
       
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=supplier&action=index" class="btn btn-default">Back</a>
    </div>
</form>