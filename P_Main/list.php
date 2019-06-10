<?php
session_start();
if (isset($_SESSION['user'])) {
  echo $_SESSION['user'];
} else {
  header("Location: index.php");
} ?>
<html dir="rtl">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>داشبورد</title>
  <link rel="stylesheet" type="text/css" href="list.css">
  <link rel="stylesheet" href="css/popupmodal.css" />
</head>

<body>
  
  <?php
  function runMyFunction()
  {
    session_unset($_SESSION['user']);
    //session_destroy();
    header("Refresh:0");
  }

  if (isset($_GET['logout'])) {
    runMyFunction();
  }
  ?>
  <script type="text/javascript">
    function loadDocs(username, passwords, rpassword) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var rT = this.responseText;
          if (rT == 0) {
            alert("yeki nis");
          } else if (rT == 1) {
            alert("ثبت شد");
          } else {
            alert("moshkele " + rT);
          }
        }
      };
      xhttp.open("GET", "register.php?uname=" + username + "&psw=" + passwords + "&rpsw=" + rpassword, true);
      xhttp.send();
    }
  </script>
  <div id="id02" class="modal">
    <form class="modal-content animate" action="register.php">
      <div class="imgcontainer">
        <div class="container2" style="background-color:#fff">
          <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>
      </div>
      <div class="container2">
        <hr>

        <label><b>نام کاربری</b></label>
        <input id='usern' type="text" id='hala' placeholder="نام کاربری دلخواه را وارد کنید" name="email" required>

        <label for="psw"><b>گذرواژه</b></label>
        <input id='passn' type="password" placeholder="کلمه عبور" name="psw" required>

        <label><b>تکرار گذرواژه</b></label>
        <input id='rpassn' type="password" placeholder="تکرار کلمه عبور" name="psw-repeat" required>
        <label><b>سطح دسترسی:</b></label>

        <div class="custom-select" dir="ltr" style="width:200px; float:left">
          <select required>
            <option value="0">Guest</option>
            <option value="2">Guest</option>
          </select>
        </div>
        <br>
        <br>
        <br>
        <br>
        <hr>

        <button type="button" class="registerbtn" onclick="loadDocs(document.getElementById('usern').value,document.getElementById('passn').value,document.getElementById('rpassn').value)">ثبت کاربر</button>

      </div>
      <div class="container2" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">بستن</button>

      </div>
    </form>
  </div>



  <a href='list.php?logout=true'>Logout</a>
  <!--
  <a href="http://maps.google.com/maps?saddr=New+York&daddr=San+Francisco">Route New York  San Francisco</a>
  <div id="googleMap" style="width:100%;height:400px;"></div>
-->
  <script>
    function myMap() {
      var mapProp = {
        center: new google.maps.LatLng(51.508742, -0.120850),
        zoom: 5,
      };
      var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }
  </script>

  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=a&callback=myMap"></script> -->

  <b>
    <ul id="mySidenav" style="border:2px solid;">
      <li><a id='A' href="#mainPage" class="tablinks" onclick="openCity(event, 'London')">صفحه اصلی</a></li>
      <li><a href="#users" class="tablinks" onclick="openCity(event, 'Paris')" id="defaultOpen"><img src="1.png" style="width:20px;height:20px; padding:3px;" />
          <div style="display: inline;">
            <p style="display: inline;">کاربران</p>
          </div>
        </a></li>
      <li><a id='B' href="#games" class="tablinks" onclick="openCity(event, 'Tokyo')"><img src="2.png" style="width:25px;height:20px; padding:3px;" />
          <div style="display: inline;">
            <p style="display: inline;">بازی ها</p>
          </div>
        </a></li>
      <?php
      echo "
      <li>";
      ?>
      <a id='B' href="#registerUsr" class="tablinks" onclick="<?php
                                                              echo "document . getElementById('id02') . style . display = 'block'";

                                                              ?>">

        <?php
        echo "<div style='display: inline;'><p style='display: inline;'>ثبت کاربر</p> </div>";

        ?>
      </a></li>
    </ul>
  </b>
  <div id="London" class="tabcontent" style="width:70%;height:30%; border-style: solid; float:left; margin: 50px 70px 10px 70px; padding:0px; display:block; ">
    <!-- <span  onclick="this.parentElement.style.display='none'" class="topright">&times</span> -->

    <canvas id="myChart" width="800px" height="150px"></canvas>

    <script src="package/dist/Chart.js"></script>
    <script src="list.js"></script>
    <script>
      function lak() {

        $.post("../tempt.php", {

          },
          function(data) {
            chartF(data);
          });
      }
    </script>
  </div>


  <div id="Paris" class="tabcontent" style="width:70%; height:80%; margin-right:auto; margin-left:70px;margin-bottom:70px; margin-top:0px; padding:0px;">
    <?php
    if (isset($_SESSION['sath'])) {
      if ($_SESSION['sath'] == 1) {
        echo "<div style='width:100%;height:auto; float:left; margin: 10px 0px; '>
      <img src='5.png' style='width:157.5px;height:37.5px;float:left; cursor:pointer;' ; id='btnGet' type='button' value='Get Selected' />
      <label class='container' style='float:right;'> 
        <input type='checkbox' class='check' id='checkAll'>
        <span class='checkmark'></span>
      </label>
      <label>
        انتخاب همه
      </label>
    </div>";
      }
    }
    ?>
    <div style="overflow:scroll; width:100%; height:100%;">
      <table class="js-sort-table" border="2" id='Table1' style="border-collapse: collapse; width:100%; border:2px solid #000;  table-layout: auto; ">
        <thead>
          <tr>
            <?php if (isset($_SESSION['sath'])) {
              if ($_SESSION['sath'] == 1) {
                echo "<th>انتخاب</th>";
              }
            }
            ?>
            <th class="js-sort-number">ردیف</th>
            <th>نام کاربری</th>
            <th>شماره تلفن</th>
            <th class="js-sort-date">تاریخ آخرین ورود</th>
            <th>ساعت آخرین ورود</th>
            <th>موقعیت جغرافیایی</th>
            <th class="js-sort-number">آخرین رکورد</th>
            <th class="js-sort-number">امتیازات</th>
            <?php if (isset($_SESSION['sath'])) {
              if ($_SESSION['sath'] == 1) {
                echo "<th>حذف/ویرایش</th>";
              }
            }
            ?>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'connection.php';
          $sql = "select * from usrs inner join arch on arch.userId=usrs.id;";
          $result = $conn->query($sql);
          $i = 1;
          if (($result->num_rows) >= 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              $timestamp = $row['lastOnline'];
              $datetimeFormat = 'Y-m-d';
              $date = new \DateTime('now', new \DateTimeZone('Asia/Tehran'));
              $date->setTimestamp($timestamp);
              $ssd = $date->format($datetimeFormat);
              $datetimeFormat = 'H:i:s';
              $sdd = $date->format($datetimeFormat);
              ?>

              <?php if (isset($_SESSION['sath'])) {
                if ($_SESSION['sath'] == 1) {
                  echo "<td>
                <label class='container' style='float:right;'> 
                  <input type='checkbox' class='check'>
                  <span class='checkmark'></span>
                </label>
                </td>";
                }
              }
              ?>
              <?php
              echo "<td>$i</td><td>$row[username]</td><td>$row[phoneNo]</td><td>$ssd</td><td>$sdd</td><td>کره زمین واقع در نقطه ی  $row[location]</td><td></td><td>$row[score]</td>";
              ?>
              <td style="display:<?php
                                  if (isset($_SESSION['sath'])) {
                                    if ($_SESSION['sath'] == 1) {
                                      echo 'block';
                                    } else {
                                      echo 'none';
                                    }
                                  } else {
                                    echo 'none';
                                  }
                                  ?>">
                <a href='#' onclick="
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
                        document.form_name.image_name.value = '<?php echo $row['username'] ?>'; document.form_name.submit(); return false;
                      } else if (!config.proceed) {
                        //popup.alert({ content: 'نع' });
                    }
                }
            );
                        "><img src="4.png" style='width:30px;height:30px; padding:2px;' /></a>
                <!-- <a href='#' onclick="document.form_name2.image_name2.value = '<?php echo $row['username'] ?>'; document.form_name2.submit(); return false;"><img src="3.png" style='width:30px;height:30px; padding:2px;'/></a> -->
                <img src='3.png' onclick="lakFunction('<?php echo $row['username'] ?>')" style='width:30px;height:30px; padding:2px; cursor: pointer;'>
              </td>
              <!-- <a href='#' onclick="document.form_name2.image_name2.value = '<?php echo $row['username'] ?>'; document.form_name2.submit(); return false;"><img src="3.png" style='width:30px;height:30px; padding:2px;'/></a> -->



              <script src="./js/polyfill.js"></script>
              <script src="./js/popupmodal-min.js"></script>
              <script src="./js/demo.js"></script>
              <?php
              echo "</tr>";
              $i++;
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div id="Tokyo" class="tabcontent">
    <table class="js-sort-table" border="2" style="border-collapse: collapse; width:70%; border:2px solid #000 ;  table-layout: auto; margin-right:auto; margin-left:70px;margin-bottom:70px; margin-top:70px; ">
      <thead>
        <tr>
          <th>نام بازیکن اول</th>
          <th class="js-sort-number">امتیاز بازیکن اول</th>
          <th>نام بازیکن دوم</th>
          <th class="js-sort-number">امتیاز بازیکن دوم</th>
          <th>نام بازیکن سوم</th>
          <th class="js-sort-number">امتیاز بازیکن سوم</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT COUNT(id),gameNo from archotaq GROUP BY gameNo ORDER BY COUNT(id) DESC";
        $i = 0;
        $result = $conn->query($sql);
        $data = array();
        if (($result->num_rows) >= 0) {
          while ($row = $result->fetch_assoc()) {
            $data[$i++] = $row["gameNo"];
          }
          $j = $i;
          $i = 0;
          while ($i < $j) {
            echo "<tr>";
            $ssql = "select username,archotaq.score as salam from archotaq INNER JOIN arch ON arch.id=archotaq.archId INNER JOIN usrs on arch.userId=usrs.id where gameNo=$data[$i];";
            $rresult = $conn->query($ssql);
            $l = 0;
            while ($l < 3) {
              $l++;
              $rrow = $rresult->fetch_assoc();
              echo "<td>" . $rrow['username'] . "</td><td>" . $rrow['salam'] . "</td>";
            }
            echo "</tr>";
            $i++;
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <form id='form_name' name='form_name' action='delete.php' method='post'>
    <input type='hidden' id='image_name' name='image_name' value='' />
  </form>

  <form id='form_name2' name='form_name2' action='edit.php' method='post'>
    <input type='hidden' id='image_name2' name='image_name2' value='' />
  </form>
  <button id='khas' onclick="lak()" style="width:'100px'; display:none;">
  </button>
  <script type="text/javascript" src="jquery.min.js"></script>
  <script src="list.js"></script>
  <script type="text/javascript" src="sort-table.js"></script>
</body>
<script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  // Get the modal
  var modal2 = document.getElementById('id02');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal2) {
      modal2.style.display = "none";
    }
  }
  var x, i, j, selElmnt, a, b, c;
  /*look for any elements with the class "custom-select":*/
  x = document.getElementsByClassName("custom-select");
  for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /*for each element, create a new DIV that will act as the selected item:*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*for each element, create a new DIV that will contain the option list:*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < selElmnt.length; j++) {
      /*for each option in the original select element,
      create a new DIV that will act as an option item:*/
      c = document.createElement("DIV");
      c.innerHTML = selElmnt.options[j].innerHTML;
      c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
  }

  function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    for (i = 0; i < y.length; i++) {
      if (elmnt == y[i]) {
        arrNo.push(i)
      } else {
        y[i].classList.remove("select-arrow-active");
      }
    }
    for (i = 0; i < x.length; i++) {
      if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
      }
    }
  }
  /*if the user clicks anywhere outside the select box,
  then close all select boxes:*/
  document.addEventListener("click", closeAllSelect);
</script>

</html>