<?php

namespace App\Controller\Api;

use App\Entity\Menu\Menu;
use App\Service\MenuService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class MenuController
 * @package App\Controller\Api
 */
final class MenuController extends AbstractController
{
    /** @var SerializerInterface */
    private $serializer;

    /** @var MenuService */
    private $menuService;

    /**
     * ApiPostController constructor.
     * @param SerializerInterface $serializer
     * @param MenuService $menuService
     */
    public function __construct(SerializerInterface $serializer, MenuService $menuService)
    {
        $this->serializer  = $serializer;
        $this->menuService = $menuService;
    }

    /**
     * @Rest\Post("/api/menu/create", name="createMenu")
     * @param Request $request
     * @return JsonResponse
     * @IsGranted("ROLE_ADMIN")
     */
    public function createAction(Request $request): JsonResponse
    {
        $menuData = $this->nullParserByRequest($request);

        $menuEntity = $this->menuService->saveMenu(
            null,
            $menuData['label'],
            $menuData['link'],
            $menuData['font_awesome_icon'],
            $menuData['rank'],
            $menuData['active'],
            $menuData['parent_id']
        );

        $data = $this->serializer->serialize($menuEntity, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Post("/api/menu/update/{id}", name="updateMenu")
     * @param Request $request
     * @return JsonResponse
     * @IsGranted("ROLE_ADMIN")
     */
    public function updateAction(int $id, Request $request): JsonResponse
    {

        $menuData = $this->nullParserByRequest($request);

        $menuEntity = $this->menuService->saveMenu(
            $id,
            $menuData['label'],
            $menuData['link'],
            $menuData['font_awesome_icon'],
            $menuData['rank'],
            $menuData['active'],
            $menuData['parent_id']
        );

        $data = $this->serializer->serialize($menuEntity, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @Rest\Get("/api/posts", name="getAllPosts")
     * @return JsonResponse
     */
    public function getAllActions(): JsonResponse
    {
        $postEntities = $this->postService->getAll();
        $data         = $this->serializer->serialize($postEntities, 'json');

        return new JsonResponse($data, 200, [], true);
    }

    /**
     * @param Request $request
     * @return array
     */
    private function nullParserByRequest(Request $request): array
    {
        $menu['label']             = (!empty($request->get('label'))) ?? null;
        $menu['link']              = (!empty($request->get('link'))) ?? null;
        $menu['font_awesome_icon'] = (!empty($request->get('font_awesome_icon'))) ?? null;
        $menu['rank']              = (!empty($request->get('rank'))) ?? null;
        $menu['active']            = (!empty($request->get('active'))) ?? null;
        $menu['parent_id']         = (!empty($request->get('parent_id'))) ?? null;

        return $menu;
    }
}
