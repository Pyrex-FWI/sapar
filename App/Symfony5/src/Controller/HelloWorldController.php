<?php

namespace Sapar\Controller;

use Sapar\Component\AudioCoreEntity\Repository\MediaRepository;
use Sapar\Id3Metadata\Id3MetadataManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Stopwatch\Stopwatch;
use Twig\Environment;

class HelloWorldController /* extends AbstractController*/
{

  /**
   * @var string
   */
  private $kernelProjectDir;
  /**
   * @var Environment
   */
  private $twig;
  /**
   * @var Stopwatch|null
   */
  private $stopwatch;

  public function __construct(string $kernelProjectDir, Environment $twig, ?Stopwatch $stopwatch)
  {
    $this->kernelProjectDir = $kernelProjectDir;
    $this->twig = $twig;
    $this->stopwatch = $stopwatch;
  }

  /**
     * @Route("/", name="hello_world")
     */
    public function index(MessageBusInterface $bus, Id3MetadataManager $id3MetadataManager, MediaRepository $mediaFileRepository)
    {
        /** @var Media[] $mediafiles */
        $mediafiles = $mediaFileRepository->createQueryBuilder('m')
            ->setMaxResults(20)
            ->getQuery()->execute();
        foreach ($mediafiles as $mediafile) {
            dump($id3MetadataManager->read($mediafile->getFilePath()));
        }
        //        $bus->dispatch(new ReadFileTag('/Users/yemis/Downloads/Telegram/My Baby Riddim (2005) - BIG YARD/10. Dynamiq - The Time.mp3'));
        return new Response($this->twig->render('hello_world/index.html.twig', [
            'controller_name' => 'HelloWorldController',
        ]));
    }
}
