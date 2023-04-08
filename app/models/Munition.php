<?php
class Munition extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db, "munition");
    }

    public function all() {
        $this->load();
        return $this->query;
    }

    public function add() {
        $this->reset();
        $this->copyfrom("POST");
        $this->save();
    }

    public function getByIdArme($id_arme) {
        $this->load(array("type_munition=?", $id_arme));
    }

    public function getById($id_munition) {
        $this->load(array("id_munition=?", $id_munition));
    }

    public function edit($params) {
        $this->getById($params);
        $this->copyfrom('POST');
        $this->update();
    }

    public function countMunition(){
        $result = $this->db->query('SELECT COUNT(*) as count FROM munition');
        $count = $result->fetch()['count'];
        return $count;
    }

}