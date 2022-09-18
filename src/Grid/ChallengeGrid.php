<?php

namespace App\Grid;

use App\Entity\Ass;
use App\Entity\Challenge;
use Sylius\Bundle\GridBundle\Builder\Action\CreateAction;
use Sylius\Bundle\GridBundle\Builder\Action\DeleteAction;
use Sylius\Bundle\GridBundle\Builder\Action\UpdateAction;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\BulkActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\ItemActionGroup;
use Sylius\Bundle\GridBundle\Builder\ActionGroup\MainActionGroup;
use Sylius\Bundle\GridBundle\Builder\Field\DateTimeField;
use Sylius\Bundle\GridBundle\Builder\Field\StringField;
use Sylius\Bundle\GridBundle\Builder\Field\TwigField;
use Sylius\Bundle\GridBundle\Builder\Filter\StringFilter;
use Sylius\Bundle\GridBundle\Builder\GridBuilderInterface;
use Sylius\Bundle\GridBundle\Grid\AbstractGrid;
use Sylius\Bundle\GridBundle\Grid\ResourceAwareGridInterface;

class ChallengeGrid extends AbstractGrid implements ResourceAwareGridInterface
{
    public static function getName(): string
    {
        return 'app_backend_challenge';
    }

    public function buildGrid(GridBuilderInterface $gridBuilder): void
    {

        $gridBuilder
            ->addField(
                StringField::create('label')
                    ->setLabel('app.ui.label')
                    ->setSortable(true)
            )
            ->addField(
                DateTimeField::create('startedDate')
                    ->setLabel('app.ui.started_date')
                    ->setSortable(true)
            )
            ->addField(
                DateTimeField::create('endDate')
                    ->setLabel('app.ui.end_date')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('totalDay')
                    ->setLabel('app.ui.total_day')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('description')
                    ->setLabel('app.ui.description')
                    ->setSortable(true)
            )
            ->addField(
                StringField::create('activated')
                    ->setLabel('app.ui.activated')
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
        return Challenge::class;
    }


}
