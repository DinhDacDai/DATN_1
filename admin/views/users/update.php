<h2>Thêm mới tài khoản</h2>
<form method="post" action="" enctype="multipart/form-data">


  
    <div class="form-group">
        <label for="title_detail">Nhập tên tài khoản</label>
        <textarea name="username" id="title_detail"
                  class="form-control"><?php echo isset($_POST['username']) ? $_POST['username'] :$user->username;?></textarea>
    </div>
    <div class="form-group">
        <label for="title_detail">Mât khẩu</label>
        <textarea name="password" id="title_detail"
                  class="form-control"><?php echo isset($_POST['password']) ? $_POST['password'] : $user->password; ?></textarea>
    </div>
    <div class="form-group">
        <label for="title_detail">Số điện thoại</label>
        <textarea name="mobile" id="title_detail"
                  class="form-control"><?php echo isset($_POST['mobile']) ? $_POST['mobile'] : $user-> mobile;?></textarea>
    </div>
    <div class="form-group">
        <label for="title_detail">Email</label>
        <textarea name="email" id="title_detail"
                  class="form-control"><?php echo isset($_POST['email']) ? $_POST['email'] : $user->email; ?></textarea>
    </div>
    <div class="form-group">
        <label for="title_detail">Địa chỉ</label>
        <textarea name="address" id="title_detail"
                  class="form-control"><?php echo isset($_POST['address']) ? $_POST['address'] : $user-> address;?></textarea>
    </div>
    
   

    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=user&action=index" class="btn btn-default">Back</a>
    </div>
</form>