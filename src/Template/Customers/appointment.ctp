<?php
$cakeDescription = "Beth's Beauty Care";

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<body>
<div class="container">
    <div class="row">
        <div class="col-md-9">

            <div class="form-group row">


                <div class="col-md-3" style="margin-top: 150px;">


                </div>

                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Make Appointment</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="card-block">
                                <?php
                                echo $this->Flash->render();

                                $this->Form->setTemplates([
                                    'inputContainer' => '<div class="form-group{{required}}"> {{content}} <span class="help">{{help}}</span></div>',
                                    'input' => '<input type="{{type}}" name="{{name}}" class="form-control form-control-danger" {{attrs}}/>',
                                    'inputContainerError' => '<div class="form-group has-danger {{type}}{{required}}">{{content}}{{error}}</div>',
                                    'error' => '<div class="text-danger">{{content}}</div>'
                                ]);
                                ?>
                                <?= $this->Form->create();?>
                                <div class="wrap-input100 m-b-23">
                                    <label for="beauty_care_service" class="col-sm-2 -form-label">Type
                                    </label>
                                    <select name ="beauty_care_service" class="form-control" required="true">
                                        <option value>
                                            <?php foreach ($services as $service) { ?>

                                        <option value="<?php echo $service->service_id?>">
                                            <?php echo $service->service_type;?>
                                        </option>
                                        <?php }?>
                                    </select>
                                </div>

                                <label>Appointment Time</label><br>
                                <?php
                                echo $this->Form->dateTime('appointment_datetime', [
                                    'empty' => [
                                        'year' => 'year',
                                        'month' => 'month',
                                        'day' => 'day',
                                        'hour' => 'hour',
                                        'minute' => 'minute'
                                    ],
                                    'monthNames' => true,
                                    'interval' => 60,
                                    'minHour' => 9,
                                    'minYear' => 2020,


                                ]);
                                ?>

                                <?= $this->Form->control('appointment_comment', array('type' => 'textarea', 'label' => 'Comment', 'escape' => false,'rows' => '5', 'cols' => '5'));?>
                                <?= $this->Form->control('appointment_name', array('label' => 'Name', 'value' => $name));?>
                                <?= $this->Form->control('appointment_email', array('label' => 'Email', 'value' => $user->email));?>
                                <?= $this->Form->control('appointment_phone', array('label' => 'Phone Number', 'value' => $user->phone_number));?>
                                <?= $this->Form->control('appointment_address', array('label' => 'Address', 'value' => $user->home_address));?>
                                <?= $this->Form->button('<i class="fa fa-pencil"></i> Submit',['class' => 'login100-form-btn']);?>

                                <?= $this->Form->end();?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

</body>
