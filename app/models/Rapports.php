<?php
class Rapports extends DB\SQL\Mapper {

    public function __construct(DB\SQL $db) {
        parent::__construct($db, "rapports");
    }

    public function all() {
        $this->load();
        return $this->query;
    }

    public function getById(int $id) {
        $this->load(array("id_rapport=?", $id));
    }

    public function getByIdUser(int $id) {
        $this->load(array("id_rapport=?", $id));
    }

    public function edit($params) {
        $this->getById($params);
        $this->copyfrom('POST');
        $this->update();
    }

    public function add($rapport_content,$date_creation, $destinataire) {
        $this->descriptions= $rapport_content;
        $this->date_creation = $date_creation;
        $this->Destinatair = $destinataire;
        $this->save();
    }

    public function selectRapportUser($login){
        $resultat = $this->db->exec('SELECT * FROM rapports WHERE Destinatair = ?', $login);
        return $resultat;
    }
}