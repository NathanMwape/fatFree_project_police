<?php
class Policier extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, "policier");
    }

    public function all()
    {
        $this->load();
        return $this->query;
    }

    public function add()
    {
        $this->reset();
        $this->copyfrom("POST");
        $this->save();
    }

    public function getById(int $id)
    {
        $this->load(array("id_policier=?", $id));
    }

    public function getByIdUser(int $id)
    {
        $this->load(array("id_policier=?", $id));
    }

    public function edit($params)
    {
        $this->getById($params);
        $this->copyfrom('POST');
        $this->update();
    }

    public function countPolicier()
    {
        $result = $this->db->query('SELECT COUNT(*) as count FROM policier');
        $count = $result->fetch()['count'];
        return $count;
    }

    public function countPolicierAtt()
    {
        $result = $this->db->query('SELECT COUNT(*) as count FROM policier where armes!=""');
        $count = $result->fetch()['count'];
        return $count;
    }
    public function countPolicierNoAttr()
    {
        $result = $this->db->query("SELECT COUNT(*) as count FROM policier where armes=''");
        $count = $result->fetch()['count'];
        return $count;
    }
    public function delete(int $id = -1)
    {
        if ($id == -1) {
            if (!$this->dry())
                $this->erase();
        } else {
            $this->load(array("id_policier=?", $id));
            $this->erase();
        }
    }

    public function getPoliceByCommissariat($login)
    {
        $this->load(array("nom_commissariat=?", $login));
        return $this->query;
    }
}
