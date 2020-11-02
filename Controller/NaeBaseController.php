<?php

namespace NaeSymfonyBundles\NaeAuthBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class NaeBaseController extends AbstractController
{
    /**
     * @param int $code
     * @param string $description
     * @param array|null $extraData
     * @return Response
     */
    protected function returnError(int $code, string $description, ?array $extraData = []): Response
    {
        return $this->signErrorResponse(
            array_merge([
                'isError' => true,
                'error' => ['code' => $code, 'description' => $description],
            ],
                $extraData
            )
        );
    }

    /**
     * @param $output
     * @param Request|null $request
     * @return Response
     */
    protected function signErrorResponse($output, Request $request = null): Response
    {
        $response = $this->json($output);
        $response->setStatusCode(Response::HTTP_BAD_REQUEST);

        if ($request && $request->headers->get('origin')) {
            $origin = $request->headers->get('origin');
            $response->headers->set('Access-Control-Allow-Origin', $origin);
            $response->headers->set('Access-Control-Allow-Credentials', 'true');
        } else {
            $response->headers->set('Access-Control-Allow-Origin', '*');
        }

        return $response;
    }
}
