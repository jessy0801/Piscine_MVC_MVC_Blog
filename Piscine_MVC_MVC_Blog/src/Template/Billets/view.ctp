<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($billet->title) ?></h1>
<p><?= h($billet->body) ?></p>
<p><small>Created: <?= $billet->created->format(DATE_RFC850) ?></small></p>
