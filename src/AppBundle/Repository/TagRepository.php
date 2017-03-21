<?php
/**
 * Tag repository.
 */
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Pager\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
/**
 * Class TagRepository.
 *
 * @package AppBundle\Repository
 */
class TagRepository extends EntityRepository
{
    public function findAllPaginated($page)
    {
        $adapter = new DoctrineORMAdapter(
            $this ->queryAll()
        );
        $pagerfanta = new Pagerfanta($adapter);
        $pagerfanta ->setMaxPerPage('1');
        $pagerfanta ->setCurrentPage($page);
        return $pagerfanta;

    }
    protected function queryAll(){
        return $this->_em->createQueryBuilder()
            ->select('t')
            ->from('AppBundle:Tag', 't' );
        $adapter = new DoctrineORMAdapter($queryBuilder);
    }
}