<?php

class Reservation
{
    private $for_titre;
    private $textarea;
    private $heure1;
    private $id;
    private $heure2;
    private $date;
    private $login;
    private $date1;
    private $date2;
    private $reserver2;
    private $n_login;

    public function getDate()
    {
        return $this->date;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getFor_titre()
    {
        return $this->for_titre;
    }
    public function setFor_titre($for_titre)
    {
        $this->for_titre = $for_titre;
    }
    public function getTextarea()
    {
        return $this->textarea;
    }
    public function setTextarea($textarea)
    {
        $this->textarea = $textarea;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($login)
    {
        $this->login = $login;
    }
    public function getRe()
    {
        return $this->re;
    }
    public function setRe($re)
    {
        $this->re = $re;
    }
    public function getRe2()
    {
        return $this->re2;
    }
     function setRe2($re2)
    {
        $this->re2 = $re2;
    }
    public function getHeure1()
    {
        return $this->heure1;
    }
    public function setHeure1($heure1)
    {
        $this->heure1 = $heure1;
    }
    public function getHeure2()
    {
        return $this->heure2;
    }
    public function setHeure2($heure2)
    {
        $this->heure2 = $heure2;
    }




    public function reserver($for_titre,$textarea,$re,$re2,$heure1,$heure2,$date,$login){

        $this->setFor_titre($for_titre);
        $this->setTextarea($textarea);
        $this->setDate($date);
        $this->setRe($re);
        $this->setHeure1($heure1);
        $this->setHeure2($heure2);
        $this->setRe2($re2);
        $this->setLogin($login);
        require_once('../library/Database.php');
        require_once('../library/Utils.php');
        $dbco = connectPdo();
        $errors = array();



        //Si on à tout les champs:

        if ($this->for_titre && $this->textarea  && $this->re && $this->re2 && $this->heure1 && $this->heure2 && $this->date)
        {
            //transforme en timestamp Unix
            $debut_str = strtotime($this->re);
            $semaine = explode("-", $this->date);
            $jour = date("N", mktime(0, 0, 0, $semaine[1], $semaine[2], $semaine[0]));

/*          var_dump($debut_str);
            var_dump($semaine);
            var_dump($jour);*/

            if($debut_str<time()) {
                array_push($errors, " L'heure est déjà passée");
            }
            if (strlen($this->for_titre) > 20) {
                array_push($errors, "Le titre est trop long");
            }
            if (strlen($this->for_titre) < 3) {
                array_push($errors, "Le titre est trop court");
            }
            if (strlen($this->textarea) > 150) {
                array_push($errors, "La description est trop long");
            }
            if (strlen($this->textarea) < 5) {
                array_push($errors, "La description est trop courte !");
            }
            if ($this->heure1 == "Heure") {
                array_push($errors, "Choisissez une heure de départ ! ");
            }
            if ($jour > 5) {
                array_push($errors, "Pas de réservation le week-end");
            }

            //Verifie que la réservation n'est pas dejà prise
            $heure = $this->heure1;
/*            var_dump($heure);*/
            $req = $dbco->prepare('SELECT * FROM reservations WHERE  $heure  BETWEEN debut AND fin');
            $result = $req->fetchAll();
            if ($result == 1)
            {
               array_push($errors, "Cette réservation est déjà prise");
            }


            //vérifie que le titre ne soit pas dèjà utilisé
            $sel = $dbco->prepare("SELECT * FROM reservations");
            $sel->execute();
            foreach ($sel as $row) {
                if ($row["titre"] == $this->for_titre)
                {
                    array_push($errors, "Le titre est déja utilisé");
                }
            }

            //si il n'y à pas d'erreure on récupère l'id de l'utilisateurs pour l'insséré dans la table reservations
            if (count($errors) < 1)
            {
                $sel = $dbco->prepare("SELECT * FROM utilisateurs WHERE login = ?");
                $sel->execute(array($this->login));

                foreach ($sel as $row) {
                    $id = $row["id"];
                }
                $this->setId($id);

                    $sql = $dbco->prepare("INSERT INTO reservations(titre, description, id_utilisateur, debut, fin) VALUES (?, ?, ?, ?, ?)");
                    $sql->execute(array($this->for_titre, $this->textarea, $this->id, $this->re, $this->re2));
                    redirect("planning.php");

            } else {
                return $errors;
            }
        }
    }
}

?>