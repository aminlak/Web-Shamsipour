var songlist = ['song1', 'song2', 'song3'];
$("#checkAll").click(function() {
    $(".check").prop('checked', $(this).prop('checked'));
});

var sendData = function(name, phone) {
    $.post("test.php", {
            name: name,
            city: phone
        },
        function(data) {
            document.location.reload();
        });
}
var editPhone = function(name, phone) {
    $.post("edit.php", {
            name: name,
            phone: phone
        },
        function(data) {
            document.location.reload();
        });
}
$(function() {
    //Assign Click event to Button.
    $("#btnGet").click(function() {
        popup.confirm({
                content: 'آیا از حذف این آیتم ها اطمینان دارید؟',
                default_btns: {
                    ok: 'بله',
                    cancel: 'خیر'
                }
            },
            function(config) {
                var e = config.e;

                if (config.proceed) {

                    var message = "";
                    var person = [];
                    var i = 0;
                    //Loop through all checked CheckBoxes in GridView.
                    $("#Table1 input[type=checkbox]:checked").each(function() {
                        var row = $(this).closest("tr")[0];
                        person[i++] = row.cells[2].innerHTML;
                        message += row.cells[3].innerHTML;
                    });
                    var myJSON = JSON.stringify(person);
                    //Display selected Row data in Alert Box.
                    sendData(myJSON);
                    return false;
                } else if (!config.proceed) {
                    //popup.alert({ content: 'نع' });
                }
            }
        );
    });
});


function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById("London").style.display = "block";
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function lakFunction(data) {
    var txt;
    /*var person = prompt("Enter New Phone Number");
    if (person == null || person == "") {
        txt = "User cancelled the prompt.";
    } else {
        txt = person;
        editPhone(data, txt);
    }*/

    popup.prompt({
            content: 'شماره جدید را وارد نمایید'
        },
        function(config) {
            if (config.input_value && config.proceed) {
                txt = config.input_value;
                editPhone(data, txt);
                popup.alert({
                    content: 'Hi, ' + config.input_value

                });
            }
        }
    );
}
document.getElementById("defaultOpen").click();

document.getElementById("khas").click();
var getdData = function(name, phone) {
    $.post("test.php", {
            name: name,
            city: phone
        },
        function(data) {
            document.location.reload();
        });
}


function chartF(dddata) {

    var obj = JSON.parse(dddata);
    var ctx = document.getElementById('myChart');
    var inn = [1, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 41];
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00', '23:59'],
            datasets: [{
                label: 'تعداد افراد انلاین در ساعت',
                data: obj,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}