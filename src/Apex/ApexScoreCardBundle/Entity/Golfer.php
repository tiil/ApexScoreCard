<?php

namespace Apex\ApexScoreCardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use FOS\UserBundle\Entity\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use JsonSerializable;

/**
 * Golfer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apex\ApexScoreCardBundle\Entity\GolferRepository")
 */
class Golfer extends BaseUser implements UserInterface, \Serializable

{
		 
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    public function __construct()
    {
        parent::__construct();
    
    }
    
     /**
     * @ORM\Column(type="string", length=25, unique=true)
     */
//    protected $username;
        
    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="3", message="The name is too short.", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="255", message="The name is too long.", groups={"Registration", "Profile"})
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="tee", type="string", length=255)
     */
    private $tee = "red";

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;


	/**
	 * @var float
	 *
	 * @ORM\Column(name="handicap", type="float")
	 */
	private $handicap = 36;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=200, nullable=true)
     */
//    protected $password;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=40, nullable=true)
     */
//    protected $salt;

    /**
     * @ORM\Column(type="string", length=60, unique=true)
     */
//    protected $email;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Golfer
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set tee
     *
     * @param string $tee
     * @return Golfer
     */
    public function setTee($tee)
    {
        $this->tee = $tee;
    
        return $this;
    }

    /**
     * Get tee
     *
     * @return string 
     */
    public function getTee()
    {
        return $this->tee;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return Golfer
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }
    
    /**
     * Set handicap
     *
     * @param float $handicap
     * @return Golfer
     */
    public function setHandicap($handicap)
    {
        $this->handicap = $handicap;
    
        return $this;
    }
    
    /**
     * Set username
     *
     * @param string $username
	 */

	public function setUsername($username)
	{
		$this->username = $username;
		
		return $this;
	}

   /**
     * Set email
     *
     * @param string $email
	 */

	public function setEmail($email)
	{
		$this->email = $email;
		
		return $this;
	}



    /**
     * Get handicap
     *
     * @return float 
     */
    public function getHandicap()
    {
        return $this->handicap;
    }
    
/*    public function __construct()
    {
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
    } */

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->username;
    }

   /**
     * @inheritDoc
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }
    
 public function getJson()
	{
		return array(
			'name' => $this->name,
			'tee' => $this->tee,
			'gender' => $this->gender,
			'handicap' => $this->handicap,
			'id' => $this->id,
			'username' => $this->username,
		);
	}
    
 
 /**
     * @see \Serializable::serialize()
     */

   public function serialize()
    {
        return serialize(array(
            $this->id,

        ));
    } 
 
    /**
     * @see \Serializable::unserialize()
     */
   public function unserialize($serialized)
    {
        list (
            $this->id,

        ) = unserialize($serialized);
    } 
    
}