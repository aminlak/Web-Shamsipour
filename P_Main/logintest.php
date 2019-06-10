<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            background-color: #4CAF50;
            color: white;
        }

        table {
            text-align: center;
            vertical-align: middle;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table class="js-sort-table" border="2" id="customers" style="border-collapse: collapse; width:100%; border:2px solid #000;  table-layout: auto; ">
        <thead>
            <tr>
                <th class="js-sort-number">ردیف</th>
                <th>وضعیت فعال؟</th>
                <th>نام کاربری</th>
                <th>کلمه عبور</th>
                <th>حذف/ویرایش</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connection.php';
            $sql = "select * from panelusers";
            $result = $conn->query($sql);
            $i = 1;
            if (($result->num_rows) >= 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>$i</td> <td>"; ?>
                    <input type='checkbox' onclick='loadDocss(

                               <?php echo "\"$row[username]\","; ?>

                                this.checked)' <?php if ($row['status'] == 1)
                                                    echo "checked = 'checked'";
                                                echo "></td><td>$row[username]</td><td>$row[password]</td>";
                                                echo "<td>";
                                                echo "<a href='#'onclick='document.form_name.image_name.value=$row[username];document.form_name.submit();return false;'><img src='4.png'style='width:30px;height:30px;padding:2px;'/></a>";
                                                echo "<img src='3.png'onclick='lakFunction($row[username])'style='width:30px;height:30px;padding:2px;cursor:pointer;'>";
                                                echo "</td>";
                                                ?> <!-- <a href='#' onclick=" document . form_name2 . image_name2 . value = '<?php echo $row[' username '] ?>';
                                                                            document . form_name2 . submit();
                                                                            return false;
                                                                            "><img src=" 3. png " style='width:30px;height:30px; padding:2px;' /></a> -->

                    <?php
                    echo " </tr> ";
                    $i++;
                }
            }
            ?>
        </tbody>
    </table>
    <script type="text/javascript">
        function loadDocss(username, sta) {
            var xhttp = new XMLHttpRequest();
            var aa = 0;
            if (sta) {
                aa = 1;
            }

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var rT = this.responseText;
                    if (rT == 1) {
                        alert('شد');
                    } else {
                        alert('نشد');
                    }
                }
            };
            xhttp.open("GET", "usrStatus.php?name=" + username + "&stt=" + aa, true);
            xhttp.send();
        }
    </script>



</body>

</html>