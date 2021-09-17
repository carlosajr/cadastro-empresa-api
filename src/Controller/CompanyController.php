<?php

namespace App\Controller;

use App\Builders\CompanyBuilder;
use App\Repository\CompanyRepository;
use App\ValueObjects\CompanyValueObject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use App\Entity\Company;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/companys", name="company_")
 */
class CompanyController extends AbstractController
{
    /**
     * @var CompanyRepository
     */
    private CompanyRepository $companyRepository;

    /**
     * @var CompanyBuilder
     */
    private CompanyBuilder $companyBuilder;

    /**
     * @var Serializer
     */
    private Serializer $serializer;

    public function __construct(
        CompanyRepository $companyRepository,
        CompanyBuilder $companyBuilder,
        Serializer $serializer
    ) {
        $this->companyRepository = $companyRepository;
        $this->companyBuilder = $companyBuilder;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/", name="index", methods={"GET"})
     * @return Response
     */
    public function index(): Response
    {
        $companys = $this->companyRepository->findAllCompanys();

        return $this->json([
            'data' => $companys
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['partners']
        ]);
    }

    /**
     * @Route("/{company}", name="show", methods={"GET"})
     * @param Company $company
     * @return JsonResponse
     */
    public function show(Company $company)
    {
        return $this->json([
            'data' => $company
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['partners']
        ]);
    }

    /**
     * @Route("/", name="create", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create(Request $request)
    {
        $companyVo = $this->serializer->deserialize(
            $request->getContent(),
            CompanyValueObject::class,
            'json'
        );

        $company = $this->companyBuilder->build($companyVo);

        $this->companyRepository->save($company);

        return $this->json([
            'company' => $company
        ],200,[],[
            ObjectNormalizer::IGNORED_ATTRIBUTES => ['partners', 'createdAt', 'updatedAt']
        ]);
    }

    /**
     * @Route("/{company}", name="update", methods={"PUT", "PATCH"})
     * @param Company $company
     * @param Request $request
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(Company $company, Request $request): JsonResponse
    {
        $companyVo = $this->serializer->deserialize(
            $request->getContent(),
            CompanyValueObject::class,
            'json'
        );

        $company = $this->companyBuilder->assemble($company, $companyVo);

        $this->companyRepository->save($company);

        return $this->json([
            'data' => "Company UPDATED with Success"
        ]);

    }

    /**
     * @Route("/{company}", name="delete", methods={"DEL", "DELETE"})
     * @param Company $company
     * @return JsonResponse
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Company $company)
    {
        $this->companyRepository->remove($company);

        return $this->json([
            'data' => "Company REMOVED with Success"
        ]);

    }
}
