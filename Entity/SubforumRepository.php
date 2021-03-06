<?php

namespace Yosimitso\WorkingForumBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SubforumRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SubforumRepository extends EntityRepository
{
      public function getListThread($subforumId,$start = 0, $limit = 1)
    {
        $queryBuilder = $this->_em->createQueryBuilder()
                ->select('a')
                 ->from('YosimitsoWorkingForumBundle:Thread','a')
                ->where('a.subforumId = :subforumId')
                ->setParameter('subforumId', $subforumId)
                ->orderBy('a.lastReplyDate','desc')
                ->setFirstResult($start)
                ->setMaxResults($limit)
                ->getQuery();
       
        $query = $queryBuilder->getResult();
       // var_dump($query);
       // exit();
        return $query;
    }
}
