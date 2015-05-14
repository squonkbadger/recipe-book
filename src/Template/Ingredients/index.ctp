<div class="col-md-7 col-md-offset-1 main-stuff">
    <h1 class="h1 bg-primary">Ingredients</h1>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Options</th>
            </tr>
            <?php foreach ($ingredients as $ingredient): ?>
                <tr>
                    <td>
                        <?= $ingredient->name ?>
                    </td>
                    <td>
                        <div>
                            <?= $this->Form->postButton(
                                'Delete',
                                ['action' => 'delete', $ingredient->id],
                                ['class' => 'btn btn-danger']); ?>
                        </div>
                        <div>
                            <?php echo $this->Form->postButton(
                                'Edit',
                                ['action' => 'edit', $ingredient->id],
                                ['class' => 'btn btn-warning']) ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</div>
<div class="col-md-2 col-md-offset-1 menu">
    <h1 class="bg-primary">Menu</h1>
        <?= $this->Html->link('Add ingredient',
            ['action' => 'add']) ?><br/>
        <?= $this->Html->link('Recipes',
            ['controller' => 'Recipes',
                'action' => 'index']) ?><br/>
        <?= $this->Html->link('Add recipe',
            ['controller'=>'Recipes',
                'action' => 'add']) ?>
</div>
