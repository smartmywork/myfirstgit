
    <div class="row">
        <div class="col-md-12">
            <div class="page-header" style="margin: -30px 0 20px;">
                <h2><?php echo __('Schools'); ?></h2>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-3">
            <div class="actions">
                <div class="panel panel-default">
                    <div class="panel-heading">Actions</div>
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            
                            <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add school'
                                    ), array('controller'=>'institut', 'action' => 'add', 'admin'=>true), array('escape' => false)); ?>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-9">
            <table class="table table-striped">
                <thead>
                    <th><?php echo $this->Paginator->sort('Slider.name','Name'); ?></th>
                    <th><?php echo $this->Paginator->sort('Slider.address','Address'); ?></th>
                    <th><?php echo $this->Paginator->sort('Slider.phone','Phone'); ?></th>
                    <th><?php echo $this->Paginator->sort('Slider.sub_domen','Sub domen'); ?></th>
                    <th><?php echo $this->Paginator->sort('Slider.active','Active'); ?></th>
                    <th></th>
                </thead>
                <tbody>
                    <?php foreach($schools as $value){ ?>
                    <tr>
                        <td><?php echo $value['School']['name']; ?></td>
                        <td><?php  echo $value['School']['address']; ?></td>
                        <td><?php  echo $value['School']['phone']; ?></td>
                        <td><?php  echo $value['School']['sub_domen']; ?></td>
                        <td><?php $_status = array('No','Yes'); echo $_status[$value['School']['active']]; ?></td>
                        <td>
                            <?php
                                echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller'=>'institut','action' => 'edit', $value['School']['id'],'admin'=>true), array('escape' => false,'title'=>'Edit'));   
                                echo '  ';
                                echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('controller'=>'institut','action' => 'info', $value['School']['id']), array('escape' => false,'title'=>'School info')); 
                                //echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'settings','action' => 'delete', $value['Settings']['id']), array('escape' => false,'title'=>'Delete'),__("Are you sure you want to delete\n%s?", $value['Settings']['name']));
                            ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
