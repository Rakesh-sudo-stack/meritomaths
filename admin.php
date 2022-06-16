<?php
session_start();
include "./connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href='//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        body{
            background:rgb(218,218,218);
        }

        .header{
            height:4rem;
            width:100vw;
            background:linear-gradient(to right,rgb(140,140,234),rgb(101,101,266),rgb(60,60,290));
            color:white;
            font-size:2rem;
            font-weight:600;
            display:grid;
            place-items:center;
        }

        td{
            text-transform:uppercase;
            text-align:center;
        }
        .STUDENT{
            color:yellow;
            font-size:1.5rem;
            font-weight:600;
        }

        .DEVELOPER{
            color:green;
            font-size:1.5rem;
            font-weight:600;
        }
        .OWNER{
            color:brown;
            font-size:1.5rem;
            font-weight:600;
        }
        .demo{ font-family: 'Noto Sans', sans-serif; }
.panel{
    background: linear-gradient(to right, #2980b9, #2c3e50);
    padding: 0;
    border-radius: 10px;
    border: none;
    box-shadow: 0 0 0 5px rgba(0,0,0,0.05),0 0 0 10px rgba(0,0,0,0.05);
}
.panel .panel-heading{
    padding: 20px 15px;
    border-radius: 10px 10px 0 0;
    margin: 0;
}
.panel .panel-heading .title{
    color: #fff;
    font-size: 28px;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 40px;
    margin: 0;
}
.panel .panel-heading .btn{
    color: rgba(255,255,255,0.5);
    background: transparent;
    font-size: 16px;
    text-transform: capitalize;
    border: 2px solid #fff;
    border-radius: 50px;
    transition: all 0.3s ease 0s;
}
.panel .panel-heading .btn:hover{
    color: #fff;
    text-shadow: 3px 3px rgba(255,255,255,0.2);
}
.panel .panel-heading .form-control{
    color: #fff;
    background-color: transparent;
    width: 35%;
    height: 40px;
    border: 2px solid #fff;
    border-radius: 20px;
    display: inline-block;
    transition: all 0.3s ease 0s;
}
.panel .panel-heading .form-control:focus{
    background-color: rgba(255,255,255,0.2);
    box-shadow: none;
    outline: none;
}
.panel .panel-heading .form-control::placeholder{
    color: rgba(255,255,255,0.5);
    font-size: 15px;
    font-weight: 500;
}
.panel .panel-body{ padding: 0; }
.panel .panel-body .table thead tr th{
    color: #fff;
    background-color: rgba(255, 255, 255, 0.2);
    font-size: 16px;
    font-weight: 500;
    text-transform: uppercase;
    padding: 12px;
    border: none;
}
.panel .panel-body .table tbody tr td{
    color: #fff;
    font-size: 15px;
    padding: 10px 12px;
    vertical-align: middle;
    border: none;
}
.panel .panel-body .table tbody tr:nth-child(even){ background-color: rgba(255,255,255,0.05); }
.panel .panel-body .table tbody .action-list{
    padding: 0;
    margin: 0;
    list-style: none;
}
.panel .panel-body .table tbody .action-list li{
    display: inline-block;
    margin: 0 5px;
}
.panel .panel-body .table tbody .action-list li a{
    color: #fff;
    font-size: 15px;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.panel .panel-body .table tbody .action-list li a:hover{ text-shadow: 3px 3px 0 rgba(255,255,255,0.3); }
.panel .panel-body .table tbody .action-list li a:before,
.panel .panel-body .table tbody .action-list li a:after{
    content: attr(data-tip);
    color: #fff;
    background-color: #111;
    font-size: 12px;
    padding: 5px 7px;
    border-radius: 4px;
    text-transform: capitalize;
    display: none;
    transform: translateX(-50%);
    position: absolute;
    left: 50%;
    top: -32px;
    transition: all 0.3s ease 0s;
}
.panel .panel-body .table tbody .action-list li a:after{
    content: '';
    height: 15px;
    width: 15px;
    padding: 0;
    border-radius: 0;
    transform: translateX(-50%) rotate(45deg);
    top: -18px;
    z-index: -1;
}
.panel .panel-body .table tbody .action-list li a:hover:before,
.panel .panel-body .table tbody .action-list li a:hover:after{
    display: block;
}
.panel .panel-footer{
    color: #fff;
    background-color: transparent;
    padding: 15px;
    border: none;
}
.panel .panel-footer .col{ line-height: 35px; }
.pagination{ margin: 0; }
.pagination li a{
    color: #fff;
    background-color: transparent;
    border: 2px solid transparent;
    font-size: 18px;
    font-weight: 500;
    text-align: center;
    line-height: 31px;
    width: 35px;
    height: 35px;
    padding: 0;
    margin: 0 3px;
    border-radius: 50px;
    transition: all 0.3s ease 0s;
}
.pagination li a:hover{
    color: #fff;
    background-color: transparent;
    border-color: rgba(255,255,255,0.2);
}
.pagination li a:focus,
.pagination li.active a,
.pagination li.active a:hover{
    color: #fff;
    background-color: transparent;
    border-color: #fff;
}
.pagination li:first-child a,
.pagination li:last-child a{
    border-radius: 50%;
}

.fa-edit{
    color:rgb(33,75,7);
}

.fa-trash{
    color:red;
}
@media only screen and (max-width:767px){
    .panel .panel-heading .title{
        text-align: center;
        margin: 0 0 10px;
    }
    .panel .panel-heading .btn_group{ text-align: center; }
}
License Terms

    </style>
</head>
<body>
<?php
if(isset($_GET['post']) && ($_GET['post'] == "OWNER" || $_GET['post'] == "DEVELOPER")){
    ?>
    <div class="header">ADMIN PANEL</div>
    <div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col col-sm-3 col-xs-12">
                            <h4 class="title">Users <span>List</span></h4>
                        </div>
                        <div class="col-sm-9 col-xs-12 text-right">
                            
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>POST</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $selectquery = " SELECT * FROM `userslist` ";
                            $query = mysqli_query($con,$selectquery);

                            while($res = mysqli_fetch_assoc($query)){
                                ?>
                                <tr>
                                <td><?php echo $res['name']; ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td><?php echo $res['phone']; ?></td>
                                <td><?php echo $res['post']; ?></td>
                                <td>
                                    <ul class="action-list">
                                        <li><a href="delete.php?email=<?php echo $res['email']; ?>&post=<?php echo $res['post']; ?>" data-tip="delete"><i class="fa fa-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                
        </div>
    </div>
</div>
<?php
}else{
    echo "<H1>You are not an admin. ";
}
?>
<a href="index.php"><button>Go Back</button></a>
</body>
</html>
<!-- http://bestjquery.com/tutorial/table-style/demo5/ -->