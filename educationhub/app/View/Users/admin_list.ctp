
<table class="table table-striped">
    <thead>
        <th><?php echo $this->Paginator->sort('User.id','ID'); ?></th>
        <th><?php echo $this->Paginator->sort('User.first_name','First Name'); ?></th>
        <th><?php echo $this->Paginator->sort('User.last_name','Last Name'); ?></th>
        <th><?php echo $this->Paginator->sort('User.username','Email'); ?></th>
        <th><?php echo $this->Paginator->sort('User.sub_domen','Sub domen'); ?></th>
        <th><?php echo $this->Paginator->sort('User.phone','Phone'); ?></th>
        <th><?php echo $this->Paginator->sort('Rol.name','Role'); ?></th>
        <th><?php echo $this->Paginator->sort('User.status','Status') ?></th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach($users as $value){ ?>
        <tr>
            <td><?php echo $value['User']['id']; ?></td>
            <td><?php echo $value['User']['first_name']; ?></td>
            <td><?php echo $value['User']['last_name']; ?></td>
            <td><?php echo $value['User']['username']; ?></td>
            <td><?php echo $value['User']['sub_domen']; ?></td>
            <td><?php echo $value['User']['phone']; ?></td>
            <td><?php echo $value['Rol']['name']; ?></td>
            <td>
                <?php 
                    $status = array(0=>'Locked',1=>'Active',2=>'Non-confirmed');
                    echo @$status[$value['User']['status']];
                ?>
            </td>
            <td>
                <?php
                    echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('controller'=>'users','action' => 'info', $value['User']['id']), array('escape' => false,'title'=>'Unlock')); 
                    echo ' ';
                    if($value['User']['status']){
                        echo $this->Html->link('<span class="glyphicon glyphicon-lock"></span>', array('controller'=>'users','action' => 'block', $value['User']['id'].'?action=block'), array('escape' => false,'title'=>'Lock')); 
                    }else{
                        echo $this->Html->link('<span class="glyphicon glyphicon-lock"></span>', array('controller'=>'users','action' => 'block', $value['User']['id'].'?action=unblock'), array('escape' => false,'title'=>'Unlock', 'style'=>'color: black;')); 
                    }
                    echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('controller'=>'users','action' => 'edit', $value['User']['id']), array('escape' => false,'title'=>'Edit'));
                    echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('controller'=>'users','action' => 'delete', $value['User']['id']), array('escape' => false,'title'=>'Delete'),__("Are you sure you want to delete\n%s?", $value['User']['username']));
                ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
    <p>
        <?php    
        /*$params = $this->Paginator->params();
        if ($params['pageCount'] > 1) {*/
        ?>
        <small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} from {:pages}, shown {:current} records of {:count} common, recording starting from {:start}, expiring {:end}')));?></small>
        <?php /*}*/?>
    </p>

    <?php    
    $params = $this->Paginator->params();
    if ($params['pageCount'] > 1) {
    ?>
    <ul class="pagination pagination-sm">
            <?php
                    echo $this->Paginator->prev('&larr; Prev', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Prev</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
                    echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
                    echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
            ?>
    </ul>
    <?php } ?>