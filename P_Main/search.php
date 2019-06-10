<html dir="rtl">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	<style type="text/css">
		a:link {
			text-decoration: none;
		}

		a:visited {
			text-decoration: none;
		}

		a:hover {
			text-decoration: none;
		}

		a:active {
			text-decoration: none;
		}
	</style>
</head>

<body>
	<center>
		<table border="2" bgcolor="#33CCFF" align="center">
			<tr>
				<th>شناسه</th>
				<th>نام</th>
				<th>نام خانوادگی</th>
			</tr>
			<?php
			$a = $_REQUEST["n"];
			$c = mysql_connect("localhost", "root", "");
			mysql_query("set names utf8");
			mysql_select_db("main_db", $c);
			$r = mysql_query("select * from members where name like '%$a%'");
			while ($row = mysql_fetch_array($r)) {
				echo "<tr>";
				echo "<td> $row[ID] </td><td> $row[Name] </td><td> $row[Family] </td>";
				echo "</tr>";
			}
			?>
		</table>
		<a href="index.html">
			<h1>بازگشت</h1>
		</a>
	</center>
</body>

</html>