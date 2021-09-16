<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Company;

/**
 * @Route("/companys", name="company_")
 */
class CompanyController extends AbstractController
{
   
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {
        $companys = $this->getDoctrine()->getRepository(Company::class)->findAll();

        return $this->json([
            'data' => $companys
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['partners']
        ]);
    }

    /**
     * @Route("/{companyId}", name="show", methods={"GET"})
     */
    public function show($companyId)
    {
        $company = $this->getDoctrine()->getRepository(Company::class)->find($companyId);

        return $this->json([
            'data' => $company
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['partners']
        ]);
    }

    /**
     * @Route("/", name="create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $data = $request->toArray();

        $company = New Company();
        $company->setName($data['name']);
        $company->setFantasy($data['fantasy']);
        $company->setCnpj($data['cnpj']);
        $company->setPort($data['port']);
        $company->setNature($data['nature']);
        $company->setPhone($data['phone']);
        $company->setMail($data['mail']);
        $company->setCep($data['cep']);
        $company->setState($data['state']);
        $company->setCity($data['city']);
        $company->setDistrict($data['district']);
        $company->setStreet($data['street']);
        $company->setNumber($data['number']);
        $company->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        $company->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $manager = $this->getDoctrine()->getManager();

        $manager->persist($company);
        $manager->flush();

        return $this->json([
            'company' => $company
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['partners', 'createdAt', 'updatedAt']
        ]);
    }

    /**
     * @Route("/{companyId}", name="update", methods={"PUT", "PATCH"})
     */

    public function update($companyId, Request $request)
    {
        
        $data = $request->toArray();

        $doctrine =$this->getDoctrine(); 

        $company = $doctrine->getRepository(Company::class)->find($companyId);

        $company->setName($data['name']);
        $company->setFantasy($data['fantasy']);    
        $company->setCnpj($data['cnpj']);
        $company->setPort($data['port']);        
        $company->setNature($data['nature']);
        $company->setPhone($data['phone']);        
        $company->setMail($data['mail']);            
        $company->setCep($data['cep']);        
        $company->setState($data['state']);        
        $company->setCity($data['city']);        
        $company->setDistrict($data['district']);        
        $company->setStreet($data['street']);        
        $company->setNumber($data['number']);        
        $company->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $manager = $doctrine->getManager();
        $manager->flush();

        return $this->json([
            'data' => "Company UPDATED with Success"
        ]);

    }

    /**
     * @Route("/{companyId}", name="delete", methods={"DEL", "DELETE"})
     */
    public function delete($companyId)
    {
        
        $doctrine =$this->getDoctrine(); 

        $company = $doctrine->getRepository(Company::class)->find($companyId);
        
        $manager = $doctrine->getManager();
        $manager->remove($company);
        $manager->flush();

        return $this->json([
            'data' => "Company REMOVED with Success"
        ]);

    }
}
