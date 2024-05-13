<?php
require_once 'helpers/Helper.php';
?>
    <!--form search-->


    <h2>Danh sách nhà cung cấp</h2>
    <a href="index.php?controller=supplier&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th></th>
        </tr>
        <?php
         $supplier_model = new Supplier();
         $suppliers = $supplier_model->getAll();
          if (!empty($suppliers)): ?>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $supplier['id'] ?></td>
                    <td><?= $supplier['supplier'] ?></td>
                    <td><?= $supplier['address'] ?></td>
                    <td><?= $supplier['mobile'] ?></td>
                    <td>
                        <?php
                        $url_update = "index.php?controller=supplier&action=update&id=" . $supplier['id'];
                        $url_delete = "index.php?controller=supplier&action=delete&id=" . $supplier['id'];
                        ?>
                        <a title="Update" href="<?= $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                        <a title="Xóa" href="<?= $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không có nhà cung cấp nào được tìm thấy.</td>
            </tr>
        <?php endif; ?>
       
    </table>