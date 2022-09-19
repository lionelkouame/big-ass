<?php

declare(strict_types=1);

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Monofony\Component\Admin\Menu\AdminMenuBuilderInterface;

final class AdminMenuBuilder implements AdminMenuBuilderInterface
{
    public function __construct(private FactoryInterface $factory)
    {
    }

    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $this->addCustomerSubMenu($menu);
        $this->addConfigurationSubMenu($menu);
        $this->addActionSubMenu($menu);

        return $menu;
    }

    private function addCustomerSubMenu(ItemInterface $menu): void
    {
        $customer = $menu
            ->addChild('customer')
            ->setLabel('sylius.ui.customer')
        ;

        $customer->addChild('backend_customer', ['route' => 'sylius_backend_customer_index'])
            ->setLabel('sylius.ui.customers')
            ->setLabelAttribute('icon', 'users');
    }
    private function addActionSubMenu(ItemInterface $menu): void
    {
        $action = $menu
            ->addChild('action')
            ->setLabel('sylius.ui.action')
        ;

        $action->addChild('backend_admin_challenges', ['route' => 'app_backend_challenge_index'])
            ->setLabel('sylius.ui.challenges')
            ->setLabelAttribute('icon', 'lock');

        $action->addChild('backend_admin_asses', ['route' => 'app_backend_ass_index'])
            ->setLabel('sylius.ui.actions')
            ->setLabelAttribute('icon', 'lock');
    }

    private function addConfigurationSubMenu(ItemInterface $menu): void
    {
        $configuration = $menu
            ->addChild('configuration')
            ->setLabel('sylius.ui.configuration')
        ;

        $configuration->addChild('backend_admin_user', ['route' => 'sylius_backend_admin_user_index'])
            ->setLabel('sylius.ui.admin_users')
            ->setLabelAttribute('icon', 'lock');
    }
}
