<div class="col-md-7 col-md-offset-1 main-stuff">
    <h1 class="h1 bg-primary">Add a new ingredient</h1>
    <div class="form-group">
        <div class="col-md-8">
            <?php echo $this->Form->create();
            echo $this->Form->input('name', ['class'=>'form-control']);?>
        </div>
        <div class="col-md-4">
            <?php echo $this->Form->submit('Save ingredient', ['class' => 'btn btn-success']);
            echo $this->Form->end();?>
        </div>
    </div>
</div>
<div class="col-md-2 col-md-offset-1 menu">
    <h1 class="bg-primary">Menu</h1>
    <?= $this->Html->link('Ingredients',
        ['action' => 'index']) ?><br/>
    <?= $this->Html->link('Recipes',
        ['controller' => 'Recipes',
            'action' => 'index']) ?><br/>
    <?= $this->Html->link('Add recipe',
        ['controller' => 'Recipes',
            'action' => 'add']) ?>
</div>
