// function for get balance,equity,free_margin
function balance_equity($this,account_id,search) {
    $($this).find('i').addClass('fa-spin');
    $.ajax({
        url: '/user/balance-equity/'+search+'/account/' + account_id,
        dataType: 'json',
        method: 'get',
        success: function(data) {
            $($this).find('.amount').text(data.amount);
            $($this).find('i').removeClass('fa-spin');
        }
    });
}