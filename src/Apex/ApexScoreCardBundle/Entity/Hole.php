<?php

namespace Apex\ApexScoreCardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hole
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apex\ApexScoreCardBundle\Entity\HoleRepository")
 */
class Hole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="course_id", type="integer")
     */
    private $courseId;

    /**
     * @var integer
     *
     * @ORM\Column(name="holeNumber", type="integer")
     */
    private $holeNumber;

    /**
     * @var integer
     *
     * @ORM\Column(name="par", type="integer")
     */
    private $par;

    /**
     * @var integer
     *
     * @ORM\Column(name="hcp", type="integer")
     */
    private $hcp;

    /**
     * @var integer
     *
     * @ORM\Column(name="lengthRed", type="integer")
     */
    private $lengthRed;

    /**
     * @var integer
     *
     * @ORM\Column(name="lengthYellow", type="integer")
     */
    private $lengthYellow;

    /**
     * @var integer
     *
     * @ORM\Column(name="lengthBlue", type="integer")
     */
    private $lengthBlue;

    /**
     * @var integer
     *
     * @ORM\Column(name="lengthWhite", type="integer")
     */
    private $lengthWhite;

    /**
     * @var Apex\ApexScoreCardBundle\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Apex\ApexScoreCardBundle\Entity\Course", inversedBy="holes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;

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
     * Set courseId
     *
     * @param integer $courseId
     * @return Hole
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
    
        return $this;
    }

    /**
     * Set course
     *
     * @param \Apex\ApexScoreCardBundle\Entity\Course $course
     * @return Holes
     */
    public function setCourse(\Apex\ApexScoreCardBundle\Entity\Course $course = null)
    {
        $this->course = $course;
    
        return $this;
    }


    /**
     * Get course
     *
     * @return \Apex\ApexScoreCardBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }




    /**
     * Get courseId
     *
     * @return integer 
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * Set holeNumber
     *
     * @param integer $holeNumber
     * @return Hole
     */
    public function setHoleNumber($holeNumber)
    {
        $this->holeNumber = $holeNumber;
    
        return $this;
    }

    /**
     * Get holeNumber
     *
     * @return integer 
     */
    public function getHoleNumber()
    {
        return $this->holeNumber;
    }

    /**
     * Set par
     *
     * @param integer $par
     * @return Hole
     */
    public function setPar($par)
    {
        $this->par = $par;
    
        return $this;
    }

    /**
     * Get par
     *
     * @return integer 
     */
    public function getPar()
    {
        return $this->par;
    }

    /**
     * Set hcp
     *
     * @param integer $hcp
     * @return Hole
     */
    public function setHcp($hcp)
    {
        $this->hcp = $hcp;
    
        return $this;
    }

    /**
     * Get hcp
     *
     * @return integer 
     */
    public function getHcp()
    {
        return $this->hcp;
    }

    /**
     * Set lengthRed
     *
     * @param integer $lengthRed
     * @return Hole
     */
    public function setLengthRed($lengthRed)
    {
        $this->lengthRed = $lengthRed;
    
        return $this;
    }

    /**
     * Get lengthRed
     *
     * @return integer 
     */
    public function getLengthRed()
    {
        return $this->lengthRed;
    }

    /**
     * Set lengthYellow
     *
     * @param integer $lengthYellow
     * @return Hole
     */
    public function setLengthYellow($lengthYellow)
    {
        $this->lengthYellow = $lengthYellow;
    
        return $this;
    }

    /**
     * Get lengthYellow
     *
     * @return integer 
     */
    public function getLengthYellow()
    {
        return $this->lengthYellow;
    }

    /**
     * Set lengthBlue
     *
     * @param integer $lengthBlue
     * @return Hole
     */
    public function setLengthBlue($lengthBlue)
    {
        $this->lengthBlue = $lengthBlue;
    
        return $this;
    }

    /**
     * Get lengthBlue
     *
     * @return integer 
     */
    public function getLengthBlue()
    {
        return $this->lengthBlue;
    }

    /**
     * Set lengthWhite
     *
     * @param integer $lengthWhite
     * @return Hole
     */
    public function setLengthWhite($lengthWhite)
    {
        $this->lengthWhite = $lengthWhite;
    
        return $this;
    }

    /**
     * Get lengthWhite
     *
     * @return integer 
     */
    public function getLengthWhite()
    {
        return $this->lengthWhite;
    }
    
    public function getJson()
    {
		return array(
			'course_id'   	=> $this->courseId,
			'hole_number' 	=> $this->holeNumber,
			'par' 			=> $this->par,
			'hcp' 			=> $this->hcp,
			'length_red' 	=> $this->lengthRed,
			'length_blue' 	=> $this->lengthBlue,
			'length_yellow' => $this->lengthYellow,
			'length_white' 	=> $this->lengthWhite,
		);
    }

}