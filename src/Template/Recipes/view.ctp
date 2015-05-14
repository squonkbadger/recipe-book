<div class="col-md-7 col-md-offset-1 main-stuff">
    <h1 class="h1 bg-primary"><?= h($recipe->title) ?></h1>
    <div>
        <h3>Ingredients</h3>
        <table class="table table-striped">
            <thead>
            <th>Ingredient</th>
            <th>Amount</th>
            <th>Options</th>
            </thead>
            <tbody>
            <?php foreach($ingredients as $ingredient) {    ?>
                <tr>
                    <td>
                        <?= $ingredient->ingredient->name ?>
                    </td>
                    <td>
                        <?= $this->Form->create($ingredient, [
                            'url'=>['controller'=>'RecipeIngredient', 'action'=>'edit',$ingredient->id]
                        ])?>
                        <?= $this->Form->input('recipe_ingredient', ['label'=>false,
                            'default'=>$ingredient->amount]); ?>

                    </td>
                    <td>
                        <?= $this->Form->submit('Save changes', ['class'=>'btn btn-warning']); ?>
                        <?= $this->Form->end();?>
                        <?= $this->Form->postButton('Delete', [
                            'controller' => 'RecipeIngredient','action' => 'delete', $ingredient->id],
                            ['class'=>'btn btn-danger']); ?>
                    </td>
                </tr>
            <?php } ?>
                <tr>
                    <td>
                        <?= $this->Form->create(null, [
                            'url'=> [
                                'controller'=>'RecipeIngredient',
                                'action'=>'add', $recipe->id]
                        ]);
                        echo $this->Form->input('ingredient.name',['label'=>false]); ?>
                    </td>
                    <td>
                        <?= $this->Form->input('recipe_ingredient.amount',['label'=>false])?>
                    </td>
                    <td><?= $this->Form->submit('Add', ['class'=>'btn btn-success']);
                        echo $this->Form->end();?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h3>Description</h3>
        <p><?= h($recipe->description) ?></p>
    </div>
</div>
<div class="col-md-2 col-md-offset-1 menu">
    <h1 class="h1 bg-primary">Menu</h1>
    <?= $this->Html->link('Ingredients', ['controller' => 'Ingredients', 'action' => 'index']) ?><br/>
    <?= $this->Html->link('Add ingredient', ['controller' => 'Ingredients', 'action' => 'add']) ?><br/>
    <?= $this->Html->link('Recipes', ['action' => 'index']) ?><br/>
    <?= $this->Form->postLink('Delete recipe',['action' => 'delete', $recipe->id])?><br/>
    <?= $this->Html->link('Edit recipe', ['action' => 'edit', $recipe->id]) ?>
</div>
