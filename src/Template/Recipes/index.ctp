<div class="col-md-7 col-md-offset-1 main-stuff">
    <h1 class="h1 bg-primary">Recipes</h1>
    <table class="table table-striped">
        <tr>
            <th>Title</th>
            <th>Options</th>
        </tr>
        <?php foreach ($recipes as $recipe): ?>
            <tr>
                <td>
                    <?= $this->Html->link($recipe->title, ['action' => 'view', $recipe->id]) ?>
                </td>
                <td>
                    <div>
                        <?= $this->Form->postButton(
                            'Delete',
                            ['action' => 'delete', $recipe->id],
                            ['class'=>'btn btn-danger']); ?>
                    </div>
                    <div>
                        <?= $this->Form->postButton(
                            'Edit',
                            ['action' => 'edit', $recipe->id],
                            ['class'=>'btn btn-warning']) ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<div class="col-md-2 col-md-offset-1 menu">
    <h1 class="h1 bg-primary">Menu</h1>
    <?= $this->Html->link('Ingredients', ['controller' => 'Ingredients', 'action' => 'index']) ?><br/>
    <?= $this->Html->link('Add ingredient', ['controller'=>'Ingredients', 'action' => 'add']) ?><br/>
    <?= $this->Html->link('Add recipe', ['action' => 'add']) ?>
</div>


