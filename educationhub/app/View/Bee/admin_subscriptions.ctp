
<table class="table table-striped">
    <thead>
        <th><?php echo $this->Paginator->sort('Subscription.id','ID'); ?></th>
        <th><?php echo $this->Paginator->sort('User.username','User'); ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.plan_id','Plan'); ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.customer_id','Custome'); ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.subscription_id','Subscription'); ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.subscription_status','Status'); ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.remaining_billing_cycles','Billing cycles'); ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.started_at','Started At') ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.current_term_start','Current Term Start') ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.current_term_end','Current Term End') ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.trial_start','Trial Start') ?></th>
        <th><?php echo $this->Paginator->sort('Subscription.trial_end','Trial End') ?></th>
    </thead>
    <tbody>
        <?php foreach($subscription as $value){ ?>
        <tr>
            <td><?php echo $value['Subscription']['id']; ?></td>
            <td><?php echo $value['User']['username']; ?></td>
            <td><?php echo $value['Subscription']['plan_id']; ?></td>
            <td><?php echo $value['Subscription']['customer_id']; ?></td>
            <td><?php echo $value['Subscription']['subscription_id']; ?></td>
            <td><?php echo $value['Subscription']['subscription_status']; ?></td>      
            <td><?php echo $value['Subscription']['remaining_billing_cycles']; ?></td>   
            <td><?php echo $value['Subscription']['started_at'] ? date("d/M/Y",$value['Subscription']['started_at']) : '-Not available-'; ?></td>   
            <td><?php echo $value['Subscription']['current_term_start'] ? date("d/M/Y",$value['Subscription']['current_term_start']) : '-Not available-'; ?></td>   
            <td><?php echo $value['Subscription']['current_term_end'] ? date("d/M/Y",$value['Subscription']['current_term_end']) : '-Not available-'; ?></td>   
            <td><?php echo $value['Subscription']['trial_start'] ? date("d/M/Y",$value['Subscription']['trial_start']) : '-Not available-'; ?></td>   
            <td><?php echo $value['Subscription']['trial_end'] ? date("d/M/Y",$value['Subscription']['trial_end']) : '-Not available-'; ?></td>    
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