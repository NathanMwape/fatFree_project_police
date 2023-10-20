<?php

class Affectation extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'affectation');
    }

    public function all()
    {
        $this->load();
        return $this->query;
    }

    public function getById($id)
    {
        $this->load(array('id=?', $id));
        return $this->query;
    }

    public function getByNom($nom)
    {
        $this->load(array('nom_policier=?', $nom));
        return $this->query;
    }

    public function add()
    {
        $this->reset();
        $this->copyfrom("POST");
        $this->save();
    }

    public function edit($params)
    {
        $this->getById($params);
        $this->copyfrom('POST');
        $this->update();
    }

    public function desaffecter()
    {
        // Mettre à jour le champ nom_commissariat pour le désaffecter
        $this->nom_commissariat = '';
        $this->update();
    }
}
