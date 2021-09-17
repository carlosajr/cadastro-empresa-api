<?php

namespace App\Builders;

use App\Entity\Company;
use App\ValueObjects\CompanyValueObject;

class CompanyBuilder
{
    /**
     * @param CompanyValueObject $companyVo
     * @return Company
     * @throws \Exception
     */
    public function build(CompanyValueObject $companyVo): Company
    {
        $company = New Company();

        $company->setName($companyVo->getName());
        $company->setFantasy($companyVo->getFantasy());
        $company->setCnpj($companyVo->getCnpj());
        $company->setPort($companyVo->getPort());
        $company->setNature($companyVo->getNature());
        $company->setPhone($companyVo->getPhone());
        $company->setMail($companyVo->getMail());
        $company->setCep($companyVo->getCep());
        $company->setState($companyVo->getState());
        $company->setCity($companyVo->getCity());
        $company->setDistrict($companyVo->getDistrict());
        $company->setStreet($companyVo->getStreet());
        $company->setNumber($companyVo->getNumber());
        $company->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        $company->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        return $company;
    }

    /**
     * @param Company $company
     * @param CompanyValueObject $companyVo
     * @return Company
     */
    public function assemble(Company $company, CompanyValueObject $companyVo): Company
    {
        $company->setName($companyVo->getName());
        $company->setFantasy($companyVo->getFantasy());
        $company->setCnpj($companyVo->getCnpj());
        $company->setPort($companyVo->getPort());
        $company->setNature($companyVo->getNature());
        $company->setPhone($companyVo->getPhone());
        $company->setMail($companyVo->getMail());
        $company->setCep($companyVo->getCep());
        $company->setState($companyVo->getState());
        $company->setCity($companyVo->getCity());
        $company->setDistrict($companyVo->getDistrict());
        $company->setStreet($companyVo->getStreet());
        $company->setNumber($companyVo->getNumber());
        $company->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        return $company;
    }

}
