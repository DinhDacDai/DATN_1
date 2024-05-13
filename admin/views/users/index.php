<?php
require_once 'helpers/Helper.php';
?>
    <!--form search-->


    <h2>Danh sách tài khoản</h2>
    <a href="index.php?controller=user&action=create" class="btn btn-success">
        <i class="fa fa-plus"></i> Thêm mới
    </a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th>Permission</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
        <?php
         $user_model = new User();
         $user = $user_model->getAll();
          if (!empty($user)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['password'] ?></td>
                    <td><?= $user['mobile'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['permission'] ?></td>
                    <td><?= $user['created_at'] ?></td>
                    <td><?= $user['updated_at'] ?></td>
                    <td>
                        <?php
                        $url_update = "index.php?controller=user&action=update&id=" . $user['id'];
                        $url_delete = "index.php?controller=user&action=delete&id=" . $user['id'];
                        ?>
                        <a title="Update" href="<?= $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                        <a title="Xóa" href="<?= $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
           
        <?php endif; ?>
       
    </table>