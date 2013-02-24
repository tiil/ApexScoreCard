<?php

namespace Apex\ApexScoreCardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apex\ApexScoreCardBundle\Entity\RoundRepository")
 */
class Round
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
     * @var \DateTime
     *
     * @ORM\Column(name="startTime", type="datetimetz")
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endTime", type="datetimetz", nullable=true)
     */
    private $endTime;
    
    
    /**
     * @var Apex\ApexScoreCardBundle\Entity\Course
     *
     * @ORM\ManyToOne(targetEntity="Apex\ApexScoreCardBundle\Entity\Course", inversedBy="rounds")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     * })
     */
    private $course;
    
    
    /**
     * @ORM\OneToMany(targetEntity="Apex\ApexScoreCardBundle\Entity\roundGolfer", mappedBy="rounds")
     */
    private $round;
    
    /**
     * @ORM\OneToMany(targetEntity="Apex\ApexScoreCardBundle\Entity\roundScore", mappedBy="rounds")
     */    
    private $round_s;
    
    
	/**
	 * Get course
	 * @return course
	 */
	public function getCourse()
	{
		return $this->course;
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
     * Set courseId
     *
     * @param integer $courseId
     * @return Round
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
    
        return $this;
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
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Round
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
    
        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return Round
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    
        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->round = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set course
     *
     * @param \Apex\ApexScoreCardBundle\Entity\Course $course
     * @return Round
     */
    public function setCourse(\Apex\ApexScoreCardBundle\Entity\Course $course = null)
    {
        $this->course = $course;
    
        return $this;
    }

    /**
     * Add round
     *
     * @param \Apex\ApexScoreCardBundle\Entity\roundGolfer $round
     * @return Round
     */
    public function addRound(\Apex\ApexScoreCardBundle\Entity\roundGolfer $round)
    {
        $this->round[] = $round;
    
        return $this;
    }

    /**
     * Remove round
     *
     * @param \Apex\ApexScoreCardBundle\Entity\roundGolfer $round
     */
    public function removeRound(\Apex\ApexScoreCardBundle\Entity\roundGolfer $round)
    {
        $this->round->removeElement($round);
    }

    /**
     * Get round
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRound()
    {
        return $this->round;
    }

    /**
     * Add round_s
     *
     * @param \Apex\ApexScoreCardBundle\Entity\roundScore $roundS
     * @return Round
     */
    public function addRoundS(\Apex\ApexScoreCardBundle\Entity\roundScore $roundS)
    {
        $this->round_s[] = $roundS;
    
        return $this;
    }

    /**
     * Remove round_s
     *
     * @param \Apex\ApexScoreCardBundle\Entity\roundScore $roundS
     */
    public function removeRoundS(\Apex\ApexScoreCardBundle\Entity\roundScore $roundS)
    {
        $this->round_s->removeElement($roundS);
    }

    /**
     * Get round_s
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRoundS()
    {
        return $this->round_s;
    }
    
    public function getJson()
    {
    	return array(
    		'id' => $this->id,
    		'course_id' => $this->courseId,
    		'start_time' => $this->startTime,
    		'end_time' => $this->endTime,
    	);
    }
    		
}