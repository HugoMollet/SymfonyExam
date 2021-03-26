<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class IndexController extends AbstractController
{
    /**
     * @Route("/base", name="base")
     */
    public function index()
    {
        return $this->render('base.html.twig', [
            'controller_name' => 'baseController',
        ]);
    }
    
    /**
     * @Route("/LeSi", name="LeSi")
     */
    public function LeSi()
    {
        return $this->render('LeSi.html.twig', [
            'controller_name' => 'LeSiController',
        ]);
    }
    
    /**
     * @Route("/LeReseau", name="LeReseau")
     */
    public function LeReseau()
    {
        return $this->render('LeReseau.html.twig', [
            'controller_name' => 'LeReseauController',
        ]);
    }
    /**
     * @Route("/Equipement", name="Equipement")
     */
    public function Equipement()
    {
        return $this->render('Equipement.html.twig', [
            'controller_name' => 'EquipementController',
        ]);
    }/**
     * @Route("/GestionInformatique", name="GestionInformatique")
     */
    public function GestionInformatique()
    {
        return $this->render('GestionInformatique.html.twig', [
            'controller_name' => 'GestionInformatiqueController',
        ]);
    }/**
     * @Route("/SystemeInformatique", name="SystemeInformatique")
     */
    public function SystemeInformatique()
    {
        return $this->render('SystemeInformatique.html.twig', [
            'controller_name' => 'SystemeInformatiqueController',
        ]);
    }/**
     * @Route("/Repartition", name="Repartition")
     */
    public function Repartition()
    {
        return $this->render('Repartition.html.twig', [
            'controller_name' => 'RepartitionController',
        ]);
    }/**
     * @Route("/Segmentation", name="Segmentation")
     */
    public function Segmentation()
    {
        return $this->render('Segmentation.html.twig', [
            'controller_name' => 'SegmentationController',
        ]);
    } /**
     * @Route("/Lesutilisateurs", name="Lesutilisateurs")
     */
    public function Lesutilisateurs()
    {
        return $this->render('Lesutilisateurs.html.twig', [
            'controller_name' => 'LesutilisateursController',
        ]);
    } 
    public function RecupLesUtilisteurs()
    {
       $repo = $this->getDoctrine()->getRepository(\App\Entity\Utilisateur);
       $util = $repo->findAll();
       return $this->render('Lesutilisateurs.html.twig' ,['listeUser' => $util]);
    }

}
