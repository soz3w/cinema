<?php

namespace Cinema\BoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movies
 *
 * @ORM\Table(name="movies", indexes={@ORM\Index(name="categories_id", columns={"categories_id"})})
 * @ORM\Entity
 */
class Movies
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
     * @ORM\Column(name="type_film", type="string", length=250, nullable=true)
     */
    private $typeFilm;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text", nullable=true)
     */
    private $synopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=400, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="trailer", type="text", nullable=true)
     */
    private $trailer;

    /**
     * @var string
     *
     * @ORM\Column(name="languages", type="string", length=11, nullable=true)
     */
    private $languages;

    /**
     * @var string
     *
     * @ORM\Column(name="distributeur", type="string", length=250, nullable=true)
     */
    private $distributeur;

    /**
     * @var string
     *
     * @ORM\Column(name="bo", type="string", length=250, nullable=true)
     */
    private $bo;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee", type="integer", nullable=true)
     */
    private $annee;

    /**
     * @var float
     *
     * @ORM\Column(name="budget", type="float", precision=10, scale=0, nullable=true)
     */
    private $budget;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", nullable=true)
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_release", type="date", nullable=true)
     */
    private $dateRelease;

    /**
     * @var float
     *
     * @ORM\Column(name="note_presse", type="float", precision=10, scale=0, nullable=true)
     */
    private $notePresse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=true)
     */
    private $visible;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cover", type="boolean", nullable=true)
     */
    private $cover;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shop", type="boolean", nullable=true)
     */
    private $shop;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true)
     */
    private $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_updated", type="datetime", nullable=true)
     */
    private $dateUpdated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_deleted", type="datetime", nullable=true)
     */
    private $dateDeleted;

    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     */
    private $ref;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var float
     *
     * @ORM\Column(name="taxe", type="float", precision=10, scale=0, nullable=false)
     */
    private $taxe;

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_mode", type="integer", nullable=false)
     */
    private $shopMode;

    /**
     * @var integer
     *
     * @ORM\Column(name="shop_type_dvd", type="integer", nullable=false)
     */
    private $shopTypeDvd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shop_date", type="date", nullable=true)
     */
    private $shopDate;

    /**
     * @var \Categories
     *
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categories_id", referencedColumnName="id")
     * })
     */
    private $categories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Actors", mappedBy="movies")
     */
    private $actors;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Cinema", mappedBy="movies")
     */
    private $cinemas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Directors", mappedBy="movies")
     */
    private $directors;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Movies", inversedBy="movies")
     * @ORM\JoinTable(name="related_movies",
     *   joinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="movies_id_related", referencedColumnName="id")
     *   }
     * )
     */
    private $moviesRelated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Tags", inversedBy="movies")
     * @ORM\JoinTable(name="tags_movies",
     *   joinColumns={
     *     @ORM\JoinColumn(name="movies_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tags_id", referencedColumnName="id")
     *   }
     * )
     */
    private $tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="User", mappedBy="movies")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cinemas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->directors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->moviesRelated = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set typeFilm
     *
     * @param string $typeFilm
     * @return Movies
     */
    public function setTypeFilm($typeFilm)
    {
        $this->typeFilm = $typeFilm;

        return $this;
    }

    /**
     * Get typeFilm
     *
     * @return string 
     */
    public function getTypeFilm()
    {
        return $this->typeFilm;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Movies
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Movies
     */
    public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return string 
     */
    public function getSynopsis()
    {
        return $this->synopsis;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Movies
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Movies
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set trailer
     *
     * @param string $trailer
     * @return Movies
     */
    public function setTrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }

    /**
     * Get trailer
     *
     * @return string 
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * Set languages
     *
     * @param string $languages
     * @return Movies
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;

        return $this;
    }

    /**
     * Get languages
     *
     * @return string 
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * Set distributeur
     *
     * @param string $distributeur
     * @return Movies
     */
    public function setDistributeur($distributeur)
    {
        $this->distributeur = $distributeur;

        return $this;
    }

    /**
     * Get distributeur
     *
     * @return string 
     */
    public function getDistributeur()
    {
        return $this->distributeur;
    }

    /**
     * Set bo
     *
     * @param string $bo
     * @return Movies
     */
    public function setBo($bo)
    {
        $this->bo = $bo;

        return $this;
    }

    /**
     * Get bo
     *
     * @return string 
     */
    public function getBo()
    {
        return $this->bo;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     * @return Movies
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set budget
     *
     * @param float $budget
     * @return Movies
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget
     *
     * @return float 
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Movies
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set dateRelease
     *
     * @param \DateTime $dateRelease
     * @return Movies
     */
    public function setDateRelease($dateRelease)
    {
        $this->dateRelease = $dateRelease;

        return $this;
    }

    /**
     * Get dateRelease
     *
     * @return \DateTime 
     */
    public function getDateRelease()
    {
        return $this->dateRelease;
    }

    /**
     * Set notePresse
     *
     * @param float $notePresse
     * @return Movies
     */
    public function setNotePresse($notePresse)
    {
        $this->notePresse = $notePresse;

        return $this;
    }

    /**
     * Get notePresse
     *
     * @return float 
     */
    public function getNotePresse()
    {
        return $this->notePresse;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Movies
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set cover
     *
     * @param boolean $cover
     * @return Movies
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return boolean 
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set shop
     *
     * @param boolean $shop
     * @return Movies
     */
    public function setShop($shop)
    {
        $this->shop = $shop;

        return $this;
    }

    /**
     * Get shop
     *
     * @return boolean 
     */
    public function getShop()
    {
        return $this->shop;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Movies
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set views
     *
     * @param integer $views
     * @return Movies
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Movies
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Movies
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set dateDeleted
     *
     * @param \DateTime $dateDeleted
     * @return Movies
     */
    public function setDateDeleted($dateDeleted)
    {
        $this->dateDeleted = $dateDeleted;

        return $this;
    }

    /**
     * Get dateDeleted
     *
     * @return \DateTime 
     */
    public function getDateDeleted()
    {
        return $this->dateDeleted;
    }

    /**
     * Set ref
     *
     * @param integer $ref
     * @return Movies
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return integer 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Movies
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set taxe
     *
     * @param float $taxe
     * @return Movies
     */
    public function setTaxe($taxe)
    {
        $this->taxe = $taxe;

        return $this;
    }

    /**
     * Get taxe
     *
     * @return float 
     */
    public function getTaxe()
    {
        return $this->taxe;
    }

    /**
     * Set shopMode
     *
     * @param integer $shopMode
     * @return Movies
     */
    public function setShopMode($shopMode)
    {
        $this->shopMode = $shopMode;

        return $this;
    }

    /**
     * Get shopMode
     *
     * @return integer 
     */
    public function getShopMode()
    {
        return $this->shopMode;
    }

    /**
     * Set shopTypeDvd
     *
     * @param integer $shopTypeDvd
     * @return Movies
     */
    public function setShopTypeDvd($shopTypeDvd)
    {
        $this->shopTypeDvd = $shopTypeDvd;

        return $this;
    }

    /**
     * Get shopTypeDvd
     *
     * @return integer 
     */
    public function getShopTypeDvd()
    {
        return $this->shopTypeDvd;
    }

    /**
     * Set shopDate
     *
     * @param \DateTime $shopDate
     * @return Movies
     */
    public function setShopDate($shopDate)
    {
        $this->shopDate = $shopDate;

        return $this;
    }

    /**
     * Get shopDate
     *
     * @return \DateTime 
     */
    public function getShopDate()
    {
        return $this->shopDate;
    }

    /**
     * Set categories
     *
     * @param \Cinema\BoBundle\Entity\Categories $categories
     * @return Movies
     */
    public function setCategories(\Cinema\BoBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get categories
     *
     * @return \Cinema\BoBundle\Entity\Categories 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add actors
     *
     * @param \Cinema\BoBundle\Entity\Actors $actors
     * @return Movies
     */
    public function addActor(\Cinema\BoBundle\Entity\Actors $actors)
    {
        $this->actors[] = $actors;

        return $this;
    }

    /**
     * Remove actors
     *
     * @param \Cinema\BoBundle\Entity\Actors $actors
     */
    public function removeActor(\Cinema\BoBundle\Entity\Actors $actors)
    {
        $this->actors->removeElement($actors);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Add cinemas
     *
     * @param \Cinema\BoBundle\Entity\Cinema $cinemas
     * @return Movies
     */
    public function addCinema(\Cinema\BoBundle\Entity\Cinema $cinemas)
    {
        $this->cinemas[] = $cinemas;

        return $this;
    }

    /**
     * Remove cinemas
     *
     * @param \Cinema\BoBundle\Entity\Cinema $cinemas
     */
    public function removeCinema(\Cinema\BoBundle\Entity\Cinema $cinemas)
    {
        $this->cinemas->removeElement($cinemas);
    }

    /**
     * Get cinemas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCinemas()
    {
        return $this->cinemas;
    }

    /**
     * Add directors
     *
     * @param \Cinema\BoBundle\Entity\Directors $directors
     * @return Movies
     */
    public function addDirector(\Cinema\BoBundle\Entity\Directors $directors)
    {
        $this->directors[] = $directors;

        return $this;
    }

    /**
     * Remove directors
     *
     * @param \Cinema\BoBundle\Entity\Directors $directors
     */
    public function removeDirector(\Cinema\BoBundle\Entity\Directors $directors)
    {
        $this->directors->removeElement($directors);
    }

    /**
     * Get directors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * Add moviesRelated
     *
     * @param \Cinema\BoBundle\Entity\Movies $moviesRelated
     * @return Movies
     */
    public function addMoviesRelated(\Cinema\BoBundle\Entity\Movies $moviesRelated)
    {
        $this->moviesRelated[] = $moviesRelated;

        return $this;
    }

    /**
     * Remove moviesRelated
     *
     * @param \Cinema\BoBundle\Entity\Movies $moviesRelated
     */
    public function removeMoviesRelated(\Cinema\BoBundle\Entity\Movies $moviesRelated)
    {
        $this->moviesRelated->removeElement($moviesRelated);
    }

    /**
     * Get moviesRelated
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMoviesRelated()
    {
        return $this->moviesRelated;
    }

    /**
     * Add tags
     *
     * @param \Cinema\BoBundle\Entity\Tags $tags
     * @return Movies
     */
    public function addTag(\Cinema\BoBundle\Entity\Tags $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Cinema\BoBundle\Entity\Tags $tags
     */
    public function removeTag(\Cinema\BoBundle\Entity\Tags $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add user
     *
     * @param \Cinema\BoBundle\Entity\User $user
     * @return Movies
     */
    public function addUser(\Cinema\BoBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Cinema\BoBundle\Entity\User $user
     */
    public function removeUser(\Cinema\BoBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}
