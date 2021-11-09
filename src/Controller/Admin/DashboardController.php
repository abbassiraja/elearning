<?php

namespace App\Controller\Admin;

use App\Entity\Commentaire;
use App\Entity\Ecoles;
use App\Entity\Matieres;
use App\Entity\NiveauScolaire;
use App\Entity\Publicite;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/login", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Elearning');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
       yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);
       yield MenuItem::linkToCrud('Ecoles', 'fas fa-list', Ecoles::class);
       yield MenuItem::linkToCrud('Niveau_scolaire', 'fas fa-list', NiveauScolaire::class);
       yield MenuItem::linkToCrud('Matieres', 'fas fa-list', Matieres::class);
       yield MenuItem::linkToCrud('Publicite', 'fas fa-list', Publicite::class);
       yield MenuItem::linkToCrud('Commentaires', 'fas fa-list', Commentaire::class);
       

    }
}
