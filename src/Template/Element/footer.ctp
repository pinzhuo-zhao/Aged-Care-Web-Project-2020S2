<?= $this->Html->css('style-2.css') ?>
        <div class="copyright">
            <p >Beth's Beauty Care

             <?=
        $this->Html->link(
                'Terms and Conditions',[ 'controller' => 'users', 'action' => 'downloadterms', '_full' => true ] ); ?>

                and <?= $this->Html->link('Privacy Policy', '/files/PrivacyPolicy.pdf', ['download' => 'Privacy']);?>

            </p>
        </div>
