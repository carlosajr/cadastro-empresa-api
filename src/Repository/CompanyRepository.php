<?php

namespace App\Repository;

use App\Entity\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Class CompanyRepository
 * @package App\Repository
 */
class CompanyRepository extends ServiceEntityRepository
{
    /**
     * CompanyRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    /**
     * @return array
     */
    public function findAllCompanys(): array
    {
        return $this->findAll();
    }

    /**
     * @param int $company
     * @return Company
     */
    public function findByCompany(int $company): Company
    {
        return $this->find($company);
    }

    /**
     * @param Company $company
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Company $company): void
    {
        $this->getEntityManager()->persist($company);
        $this->getEntityManager()->flush();
    }

    /**
     * @param Company $company
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function remove(Company $company): void
    {
        $this->getEntityManager()->remove($company);
        $this->getEntityManager()->flush();
    }
}
