<?php

namespace Apex\ApexScoreCardBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * roundGolfer
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Apex\ApexScoreCardBundle\Entity\roundGolferRepository")
 */
class roundGolfer
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
     * @ORM\Column(name="round_id", type="integer")
     */
    private $roundId;

    /**
     * @var integer
     *
     * @ORM\Column(name="golfer_id", type="integer")
     */
    private $golferId;
    
    
    /**
     * @var Apex\ApexScoreCardBundle\Entity\Round
     *
     * @ORM\ManyToOne(targetEntity="Apex\ApexScoreCardBundle\Entity\Round", inversedBy="round")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     * })
     */
    private $rounds;
    

    /**
     * @var Apex\ApexScoreCardBundle\Entity\Golfer
     *
     * @ORM\ManyToOne(targetEntity="Apex\ApexScoreCardBundle\Entity\Golfer", inversedBy="round")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="golfer_id", referencedColumnName="id")
     * })
     */
    private $golfers;

        

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
     * Set roundId
     *
     * @param integer $roundId
     * @return roundGolfer
     */
    public function setRoundId($roundId)
    {
        $this->roundId = $roundId;
    
        return $this;
    }

    /**
     * Get roundId
     *
     * @return integer 
     */
    public function getRoundId()
    {
        return $this->roundId;
    }


	public function getRounds()
	{
		return $this->rounds;
	}

	public function getGolfers()
	{
		return $this->golfers;
	}
		

    /**
     * Set golferId
     *
     * @param integer $golferId
     * @return roundGolfer
     */
    public function setGolferId($golferId)
    {
        $this->golferId = $golferId;
    
        return $this;
    }

    /**
     * Get golferId
     *
     * @return integer 
     */
    public function getGolferId()
    {
        return $this->golferId;
    }

    /**
     * Set rounds
     *
     * @param \Apex\ApexScoreCardBundle\Entity\Round $rounds
     * @return roundGolfer
     */
    public function setRounds(\Apex\ApexScoreCardBundle\Entity\Round $rounds = null)
    {
        $this->rounds = $rounds;
    
        return $this;
    }

    /**
     * Set golfers
     *
     * @param \Apex\ApexScoreCardBundle\Entity\Golfer $golfers
     * @return roundGolfer
     */
    public function setGolfers(\Apex\ApexScoreCardBundle\Entity\Golfer $golfers = null)
    {
        $this->golfers = $golfers;
    
        return $this;
    }
    
    public function getJson()
    {
   	   	return array(
    		'id' => $this->id,
    		'round_id' => $this->roundId,
    		'golfer_id' => $this->golferId,
    	);
    }
}