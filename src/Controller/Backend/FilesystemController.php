<?php

/**
 * This file is part of the DevsCast project
 *
 * (c) bernard-ng <ngandubernard@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Controller\Backend;

use DirectoryIterator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use SplFileInfo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_CONTENT_MANAGER")
 * Class FilesystemController
 * @Route("/backend/filesystem", name="backend_files_")
 * @package App\Controller\Admin
 * @author bernard-ng <ngandubernard@gmail.com>
 */
class FilesystemController extends AbstractController
{
    /**
     * @Route(path="", name="index", methods={"GET"})
     * @return Response
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function index()
    {
        try {
            $projectDir = $this->getParameter('kernel.project_dir');
            $files = new DirectoryIterator($projectDir . '/public/images');
        } finally {
            return $this->render("@backend/files/index.html.twig", [
                'files' => $files ?? null
            ]);
        }
    }

    /**
     * @Route(path="/show", name="show", methods={"GET"})
     * @param Request $request
     * @return Response
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function show(Request $request): Response
    {
        try {
            $filename = $request->query->get('file');
            $directory = is_dir($filename) ? new DirectoryIterator($filename) : null;
            $file = is_file($filename) ? new SplFileInfo($filename) : null;
        } finally {
            return $this->render("@backend/files/index.html.twig", [
                'files' => $directory ?? null,
                'file' => $file ?? null,
                'preview' => $this->getPreview($file)
            ]);
        }
    }

    /**
     * @Route(path="/delete", name="delete", methods={"DELETE"})
     * @param Request $request
     * @return Response
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    public function delete(Request $request): Response
    {
        $key = $request->request->get('_key');
        if ($this->isCsrfTokenValid('delete' . $key, $request->request->get('_token'))) {
            $filename = $request->request->get('_file');
            if (is_file($filename)) {
                unlink($filename);
            }
        }

        return $this->redirectToRoute('backend_files_index');
    }

    /**
     * @param SplFileInfo|null $file
     * @return string|null
     * @author bernard-ng <ngandubernard@gmail.com>
     */
    private function getPreview(?SplFileInfo $file): ?string
    {
        if ($file && in_array(strtolower($file->getExtension()), ['jpg', 'jpeg', 'png'])) {
            $projectDir = $this->getParameter('kernel.project_dir');
            return str_ireplace($projectDir . "/public", '', $file->getRealPath());
        }
        return null;
    }
}
