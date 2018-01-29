<br>
<div class="index large-4 medium-4 large-offset-4 medium-offset-4 columns">
    <div class="panel">
        <h2 class="text-center">Inscription</h2>
        <?= $this->Form->create(); ?>
        <?= $this->Form->input('name', ['label' => 'Prenom :']); ?>
        <?= $this->Form->input('lastname', ['label' => 'Nom :']); ?>
        <?= $this->Form->input('birthdate', ['type' => 'date', 'label' => 'Date de naissance :']); ?>
        <?= $this->Form->input('login', ['label' => 'Login :']); ?>
        <?= $this->Form->input('email', ['type' => 'email',
        'label' => 'Addresse Email'
        ]); ?>
        <?= $this->Form->input('password', array('type' => 'password', 'label' => 'Mot de passe :')); ?>
        <?= $this->Form->input('passwordconf', array('type' => 'password', 'label' => 'Comfirmation :')); ?>
        <?= $this->Form->submit('Submit', array('class' => 'button', 'value' => 'Comfirmation')); ?>
        <?= $this->Form->end(); ?>
    </div>
</div>