<?php

require_once('../library/Database.php');
require_once('../library/Utils.php');
$dbco = connectPdo();
$errors = array();

class Utilisateurs
{
    private $inscription;
    private $login;
    private $password;
    private $r_password;
    private $id;
    private $connexion;
    private $modifier;
    private $n_password;
    private $n_login;


    public function getInscription()
    {
        return $this->inscription;
    }

    public function setInscription($inscription)
    {
        $this->inscription = $inscription;
    }

    public function getConnexion()
    {
        return $this->connexion;
    }

    public function setConnexion($connexion)
    {
        $this->connexion = $connexion;
    }

    public function getModifier()
    {
        return $this->modifier;
    }

    public function setModifier($modifier)
    {
        $this->modifier = $modifier;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getR_password()
    {
        return $this->r_password;
    }

    public function setR_password($r_password)
    {
        $this->r_password = $r_password;
    }

    public function getN_password()
    {
        return $this->n_password;
    }

    public function setN_password($n_password)
    {
        $this->n_password = $n_password;
    }

    public function getN_login()
    {
        return $this->n_login;
    }

    public function setN_login($n_login)
    {
        $this->n_login = $n_login;
    }


    //   INSCRIPTION
    public function register($login, $password, $r_password, $inscription)
    {

        $this->setLogin($login);
        $this->setPassword($password);
        $this->setR_password($r_password);
        $this->setInscription($inscription);
        require_once('../library/Database.php');
        require_once('../library/Utils.php');
        $dbco = connectPdo();
        $errors = array();


        $hpass = password_hash($this->password, PASSWORD_DEFAULT);

        if ($this->login && $this->password && $this->r_password) {
            if (strlen($this->login) > 12) {
                array_push($errors, "Le pseudo est trop long");
            }
            if (strlen($this->login) < 4) {
                array_push($errors, "Le pseudo est trop court");
            }
            if ($this->password !== $this->r_password) {
                array_push($errors, "Le mot de passe répété n'est pas le même");
            }
            if ($this->login == $this->password) {
                array_push($errors, "Le pseudo et le mot de passe ne doivent pas être identique");
            }
            $password_required = preg_match('%^(?=[^A-Z]*+.)(?=[^a-z]*+.)(?=[^0-9]*+.)(?=[^\W]*+.)%', $this->password);
/*           var_dump($password_required);*/
            if (!$password_required) {
                array_push($errors, 'Il faut au moins: 1 caractère spéciale, majuscule, nombre. ');
            }
        } else array_push($errors, "Veuillez remplir tous les champs");


        $sel = $dbco->prepare("SELECT * FROM utilisateurs");
        $sel->execute();


        foreach ($sel as $row) {
            if ($row["login"] == $this->login) {
                array_push($errors, "Le pseudo est déja utilisé");
            }
        }
        if (count($errors) < 1) {
            $sql = $dbco->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
            $sql->execute(array($this->login, $hpass));
            redirect("connexion.php");
        } else {
            return $errors;
        }

    }


    //connexion

    public function connexion($login, $password, $connexion)
    {
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setConnexion($connexion);
        require_once('../library/Database.php');
        require_once('../library/Utils.php');
        $dbco = connectPdo();
        $errors = array();


        if ($this->login && $this->password) {

            $sel = $dbco->prepare("select * from utilisateurs where login=? limit 1");
            $sel->execute(array($this->login));
            $tab = $sel->fetch();
            $hpass = $tab["password"];

            if (!password_verify($this->password, $hpass)) {
                array_push($errors, 'Mot de passe invalide');

            }
            if (count($errors) < 1) {

                $_SESSION["id"] = $tab["id"];
                $_SESSION["login"] = ucfirst(strtolower($tab["login"]));
                redirect("index.php");
            } else {
                return $errors;
            }

        }

    }


    //profil

    public function profil($n_login,$n_password,$modifier){

        $this->setN_login($n_login);
        $this->setN_password($n_password);
        $this->setModifier($modifier);
        require_once('../library/Database.php');
        require_once('../library/Utils.php');
        $dbco = connectPdo();
        $errors = array();

        $hpass = password_hash($this->n_password, PASSWORD_DEFAULT);


        if ($this->n_login && $this->n_password) {
            if (strlen($this->n_login) > 12) {
                array_push($errors, "Le pseudo est trop long");
            }
            if (strlen($this->n_login) < 4) {
                array_push($errors, "Le pseudo est trop court");
            }
            if ($this->n_login == $this->n_password) {
                array_push($errors, "Le pseudo et le mot de passe ne doivent pas être identique");
            }
            if (strLen($this->n_password) < 5) {
                array_push($errors, "Le mot de passe dois faire au moins 5 caractères");
            }
        }else array_push($errors, "Veuillez remplir tous les champs");

        $sel = $dbco->prepare("SELECT * FROM utilisateurs");
        $sel->execute();


        foreach ($sel as $row) {
            if ($row["login"] == $this->n_login) {
                array_push($errors, "Le pseudo est déja utilisé");
            }
        }
        if (count($errors) < 1) {

            $update = $dbco->prepare('UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?');
            $update->execute(array($this->n_login, $hpass, $_SESSION["id"] ));
            session_unset();
            redirect("connexion.php");
        }
        else{
            return  $errors ;
        }

    }
}
?>
