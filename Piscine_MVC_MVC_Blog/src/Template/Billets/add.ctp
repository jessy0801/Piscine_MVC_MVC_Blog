<!-- File: src/Template/Articles/add.ctp -->

<h1>Add Article</h1>
<?php
echo $this->Form->create($billet);
// Ajout des input (via la méthode "control") liés aux catégories
echo $this->Form->control('category_id');
echo $this->Form->control('title');
echo $this->Form->control('tags');
echo $this->Form->control('body', ['rows' => '3']);
echo $this->Form->button(__('Save Article'));
echo $this->Form->end();