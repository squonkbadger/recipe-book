<!DOCTYPE html>
<html>
<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Recipe book
    </title>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?= $this->Html->script('jquery-1.11.3.js') ?>
    <?= $this->Html->css('bootstrap.min.css')?>
    <?= $this->Html->script('bootstrap.min.js')?>
    <?= $this->Html->css('style.css') ?>
</head>
<body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
          <div class="row">
              <!-- navbar title-->
              <div class="col-md-2 col-md-offset-1">
                  <div class="h2 bg-primary">
                      Recipe Book
                  </div>
              </div>
              <!-- search by ingredient form -->
              <div class="col-md-4 col-md-offset-4" id="search-ingredients">
                  <div class="col-md-9">
                      <div class="form-group">
                          <?php echo $this->Form->create(null,
                              [ 'url' => ['controller' => 'Recipes', 'action' => 'searchByIngredient']]);
                          echo $this->Form->input('Name', [
                              'class' => 'form-control',
                              'id'=>'ingredient-search-field',
                              'placeholder' => 'Search recipes by ingredient']);?>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <?php echo $this->Form->submit('Search', ['class' => 'btn btn-primary']);
                      echo $this->Form->end();?>
                  </div>
              </div>
          </div>

      </div><!-- /.container-fluid -->
    </nav><!-- navbar -->

    <div id="container">
        <div id="content row">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </div>
</body>
</html>
