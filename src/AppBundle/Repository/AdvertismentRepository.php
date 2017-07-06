<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AdvertismentsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AdvertismentRepository extends EntityRepository
{
    public function search(string $phrase)
    {
        $em = $this->getEntityManager();

        /**
         * @todo Searching by LIKE isnt Efficiency, it should be changed if database will grow up
         */
        $query = $em->createQuery('
              SELECT a
              FROM AppBundle:Advertisment a
              WHERE a.title
              LIKE :phrase OR a.text LIKE :phrase
              ORDER BY a.creationDate DESC')->setParameter('phrase', '%' . $phrase . '%');

        return $query->getResult();
    }
}
