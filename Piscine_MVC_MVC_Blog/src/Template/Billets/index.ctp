<!-- File: src/Template/Articles/index.ctp -->

<h1>Blog articles</h1>
<p><?= $this->Html->link('Ajouter un Article', ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
        <th>Categorie</th>
        <th>Actions</th>
    </tr>

    <!-- C'est ici que nous itérons à travers notre objet query $articles, -->
    <!-- en affichant les informations de l'article -->

    <?php foreach ($billets as $article): ?>
    <tr>
        <td><?= $article->id ?></td>
        <td>
            <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
        </td>
        <td>
            <?= $article->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $article->category_name ?>
        </td>
        <?php if ($article->user_id === $user) { ?>
        <td>
            <?= $this->Form->postLink(
            'Supprimer',
            ['action' => 'delete', $article->id],
            ['confirm' => 'Etes-vous sûr?'])
            ?>
            <?= $this->Html->link('Modifier', ['action' => 'edit', $article->id]) ?>
        </td>
        <?php } ?>

    </tr>
    <?php endforeach; ?>

</table>
