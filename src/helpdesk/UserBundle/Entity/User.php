<?php
namespace helpdesk\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Form\FormBuilderInterface;
/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */

class User 
{
    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\Id
     */
    protected $username;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $password;
 

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
}
