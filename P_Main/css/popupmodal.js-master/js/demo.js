document.getElementById('simple_prompt').addEventListener('click', function() {
    popup.prompt({
            content: 'Hello. What is your name?'
        },
        function(config) {
            if (config.input_value && config.proceed) {
                popup.alert({
                    content: 'Hi, ' + config.input_value
                });
            } else if (!config.proceed) {
                popup.alert({
                    content: 'You clicked cancel.'
                });
            }
        }
    );
});