<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends Controller
{
    /**
     * @Route("/shop/detail", name="shop_detail")
     */
    public function detailAction()
    {
        return $this->render(':Shop:detail.html.twig');
    }

    /**
     * @Route("/shop/menu", name="shop_menu")
     */
    public function menuAction()
    {
        return $this->render(':Shop:menu.html.twig');
    }

    /**
     * @Route("/shop/order", name="shop_order")
     */
    public function orderAction(Request $request)
    {
        $form = $this->createFormBuilder()
          ->add('id', 'hidden')
          ->add('remarks', 'textarea', [
              'required' => false,
          ])
          ->add('order', 'submit', [
            'label' => 'Order',
          ])
          ->add('reset', 'button', [
            'label' => 'Cancel',
            'attr' => [
              'onclick' => 'window.history.back();',
              'class' => 'btn',
            ]
          ])
          ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->addFlash('success', 'Order send!', [
                'required' => false,
            ]);

            return $this->redirectToRoute('shop_menu');
        }

        return $this->render(':Shop:order.html.twig', [
            'form' => $form->createView()
        ]);
    }
}