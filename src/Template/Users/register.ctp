<?php
/**
 * @var \App\Model\Entity\User $user
 */
?>
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-15 p-b-54">

            <div class="users-form">
                <a class="login100-form-title p-b-49"><br>Register Account</a>
                <div class="wrong-message"><?= $this->Flash->render() ?></div>
                    <?= $this->Form->create() ?>
                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('first_name', ['placeholder' => 'Your first name', 'required']);?>
                </div>
                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('surname', ['placeholder' => 'Your last name', 'required']);?>
                </div>
                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('email', ['placeholder' => 'Your email address', 'required']);?>
                    </div>
                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('home_address', ['placeholder' => 'Your home address', 'required']);?>
                </div>
                 <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('phone_number', ['placeholder' => 'Your phone number', 'required']);?>
                    </div>
                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('extra_information', ['placeholder' => 'e.g. broken leg, fragile', 'required']);?>
                </div>


                <div class="wrap-input100 m-b-23">
                    <?= $this->Form->control('password', ['placeholder' => 'Your password', 'required'],'required');?>
                </div>
                <p class="password-message">
                    Passwords must be at least 8 characters
                    </p>
                <div class="wrap-input100 m-b-23">
        <?= $this->Form->input('confirm_password', ['type' => 'password']) ?>
                </div>


                <input type="checkbox" name="accept_terms" required>Yes I have read and agree to the Terms and Conditions<br>





                <div class="text-center p-t-8 p-b-31">
    <?= $this->Html->link("Have an account already?", ['action' => 'login'], ['class' => 'forgot-btn pull-right']); ?>
                </div>

<?= $this->Form->button(('Register'), ['class' => 'login100-form-btn']); ?>
<?= $this->Form->end();?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function () {
        $('.select2').select2();
    } );

    $("#role").on('input', function() {

        if($(this).val() === "unverified")
            $("#year_level").prop('disabled', true);
        else
            $("#year_level").prop('disabled', false);
    });
    $("#school").on('change', function() {
        if ($(this).val() === "other") {
            $("#other_school").prop('disabled', false);
            $("#other_school").prop('required', true);
        }
        else {
            $("#other_school").prop('disabled', true);
            $("#other_school").prop('required', false);
        }
    });
</script>
