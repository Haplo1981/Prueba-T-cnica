<?php
namespace ideup\pruebaTecnicaBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class Builder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Inicio', array('route' => '_homepage'));
        $menu->addChild('Listado viviendas', array(
            'route' => '_homepage',
        ));
        $menu->addChild('Nueva vivienda', array('route'=>'vivienda_new'));
        return $menu;
    }
}
?>