<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\MicroPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile/{id}', name: 'app_profile')]
    public function show(
        User $user,
        MicroPostRepository $posts

    ): Response
    {
        return $this->render('profile/show.html.twig', [
            'user' => $user,
            'posts' => $posts->findAllByAuthor($user)
        ]);
    }

    #[Route('/profile/{id}/follows', name: 'app_profile_follows')]
    public function follows(User $user): Response
    {
        return $this->render('profile/follows.html.twig', [
            'user' => $user
        ]);
    }

    #[Route('/profile/{id}/followers', name: 'app_profile_followers')]
    public function followers(User $user): Response
    {
        return $this->render('profile/followers.html.twig', [
            'user' => $user
        ]);
    }
}

/*
Funkcja "show" obsługuje żądanie HTTP, które zostanie przesłane, gdy użytkownik odwoła się do tej trasy. Jest to funkcja publiczna,
 która zwraca odpowiedź HTTP (Response). W tym przypadku funkcja przyjmuje jako argument obiekt klasy "User", 
 który reprezentuje informacje o użytkowniku, którego profil ma być wyświetlony.

Ostatnia linia kodu wykorzystuje funkcję "render" z frameworka Symfony, aby zwrócić odpowiedź HTML do klienta.
 Funkcja ta renderuje szablon widoku 'profile/show.html.twig', który będzie zawierał informacje o użytkowniku, 
 który został przekazany jako argument w tablicy asocjacyjnej. W tym przypadku informacja o użytkowniku zostanie przekazana pod kluczem 'user'.
*/