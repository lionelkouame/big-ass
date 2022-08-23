<?php

namespace App\Grid;

use App\Entity\Ass;
use Sylius\Bundle\GridBundle\Builder\Action\CreateAction;
use Sylius\Bundle\GridBundle\Builder\Action\DeleteAction;
use Sylius\Bundle\GridBundle\Builder\Action\UpdateAction;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\BulkActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\ItemActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\MainActionGroup;
use Sylius\Bundle\GridBundle\Builder\Field\StringField;
use Sylius\Bundle\GridBundle\Builder\Field\TwigField;
use Sylius\Bundle\GridBundle\Builder\Filter\StringFilter;
use Sylius\Bundle\GridBundle\Builder\GridBuilderInterface;
use Sylius\Bundle\GridBundle\Grid\AbstractGrid;
use Sylius\Bundle\GridBundle\Grid\ResourceAwareGridInterface;

class AssGrid extends AbstractGrid implements ResourceAwareGridInterface
{
    public static function getName(): string
    {
        return 'app_backend_ass';
    }

    public function buildGrid(GridBuilderInterface $gridBuilder): void
    {

        $gridBuilder
            ->addField(
                StringField::create('action')
                    ->setLabel('app.ui.action')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('porcentage')
                    ->setLabel('app.ui.porcentage')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('porcentage')
                    ->setLabel('app.ui.porcentage')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('description')
                    ->setLabel('app.ui.description')
                    ->setSortable(true)
            )
            ->addActionGroup(
                MainActionGroup::create(
                    CreateAction::create(),
                )
            )
            ->addActionGroup(
                ItemActionGroup::create(
                    UpdateAction::create(),
                    DeleteAction::create(),
                )
            )
            ->addActionGroup(
                BulkActionGroup::create(
                    DeleteAction::create()
                )
            )

        ;

    }

    public function getResourceClass(): string
    {
        return Ass::class;
    }


}
