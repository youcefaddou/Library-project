<?php 

class User extends UserRepository {
    
    private $firstName;
    private $lastName;
    private $mail;
    private $password;

    public function __construct($firstName, $lastName, $mail, $password)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setMail($mail);
        $this->password = $password;
    }
    public function getFirstName() {return $this->firstName;}
    public function setFirstName($firstName) { $this->firstName = $firstName;}
    public function getLastName() {return $this->lastName;}
    public function setLastName($lastName) { $this->lastName = $lastName;}
    public function getMail() {return $this->mail;}
    public function setMail($mail) { $this->mail = $mail;}
    public function getPassword() { return $this->password;}
    
    
}

?>