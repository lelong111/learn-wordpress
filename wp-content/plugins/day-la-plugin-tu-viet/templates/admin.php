<!DOCTYPE html>
<html lang="en">
<head>
<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
</style>
</head>
<body>
<h1>Chức năng quản lý khóa học đã mua</h1>
<table>
  <tr>
    <th>STT</th>
    <th>Name User</th>
    <th>Email User</th>
    <th>Couse Name</th>
    <th>Time buy</th>
  </tr>
  <?php foreach($data as $value) { ?>
  <tr>
    <td>1</td>
    <td><?php echo $value->display_name; ?></td>
    <td><?php echo $value->user_email; ?></td>
    <td><?php echo $value->post_title; ?></td>
    <td><?php echo $value->user_registered ?></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>
