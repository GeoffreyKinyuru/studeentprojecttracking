<html>
<head>
<style type="text/css">
table {
   font-size: 12px;
   font-weight: bold;
   font-family: Verdana, Geneva, sans-serif;
 }
 #mytable td {
   border: 1px solid #CCC;
   font-size: 14px;
 }
 #mytable thead {
   border: 1px solid #6C3;
   background-color: #CCC;
   color: black;
   line-height: 30px;
   height: 30px;
   font-size: 14px;
 }
 #mytable input[type="text"] {
   outline: none;
   border: 1px solid #69C;
   color: green;
   font-size: 14px;
   font-weight: bold;
   height: 20px;
   padding: 5px;
 }
 tfoot {
   background-color: #999;
   color: black;
   height: 30px;
 }
</style>
</head>
<body>
<table id="mytable" width='100%' align='center' cellspacing='1' cellpadding='2'>
  <thead align="center">
    <tr>
      <th>S. #</th>
      <th>Code</th>
      <th>Party</th>
      <th>Amount</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody id="content"></tbody>
  <tbody>
    <tr>
      <!--sno-->
      <td style="text-align:center;">
        <input style="text-align:center;" type="text" id="serial" size="3" maxlength="3" disabled required="required" />
      </td>
      <!--Party code-->
      <td style="text-align:center;">
        <input style="text-align:center;" type="text" id="code" size="5" maxlength="7"  required="required" />
      </td>
      <!--Party Name-->
      <td style="text-align:left;">
        <input style="text-align:left;" type="text" id="party" size="30" maxlength="30" />
      </td>
      <!--Amount-->
      <td>
        <input style="text-align:right;" type="text" id="debit" name="debit[]" size="6" maxlength="6" />
      </td>
      <!--Action-->
      <td>
        <input type="button" name="addnew" id="addnew" value="Add" />
      </td>
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td align='Center'>Total</td>
      <td>
        <input style="text-align:right;" type="text" name="total" id="total" size="6" maxlength="6" value="" />
      </td>
      <td></td>
    </tr>
  </tfoot>
</table>
<br>
<center>
 <input type="submit" name="submit" id="submit" value="Save to database" />
</center>
<script type="text/javascript">
function addRow(code,party,debit) {
    if (debit > 0) {
    $('#content').append('<tr><td style="text-align:center;"><input style="text-align:center;" type="text" name="sno[]" size="3" maxlength="3" readonly required="required" /></td><td style="text-align:center;"><input style="text-align:center;" type="text" name="code[]" size="5" maxlength="7" onkeyup="myCall()" value="'+code+'" required="required" /></td><td style="text-align:left;"><input style="text-align:left;" type="text" name="party[]" size="30" maxlength="30" value="'+party+'" /></td><td><input style="text-align:right;" type="text" name="debit[]" size="6" maxlength="6" value="'+debit+'" /></td><td><input type="button" class="remove" value="Remove" /></td></tr>');
    }
}
function update(){
    var i = 1;
  var total = 0;
    $('#content').find('input[name="sno[]"]').each(function(){
    $(this).val(i);
    i++;
  });
  $('#content').find('input[name="debit[]"]').each(function(){
    total += parseInt($(this).val());
  });
  $('#total').val(total);
}
$('#addnew').click(function(){
  var code = $('#code').val();
  var party = $('#party').val();
  var amount = $('#debit').val();
  addRow(code,party,amount);
  update();
  $('#code').val('');
  $('#party').val('');
  $('#debit').val('');
  $('.remove').on('click', function(){
    $(this).closest('tr').remove();
    update();
  });
});
</script>
</body>
</html>