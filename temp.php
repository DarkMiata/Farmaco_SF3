<?php 

    /**
     * @ORM\JoinColumn(name="b_id")
     * @ORM\ManyToOne(targetEntity="B")
     */
    private $b;
    
// ================================= 
    
    /**
     * @ORM\OneToMany(targetEntity="a", mappedBy="b")
     */
    private $a;