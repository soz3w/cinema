<?php

namespace Cinema\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_8D93D64992FC23A8", columns={"username_canonical"}), @ORM\UniqueConstraint(name="UNIQ_8D93D649A0D96FBF", columns={"email_canonical"})})
 * @ORM\Entity
 */
class User implements AdvancedUserInterface, \Serializable
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;


    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=200, nullable=true)
     */
    private $ville;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer", nullable=true)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=250, nullable=true)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=100, nullable=true)
     */
    private $ip;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="expired", type="boolean", nullable=true)
     */
    private $expired;

    /**
     * @var boolean
     *
     * @ORM\Column(name="locked", type="boolean", nullable=true)
     */
    private $locked;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=255, nullable=true)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email_canonical", type="string", length=255, nullable=true)
     */
    private $emailCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=true)
     */
    private $salt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires_at", type="datetime", nullable=true)
     */
    private $expiresAt;

    /**
     * @var string
     *
     * @ORM\Column(name="confirmation_token", type="string", length=255, nullable=true)
     */
    private $confirmationToken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="googleId", type="string", length=255, nullable=true)
     */
    private $googleid;

    /**
     * @var string
     *
     * @ORM\Column(name="googleAccessToken", type="string", length=255, nullable=true)
     */
    private $googleaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="flickrId", type="string", length=255, nullable=true)
     */
    private $flickrid;

    /**
     * @var string
     *
     * @ORM\Column(name="flickrAccessToken", type="string", length=255, nullable=true)
     */
    private $flickraccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="githubId", type="string", length=255, nullable=true)
     */
    private $githubid;

    /**
     * @var string
     *
     * @ORM\Column(name="githubAccessToken", type="string", length=255, nullable=true)
     */
    private $githubaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinAccessToken", type="string", length=255, nullable=true)
     */
    private $linkedinaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="linkedinId", type="string", length=255, nullable=true)
     */
    private $linkedinid;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", nullable=true)
     */
    private $roles;

    /**
     * @var string
     *
     * @ORM\Column(name="extras", type="text", nullable=true)
     */
    private $extras;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $longitude;

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=true)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookId", type="string", length=300, nullable=true)
     */
    private $facebookid;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookAccessToken", type="string", length=300, nullable=true)
     */
    private $facebookaccesstoken;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterId", type="string", length=255, nullable=true)
     */
    private $twitterid;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterAccessToken", type="string", length=255, nullable=true)
     */
    private $twitteraccesstoken;

    /**
     * @var boolean
     *
     * @ORM\Column(name="credentials_expired", type="boolean", nullable=true)
     */
    private $credentialsExpired;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="credentials_expire_at", type="datetime", nullable=true)
     */
    private $credentialsExpireAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastActivity", type="datetime", nullable=true)
     */
    private $lastactivity;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Movies", inversedBy="user")
     * @ORM\JoinTable(name="user_favoris",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   }
     * )
     */
    private $movies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->salt = md5(uniqid(null, true));
    }


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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

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

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return User
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set zipcode
     *
     * @param integer $zipcode
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return integer 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return User
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return User
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set expired
     *
     * @param boolean $expired
     * @return User
     */
    public function setExpired($expired)
    {
        $this->expired = $expired;

        return $this;
    }

    /**
     * Get expired
     *
     * @return boolean 
     */
    public function getExpired()
    {
        return $this->expired;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     * @return User
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;

        return $this;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     * @return User
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string 
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set emailCanonical
     *
     * @param string $emailCanonical
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string 
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     * @return User
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime 
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Set confirmationToken
     *
     * @param string $confirmationToken
     * @return User
     */
    public function setConfirmationToken($confirmationToken)
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    /**
     * Get confirmationToken
     *
     * @return string 
     */
    public function getConfirmationToken()
    {
        return $this->confirmationToken;
    }

    /**
     * Set passwordRequestedAt
     *
     * @param \DateTime $passwordRequestedAt
     * @return User
     */
    public function setPasswordRequestedAt($passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    /**
     * Get passwordRequestedAt
     *
     * @return \DateTime 
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }

    /**
     * Set googleid
     *
     * @param string $googleid
     * @return User
     */
    public function setGoogleid($googleid)
    {
        $this->googleid = $googleid;

        return $this;
    }

    /**
     * Get googleid
     *
     * @return string 
     */
    public function getGoogleid()
    {
        return $this->googleid;
    }

    /**
     * Set googleaccesstoken
     *
     * @param string $googleaccesstoken
     * @return User
     */
    public function setGoogleaccesstoken($googleaccesstoken)
    {
        $this->googleaccesstoken = $googleaccesstoken;

        return $this;
    }

    /**
     * Get googleaccesstoken
     *
     * @return string 
     */
    public function getGoogleaccesstoken()
    {
        return $this->googleaccesstoken;
    }

    /**
     * Set flickrid
     *
     * @param string $flickrid
     * @return User
     */
    public function setFlickrid($flickrid)
    {
        $this->flickrid = $flickrid;

        return $this;
    }

    /**
     * Get flickrid
     *
     * @return string 
     */
    public function getFlickrid()
    {
        return $this->flickrid;
    }

    /**
     * Set flickraccesstoken
     *
     * @param string $flickraccesstoken
     * @return User
     */
    public function setFlickraccesstoken($flickraccesstoken)
    {
        $this->flickraccesstoken = $flickraccesstoken;

        return $this;
    }

    /**
     * Get flickraccesstoken
     *
     * @return string 
     */
    public function getFlickraccesstoken()
    {
        return $this->flickraccesstoken;
    }

    /**
     * Set githubid
     *
     * @param string $githubid
     * @return User
     */
    public function setGithubid($githubid)
    {
        $this->githubid = $githubid;

        return $this;
    }

    /**
     * Get githubid
     *
     * @return string 
     */
    public function getGithubid()
    {
        return $this->githubid;
    }

    /**
     * Set githubaccesstoken
     *
     * @param string $githubaccesstoken
     * @return User
     */
    public function setGithubaccesstoken($githubaccesstoken)
    {
        $this->githubaccesstoken = $githubaccesstoken;

        return $this;
    }

    /**
     * Get githubaccesstoken
     *
     * @return string 
     */
    public function getGithubaccesstoken()
    {
        return $this->githubaccesstoken;
    }

    /**
     * Set linkedinaccesstoken
     *
     * @param string $linkedinaccesstoken
     * @return User
     */
    public function setLinkedinaccesstoken($linkedinaccesstoken)
    {
        $this->linkedinaccesstoken = $linkedinaccesstoken;

        return $this;
    }

    /**
     * Get linkedinaccesstoken
     *
     * @return string 
     */
    public function getLinkedinaccesstoken()
    {
        return $this->linkedinaccesstoken;
    }

    /**
     * Set linkedinid
     *
     * @param string $linkedinid
     * @return User
     */
    public function setLinkedinid($linkedinid)
    {
        $this->linkedinid = $linkedinid;

        return $this;
    }

    /**
     * Get linkedinid
     *
     * @return string 
     */
    public function getLinkedinid()
    {
        return $this->linkedinid;
    }

    /**
     * Set roles
     *
     * @param array $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array 
     */
    public function getRoles()
    {
       // return $this->roles;
        return array('ROLE_USER');
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
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

    public function isEqualTo(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }

    /**
     * Set extras
     *
     * @param string $extras
     * @return User
     */
    public function setExtras($extras)
    {
        $this->extras = $extras;

        return $this;
    }

    /**
     * Get extras
     *
     * @return string 
     */
    public function getExtras()
    {
        return $this->extras;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return User
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return User
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set facebookid
     *
     * @param string $facebookid
     * @return User
     */
    public function setFacebookid($facebookid)
    {
        $this->facebookid = $facebookid;

        return $this;
    }

    /**
     * Get facebookid
     *
     * @return string 
     */
    public function getFacebookid()
    {
        return $this->facebookid;
    }

    /**
     * Set facebookaccesstoken
     *
     * @param string $facebookaccesstoken
     * @return User
     */
    public function setFacebookaccesstoken($facebookaccesstoken)
    {
        $this->facebookaccesstoken = $facebookaccesstoken;

        return $this;
    }

    /**
     * Get facebookaccesstoken
     *
     * @return string 
     */
    public function getFacebookaccesstoken()
    {
        return $this->facebookaccesstoken;
    }

    /**
     * Set twitterid
     *
     * @param string $twitterid
     * @return User
     */
    public function setTwitterid($twitterid)
    {
        $this->twitterid = $twitterid;

        return $this;
    }

    /**
     * Get twitterid
     *
     * @return string 
     */
    public function getTwitterid()
    {
        return $this->twitterid;
    }

    /**
     * Set twitteraccesstoken
     *
     * @param string $twitteraccesstoken
     * @return User
     */
    public function setTwitteraccesstoken($twitteraccesstoken)
    {
        $this->twitteraccesstoken = $twitteraccesstoken;

        return $this;
    }

    /**
     * Get twitteraccesstoken
     *
     * @return string 
     */
    public function getTwitteraccesstoken()
    {
        return $this->twitteraccesstoken;
    }

    /**
     * Set credentialsExpired
     *
     * @param boolean $credentialsExpired
     * @return User
     */
    public function setCredentialsExpired($credentialsExpired)
    {
        $this->credentialsExpired = $credentialsExpired;

        return $this;
    }

    /**
     * Get credentialsExpired
     *
     * @return boolean 
     */
    public function getCredentialsExpired()
    {
        return $this->credentialsExpired;
    }

    /**
     * Set credentialsExpireAt
     *
     * @param \DateTime $credentialsExpireAt
     * @return User
     */
    public function setCredentialsExpireAt($credentialsExpireAt)
    {
        $this->credentialsExpireAt = $credentialsExpireAt;

        return $this;
    }

    /**
     * Get credentialsExpireAt
     *
     * @return \DateTime 
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return User
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set lastactivity
     *
     * @param \DateTime $lastactivity
     * @return User
     */
    public function setLastactivity($lastactivity)
    {
        $this->lastactivity = $lastactivity;

        return $this;
    }

    /**
     * Get lastactivity
     *
     * @return \DateTime 
     */
    public function getLastactivity()
    {
        return $this->lastactivity;
    }

    /**
     * Add movies
     *
     * @param \Cinema\BoBundle\Entity\Movies $movies
     * @return User
     */
    public function addMovie(\Cinema\BoBundle\Entity\Movies $movies)
    {
        $this->movies[] = $movies;

        return $this;
    }

    /**
     * Remove movies
     *
     * @param \Cinema\BoBundle\Entity\Movies $movies
     */
    public function removeMovie(\Cinema\BoBundle\Entity\Movies $movies)
    {
        $this->movies->removeElement($movies);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovies()
    {
        return $this->movies;
    }
}
