<div class="col-md-7 col-md-offset-1 main-stuff">
    <h1 class="h1 bg-primary">Edit recipe</h1>
    <div class="form-group">
        <div class="col-md-9">
            <?php echo $this->Form->create($recipe);
            echo $this->Form->input('title', ['class' => 'form-control','required'=>true]);
            echo $this->Form->input('description', ['rows' => '3', 'class' => 'form-control','required'=>true]); ?>
        </div>
        <div class="col-md-2">
            <?php echo $this->Form->button('Save recipe', ['class' => 'btn btn-success']);
            echo $this->Form->end();?>
        </div>

    </div>
</div>
<div class="col-md-2 col-md-offset-1 menu">
    <h1 class="bg-primary">Menu</h1>
    <?= $this->Html->link('Ingredients', ['controller' => 'Ingredients', 'action' => 'index'],
        ['confirm' => 'Unsaved changes will be lost, are you sure?']) ?><br/>
    <?= $this->Html->link('Recipes', ['action' => 'index'],
        ['confirm' => 'Unsaved changes will be lost, are you sure?']) ?><br/>
    <?= $this->Html->link('Add ingredient',
    ['controller' => 'Ingredients',
    'action' => 'add'],
    ['confirm' => 'Unsaved changes will be lost, are you sure?']) ?>
</div>
