<!DOCTYPE html>
<html dir="rtl" lang="en">
    
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    $host='localhost';
    $user='root';
    $password='admin1212';
    $db='student1';
    $connect= mysqli_connect($host,$user,$password,$db);
    $result= mysqli_query($connect,"select * from student");
    #button variables
    $id='';
    $name='';
    $adress='';
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['adress'])){
        $adress=$_POST['adress'];
    }
   $qls='';
   if(isset($_POST['add'])){
       $qls="insert into student value ($id,'$name','$adress')";
       mysqli_query($connect,$qls);
       header("location:home.php");
   }
    if(isset($_POST['del'])){
        $qls= "delete from student where name ='$name'";
        mysqli_query($connect,$qls);
        header("location:home.php");
    }

    ?>
    <div id="mother">
        
        <form id="form-box"action="" method="post" >
            <aside>
                <div id="div">
                    <img src="img/cs.png" alt="" width="100" height="100">
                    <h3>لوحة التحكم </h3>
                   <strong> <label for="id">رقم الطالب</label></strong>
                    <input type="text" name="id" id="id"> <br><br>
                   <strong><label for="name">  اسم الطالب</label></strong>
                    <input type="text" name="name" id="name"> <br>
                  <h5>  <label for="adress">عنوان الطالب</label>
                    <input type="text" name="adress" id="adress"></h5><br>
                    <button name="add">اضافة الطالب</button> <br><br>
                    <button name="del">حذف الطالب </button>
                </div>
            </aside>
            <!-- عرض البيانات -->
            <main>
                <table id="tbl">
                    <tr>
                        <th>الرقم التسلسلي</th>
                        <th>اسم الطالب</th>
                        <th> عنوان الطالب</th>
                        <?php
                        while($row=mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['adress']."</td>";
                        }
                        ?>
                    </tr>
                </table>
            </main>
        </form>
    </div>
</body>
</html>