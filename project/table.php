<html>
<head>
<?php
	
    if($_POST['submit'])
    {
     foreach ($_POST['item'] as $key => $value) 
        {
            $item = $_POST["item"][$key];
            $price = $_POST["price"][$key];
            $qty = $_POST["qty"][$key];
			echo $item;
			
			include ('db.inc');
            $sql = mysql_query("insert into your_table_name(item,price,qty) values ('$item', '$price', '$qty')"); 

			$sql1 = mysql_query("select * from users");
			$rows = mysql_num_rows($sql1);
if ($rows >= 1) {
echo "hello";
} 

        }

    }   
?>
<SCRIPT language="javascript">
    function addRow(tableID) { 

        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var cell1 = row.insertCell(0);
        var element1 = document.createElement("input");
        element1.type = "checkbox";
        element1.name="chkbox[]";
        cell1.appendChild(element1);

        var cell2 = row.insertCell(1);
        cell2.innerHTML = "<input type='text' name='item[]'>";

        var cell3 = row.insertCell(2);
        cell3.innerHTML = "<input type='text'  name='price[]' />";

        var cell4 = row.insertCell(3);
        cell4.innerHTML =  "<input type='text'  name='qty[]' />";
        }

    function deleteRow(tableID) {
        try {
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;

        for(var i=0; i<rowCount; i++) {
            var row = table.rows[i];
            var chkbox = row.cells[0].childNodes[0];
            if(null != chkbox && true == chkbox.checked) {
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        }
        }catch(e) {
            alert(e);
        }
    }

</SCRIPT>
</head>
<body>

<INPUT type="button" value="Add Row" onClick="addRow('dataTable')" />

<INPUT type="button" value="Delete Row" onClick="deleteRow('dataTable')" />

<form action="table.php" method="post" name="f">  

<TABLE width="425" border="1">
<thead>
<tr>
<th width="98"></th>
<th width="94">Item</th>
<th width="121">Price</th>
<th width="84">Qty</th>

</tr>
</thead>
<tbody id="dataTable">

</tbody>
</TABLE>

<INPUT type="submit" value="Insert" name="submit" />
</form>
</body>
</html>