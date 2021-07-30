<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Symfony\Component\Uid\Uuid;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client implements UserInterface
{
    /**
     * @ORM\Column(type="string")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", unique=true, length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $resetPasswordToken;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function __construct(string $firstName, string $lastName, string $email)
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = null;
        $this->setEmail($email);
        $this->password = null;
        $this->token = \sha1(\uniqid());
        $this->resetPasswordToken = null;
        $this->active = false;
        $this->createdAt = new DateTime();
        $this->markAsUpdated();
    }

    public function getUserIdentifier(): void
    {
    }

    public function getRoles(): array
    {
        return [];
    }

    public function getSalt(): void
    {
    }

    public function eraseCredentials(): void
    {
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     *
     * @return  self
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \LogicException('Invalid Email');
        }

        $this->email = $email;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of token
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get the value of resetPasswordToken
     */
    public function getResetPasswordToken()
    {
        return $this->resetPasswordToken;
    }

    /**
     * Set the value of resetPasswordToken
     *
     * @return  self
     */
    public function setResetPasswordToken($resetPasswordToken)
    {
        $this->resetPasswordToken = $resetPasswordToken;

        return $this;
    }

    /**
     * Get the value of active
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */
    public function markAsUpdated()
    {
        $this->updatedAt = new DateTime();
    }
}
