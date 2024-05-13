<h2>Thêm mới sản phẩm</h2>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
    <div class="form-group">
    <label for="title">Chọn danh mục</label>
        <select name="category_id" class="form-control">
            <?php  $category_model = new Category();
            $categories = $category_model->getAll();?>
            <?php foreach ($categories as $category):
                //giữ trạng thái selected của category sau khi chọn dựa vào
//                tham số category_id trên trình duyệt
                $selected = '';
                if (isset($_GET['category_id']) && $category['id'] == $_GET['category_id']) {
                    $selected = 'selected';
                }
                ?>
                <option value="<?php echo $category['id'] ?>" <?php echo $selected; ?>>
                    <?php echo $category['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    </div>

    <div class="form-group">
        <label for="title">Nhập tên sản phẩm</label>
        <input type="text" name="title" value="<?php echo isset($_POST['title']) ? $_POST['title'] : '' ?>"
               class="form-control" id="title"/>
    </div>
    <div class="form-group">
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" value="" class="form-control" id="avatar"/>
    </div>
    <div class="form-group">
        <label for="price">Giá</label>
        <input type="number" name="price" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>"
               class="form-control" id="price"/>
    </div>
    <div class="form-group">
        <label for="weight">Cân nặng của 1 sản phẩm</label>
        <input type="text" name="weight" value="<?php echo isset($_POST['weight']) ? $_POST['weight'] : '' ?>"
               class="form-control" id="weight"/>
    </div>
    <div class="form-group">
    <div class="form-group">
    <label for="id_supplier">Nhà cung cấp</label>
    <select name="id_supplier" class="form-control" id="supplier">
    <?php
            $supplier_model = new Supplier();
            $suppliers = $supplier_model->getAll();
            foreach ($suppliers as $supplier) {
                $id_supplier = $supplier['id'];
                $name_supplier = $supplier['supplier'];
                echo "<option value='$id_supplier'>$name_supplier</option>";
            }?>
    </select>
    </div>
    </div>
    <div class="form-group">
        <label for="summary">Mô tả ngắn sản phẩm</label>
        <textarea name="summary" id="summary"
                  class="form-control"><?php echo isset($_POST['summary']) ? $_POST['summary'] : '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Mô tả chi tiết sản phẩm</label>
        <textarea name="content" id="description"
                  class="form-control"><?php echo isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
    </div>
    <div class="form -group">
        <?php
            $checked = '';
        ?>
        <input type="checkbox" name="hot" value="1" <?php echo $checked?> id="hot"/>
        <label for="hot" style="padding-left: 5px;">Nổi Bật</label>

    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" id="status">
            <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($_POST['status'])) {
                switch ($_POST['status']) {
                    case 0:
                        $selected_disabled = 'selected';
                        break;
                    case 1:
                        $selected_active = 'selected';
                        break;
                }
            }
            ?>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
            <option value="1" <?php echo $selected_active ?>>Active</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=product&action=index" class="btn btn-default">Back</a>
    </div>
</form>