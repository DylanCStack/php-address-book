<?php
    class Contact
    {
        private $name;
        private $email;
        private $phone;
        private $address1;
        private $address2;

        function __construct($name, $email, $phone, $address1, $address2)
        {
            $this->name = $name;
            $this->email = $email;
            $this->phone = $phone;
            $this->address1 = $address1;
            $this->address2 = $address2;
        }

        function getName()
        {
            return $this->name;
        }
        function setName($new_name)
        {
            $this->name = $new_name;
        }

        function getEmail()
        {
            return $this->email;
        }
        function setEmail($new_email)
        {
            $this->email = $new_email;
        }

        function getPhone()
        {
            return $this->phone;
        }
        function setPhone($new_phone)
        {
            $this->phone = $new_phone;
        }

        function getAddress1()
        {
            return $this->address1;
        }
        function setAddress1($new_address1)
        {
            $this->address1 = $new_address1;
        }

        function getAddress2()
        {
            return $this->address2;
        }
        function setAddress2($new_address2)
        {
            $this->address2 = $new_address2;
        }

        function save()
        {
            array_push($_SESSION['list_of_contacts'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_contacts'];
        }

        static function deleteLast()
        {
          unset($_SESSION['list_of_contacts'][ count($_SESSION['list_of_contacts'])-1]);
        }
        static function deleteAll()
        {
            $_SESSION['list_of_contacts'] = array();
        }
    }
?>
