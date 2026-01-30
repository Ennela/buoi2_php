<?php
class User
{
    private $name;
    private $email;
    private $password;
    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function login($inputEmail, $inputPassword)
    {
        if ($inputEmail === $this->email && $inputPassword === $this->password) {
            return "Đăng nhập thành công";
        } else {
            return "Sai thông tin";
        }
    }
}

$user = new User("Nguyen Van A", "nguyenvana@gmail.com", "123456");
echo "Tên: " . $user->getName() . "<br>";
echo "Email: " . $user->getEmail() . "<br>";
echo "<hr>";
echo "Test 1 - Đăng nhập đúng: ";
echo $user->login("nguyenvana@gmail.com", "123456") . "<br>";
echo "Test 2 - Sai email: ";
echo $user->login("wrong@gmail.com", "123456") . "<br>";
echo "Test 3 - Sai password: ";
echo $user->login("nguyenvana@gmail.com", "wrongpass") . "<br>";
