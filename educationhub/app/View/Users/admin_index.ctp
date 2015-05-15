
<form id="paypal_form" action="<?php echo $options['HomePage']['paypal_url']; ?>" method="post">
 <input type="hidden" name="cmd" value="_xclick">
 <input type="hidden" name="business" value="<?php echo $options['HomePage']['paypal_mail']; ?>">
 <input id="paypal_tariff" type="hidden" name="amount" value="0.01">
 <input type="hidden" name="handling" value="0">
 <input type="hidden" name="currency_code" value="USD">
 <input type="hidden" name="notify_url" value="http://54.186.89.194/users/getpay/<?php echo $user['User']['id']; ?>/">
 <input type="hidden" name="return" value="http://54.186.89.194/company/mycompanies">
 <input id="paypal_item_name" type="hidden" name="item_name" value="RenoMaster test purchase">
</form>