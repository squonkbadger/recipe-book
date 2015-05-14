<div class="col-md-7 col-md-offset-1 main-stuff">
    <h1 class="h1 bg-primary">Search results</h1>
        <?php
        if(($ingredient)&&(!$instances->isEmpty())) {?>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        Recipes containing: <?= $ingredient ?>
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($instances as $instance) { ?>
                    <tr>
                        <td>
                            <?= $this->Html->link($instance->recipe->title,
                                ['action' => 'view', $instance->recipe->id] ) ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php
        }
        else {
            echo('No recipe was found.');
        }?>
</div>

<div class="col-md-2  col-md-offset-1 menu">
    <h1 class="h1 bg-primary">Menu</h1>
    <?= $this->Html->link('Ingredients',
        ['controller' => 'Ingredients',
            'action' => 'index']) ?><br/>
    <?= $this->Html->link('Recipes',
        ['action' => 'index']) ?><br/>
    <?= $this->Html->link('Add ingredient',
    ['controller' => 'Ingredients',
    'action' => 'add']) ?><br/>
    <?= $this->Html->link('Add recipe',
        ['action' => 'add']) ?>
</div>


