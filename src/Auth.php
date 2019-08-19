<?php 
namespace App;

use App\User;
use App\Helper\Security;
use PDO;

class Auth
{
    
    private $pdo;

    private $loginPath;

    public function __construct(PDO $pdo, string $loginPath) {

        $this->pdo = $pdo;
        $this->$loginPath = $loginPath;
    }

    /**
     * @return User|null
     */
    public function user(): ?User
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['Auth'] ?? NULL;
        if ($id === NULL) {
            return NULL;
        }   
        $query = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $query->execute(['id' => $id]);
        $user = $query->fetchObject(User::class);

        return $user ?: NULL;
    }

    /**
     * @param string $role
     * @return void
     */
    public function requireRole(string ...$roles): void
    {
        $user =$this->user();
        if ($user === NULL || !in_array($user->role, $roles)) {
            header("Location: { $this->loginPath }?forbid=1");
            exit();
        }
    }

    /**
     * @param string $username
     * @param string $password
     * @return User|null
     */
    public function login(string $username, string $password): ?User
    {
        $username = Security::formatInput($username);
        $password = Security::formatInput($password);

        $query = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $query->execute(['username' => $username]);
        $user = $query->fetchObject(User::class);
        if($user === FALSE){
            return NULL;
        }
        if(password_verify($password, $user->password)){
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['Auth'] = $user->id;
            return $user;
        }
        return NULL;
    }
}
