<?php
class Rapports extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db, "rapports");
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

    public function getById(int $id) {
        $this->load(array("id_policier=?", $id));
    }

    public function getByIdUser(int $id) {
        $this->load(array("id_policier=?", $id));
    }

    public function edit($params) {
        $this->getById($params);
        $this->copyfrom('POST');
        $this->update();
    }

}