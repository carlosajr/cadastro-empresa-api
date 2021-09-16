<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Company;
use App\Entity\Partner;

class CompanyPartnerController extends AbstractController
{
    /**
     * @Route("/companys/{companyId}/partners", name="showPartners")
     */
    public function showPartners($companyId): Response
    {
        $company = $this->getDoctrine()->getRepository(Company::class)->find($companyId);
        $partners = $company->getPartners();

        return $this->json([
            'data' => $partners
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['companys']
        ]);
    }

    /**
     * @Route("/partners/{partnerd}/companys", name="showCompanys")
     */
    public function showCompanys($partnerd): Response
    {
        $partner = $this->getDoctrine()->getRepository(Partner::class)->find($partnerId);
        $companys = $partner->getCompanys();

        return $this->json([
            'data' => $companys
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['companys']
        ]);
    }

    /**
     * @Route("/companys/{companyId}/partners/{partnerId}", name="addPartnerToCompany", methods={"POST"})
     */
    public function addPartnerToCompany($companyId, $partnerId)
    {
        $company = $this->getDoctrine()->getRepository(Company::class)->find($companyId);
        $partner = $this->getDoctrine()->getRepository(Partner::class)->find($partnerId);

        $company->addPartner($partner);

        $manager = $this->getDoctrine()->getManager();
        $manager->flush();

        
        return $this->json([
            'data' => 'OK',
        ]);
    
    }

    /**
     * @Route("/companys/{companyId}/partners/{partnerId}", name="removePartnerToCompany", methods={"DEL", "DELETE"})
     */
    public function removePartnerToCompany($companyId, $partnerId)
    {
        $company = $this->getDoctrine()->getRepository(Company::class)->find($companyId);
        $partner = $this->getDoctrine()->getRepository(Partner::class)->find($partnerId);

        $company->removePartner($partner);

        $manager = $this->getDoctrine()->getManager();
        $manager->flush();

        
        return $this->json([
            'data' => 'OK',
        ]);
    }
}
