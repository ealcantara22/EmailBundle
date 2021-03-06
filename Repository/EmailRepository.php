<?php

namespace NTI\EmailBundle\Repository;

use NTI\EmailBundle\Entity\Email;

/**
 * EmailRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EmailRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Return the last-checked $limit emails
     * that are not sent to get an update.
     *
     * @param int $limit
     * @return array
     */
    public function findEmailsToCheck($limit = 10) {
        $qb = $this->createQueryBuilder('e');
        $qb->andWhere('e.status != :sent')->setParameter("sent", Email::STATUS_SENT);
        $qb->andWhere('e.status != :failed')->setParameter("failed", Email::STATUS_FAILURE);
        $qb->addOrderBy('e.lastCheck', 'asc');
        $qb->setMaxResults($limit);
        return $qb->getQuery()->getResult();
    }
}
