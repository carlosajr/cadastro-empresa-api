<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Partner;

/**
 * @Route("/partners", name="partner_")
 */

class PartnerController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {

        $partners = $this->getDoctrine()->getRepository(Partner::class)->findAll();

        return $this->json([
            'data' => $partners
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['companys']
        ]);

    }

    /**
     * @Route("/{partnerId}", name="show", methods={"GET"})
     */

    public function show($partnerId)
    {

        $partner = $this->getDoctrine()->getRepository(Partner::class)->find($partnerId);

        return $this->json([
            'data' => $partner
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['companys']
        ]);

    }

    /**
     * @Route("/", name="create", methods={"POST"})
     */

    public function create(Request $request)
    {

        $data = $request->toArray();

        $partner = New Partner();
        $partner->setName($data['name']);
        $partner->setCpf($data['cpf']);
        $partner->setPhone($data['phone']);
        $partner->setMail($data['mail']);
        $partner->setCep($data['cep']);
        $partner->setState($data['state']);
        $partner->setCity($data['city']);
        $partner->setDistrict($data['district']);
        $partner->setStreet($data['street']);
        $partner->setNumber($data['number']);
        $partner->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        $partner->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $manager = $this->getDoctrine()->getManager();

        $manager->persist($partner);
        $manager->flush();

        return $this->json([
            'partner' => $partner
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['companys', 'createdAt', 'updatedAt']
        ]);

    }

    /**
     * @Route("/{partnerId}", name="update", methods={"PUT", "PATCH"})
     */

    public function update($partnerId, Request $request)
    {
        
        $data = $request->toArray();

        $doctrine = $this->getDoctrine(); 

        $partner = $doctrine->getRepository(Partner::class)->find($partnerId);

        $partner->setName($data['name']);        
        $partner->setCpf($data['cpf']);
        $partner->setPhone($data['phone']);        
        $partner->setMail($data['mail']);            
        $partner->setCep($data['cep']);        
        $partner->setState($data['state']);        
        $partner->setCity($data['city']);        
        $partner->setDistrict($data['district']);        
        $partner->setStreet($data['street']);        
        $partner->setNumber($data['number']);        
        $partner->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $manager = $doctrine->getManager();
        $manager->flush();

        return $this->json([
            'data' => "Partner UPDATED with Success"
        ]);

    }

    /**
     * @Route("/{partnerId}", name="delete", methods={"DEL", "DELETE"})
     */

    public function delete($partnerId)
    {
        
        $doctrine =$this->getDoctrine(); 

        $partner = $doctrine->getRepository(Partner::class)->find($partnerId);
        
        $manager = $doctrine->getManager();
        $manager->remove($partner);
        $manager->flush();

        return $this->json([
            'data' => "Company REMOVED with Success"
        ]);

    }

}
