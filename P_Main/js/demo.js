document.getElementById('callback_demo').addEventListener('click', function() {
    popup.confirm({
            content: 'آیا از حذف این آیتم اطمینان دارید؟',
            default_btns: {
                ok: 'بله',
                cancel: 'خیر'
            }
        },
        function(config) {
            var e = config.e;

            if (config.proceed) {
                popup.alert({ content: 'بله رو زدی' });
            } else if (!config.proceed) {
                popup.alert({ content: 'نع' });
            }
        }
    );
});