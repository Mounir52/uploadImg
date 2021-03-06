<?php

/**
 * Description of CategManager
 *
 * @author webform
 */
class CategManager {
    // Attributs
    private $db;
    // Constantes
    // méthodes
    public function __construct(PDO $con) {
        $this->db = $con;
    }
    
    public function afficheToutes() {
        $req = $this->db->query("SELECT * FROM categ ORDER BY intitule ASC;");
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    public function afficheUne($id) {
        $sql = "SELECT * FROM categ WHERE idcateg = ? ;";
        $req = $this->db->prepare($sql);
        $req->bindValue(1,$id, PDO::PARAM_INT);
        $req->execute();
        if($req->rowCount()){
            return $req->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }
}
