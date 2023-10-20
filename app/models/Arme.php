<?php
class Arme extends DB\SQL\Mapper
{

    public function __construct(DB\SQL $db)
    {
        parent::__construct($db, "arme");
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
        $image_name = $_FILES['images']['name'];
        $image_tmp_name = $_FILES['images']['tmp_name'];
        $image_type = $_FILES['images']['type'];
        $image_size = $_FILES['images']['size'];
        $image_error = $_FILES['images']['error'];
        $extensions = array('jpg', 'jpeg', 'png', 'gif');
        $file_ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
        $upload_dir = 'images/';

        $upload_file = $upload_dir . basename($image_name);

        if (in_array($file_ext, $extensions) && $image_error === 0) {
            if (move_uploaded_file($image_tmp_name, $upload_file)) {
                $this->images = $upload_dir . $image_name;
                $this->save();
            } else {
                echo "Une erreur s'est produite lors du téléchargement du fichier.";
            }
        } else {
            echo "Le fichier téléchargé n'est pas valide. Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        }
        $this->save();
    }


    public function getById(int $id)
    {
        $this->load(array("id_arme=?", $id));
    }

    public function getByIdUser(int $id)
    {
        $this->load(array("id_arme=?", $id));
    }

    public function delete(int $id = -1)
    {
        if ($id == -1) {
            if (!$this->dry())
                $this->erase();
        } else {
            $this->load(array("id_arme=?", $id));
            $this->erase();
        }
    }

    public function countArme()
    {
        $result = $this->db->query('SELECT COUNT(*) as count FROM arme');
        $count = $result->fetch()['count'];
        return $count;
    }
}
