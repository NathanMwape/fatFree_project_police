<?php

class Commissariat extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, 'commissariat');
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
        $this->load(array('nom=?', $nom));
        return $this->query;
    }

    public function add()
    {
        $this->reset();
        $this->copyfrom("POST");
        $this->save();
    }

    public function edit($params) {
            $this->getById($params);
            $this->copyfrom('POST');
            $this->update();
        }
}
