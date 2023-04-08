<?php
class Admin extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db, "admin");
    }

    public function all() {
        $this->load();
        return $this->query;
    }

    public function getById(int $id) {
        $this->load(array("id_admin=?", $id));
    }

    public function getByIdUser(int $id) {
        $this->load(array("id_user=?", $id));
    }

    public function edit() {}

    public function deleteByUserId($id) {
        $this->load(array("id_user=?", $id));
        $this->erase();
    }
    public function addByIdUser($id) {
        $this->reset();
        $this->userID = $id;
        $this->save();
    }
}