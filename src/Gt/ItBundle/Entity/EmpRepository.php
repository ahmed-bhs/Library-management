<?php

namespace Gt\ItBundle\Entity;

/**
 * EmpRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EmpRepository extends \Doctrine\ORM\EntityRepository
{public function findbyAk(){ $date=new \DateTime();
	 $qb = $this->createQueryBuilder('d')
           

        ->Where('d.status = 0');
        return $qb;}
}