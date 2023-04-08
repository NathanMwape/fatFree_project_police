<?php

    class Attribution extends DB\SQL\Mapper {
        public function __construct(DB\SQL $db) {
            parent::__construct($db, "attribution");
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

        public function getById($id) {
            $this->load(array("id=?", $id));
        }

        public function getByIdArme($id_arme) {
        $this->load(array("id=?", $id_arme));
        }

        public function edit($params) {
            $this->getById($params);
            $this->copyfrom('POST');
            $this->update();
        }

        public function delete(int $id=-1) {
            if($id == -1) {
                if(! $this->dry())
                    $this->erase();
            }else {
                $this->load(array("id_policier=?", $id));
                $this->erase();
            }
        }

        public function SelectAttrib(){
            $result= $this->db->query("SELECT COUNT(*) as counts FROM attribution ORDER BY ASC LIMIT 10");
            $resultCount = $result->fetch()['counts'];
            return $resultCount;
        }
    }