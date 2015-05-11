<?php

namespace Sopinet\UserPreferencesBundle\Controller;

use FOS\RestBundle\Controller\Annotations\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/settings")
 */
class DefaultController extends Controller
{
    /**
     * Show user preferences edit screen.
     *
     * @Route("/edit", name="panel_user_settings")
     * @Template("@SopinetUserPreferences/Default/edit.html.twig")
     */
    public function getEditAction()
    {
        $sup = $this->container->get('sopinet_user_preferences');
        $settings = $sup->getAllSettings();

        return array('settings' => $settings);
    }

    /**
     * Show user preferences edit screen.
     *
     * @Route("/save", name="panel_user_settings_save")
     * @Method({"PUT", "GET"})
     */
    public function getSaveAction(Request $request)
    {
        $sup = $this->container->get('sopinet_user_preferences');
        $sup->setAllSettings($request);

/*        $container = $this->get('sopinet_flashMessages');
        // TODO: Traducir mensaje de Guardadas Preferencias de Usuario
        $notification = $container->addFlashMessages("success", "Guardadas preferencias de usuario");*/

        return $this->redirect($this->generateUrl('panel_user_preferences_edit'));
    }
}
