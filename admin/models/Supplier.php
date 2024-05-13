<?php
require_once 'models/Model.php';

class Supplier extends Model
{
    public $id;
    public $supplier;
    public $address;
    public $mobile;

    public function __construct()
    {
        parent::__construct();
    }
    public function getAll()
    {
        $sql_select_all = "SELECT * FROM suppliers";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        return $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
{
    $sql_select = "SELECT * FROM suppliers WHERE id = :id";
    $obj_select = $this->connection->prepare($sql_select);
    $obj_select->execute(array(':id' => $id));
    
    // Lấy kết quả từ câu lệnh SQL
    $result = $obj_select->fetch(PDO::FETCH_ASSOC);
    
    // Kiểm tra xem có kết quả trả về không
    if ($result) {
        // Tạo một đối tượng Supplier từ kết quả SQL
        $supplier = new Supplier();
        $supplier->id = $result['id'];
        $supplier->supplier = $result['supplier'];
        $supplier->address = $result['address'];
        $supplier->mobile = $result['mobile'];
        return $supplier;
    } else {
        // Trả về null nếu không tìm thấy dữ liệu
        return null;
    }
}

    public function insert()
    {
        $sql_insert = "INSERT INTO suppliers (supplier, address, mobile) VALUES (:supplier, :address, :mobile)";
        $obj_insert = $this->connection->prepare($sql_insert);
        return $obj_insert->execute(array(
            ':supplier' => $this->supplier,
            ':address' => $this->address,
            ':mobile' => $this->mobile
        ));
    }

    public function update($id)
    {
        $sql_update = "UPDATE suppliers SET supplier = :supplier, address = :address, mobile = :mobile WHERE id = :id";
        $obj_update = $this->connection->prepare($sql_update);
        return $obj_update->execute(array(
            ':supplier' => $this->supplier,
            ':address' => $this->address,
            ':mobile' => $this->mobile,
            ':id' => $id
        ));
    }

    public function delete($id)
    {
        $sql_delete = "DELETE FROM suppliers WHERE id = :id";
        $obj_delete = $this->connection->prepare($sql_delete);
        return $obj_delete->execute(array(':id' => $id));
    }

}
?>