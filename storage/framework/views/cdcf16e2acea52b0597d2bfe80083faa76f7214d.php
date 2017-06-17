<?php
/****************************************************************
File Name       : layout.blade.php
Description     : layout for all pages
Creation Date   : 2016/06/10
Author          : FPT/KhanhTH
Change History  :
 ****************************************************************/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Function Relationship</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar
        {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav
        {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer
        {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media  screen and (max-width: 767px)
        {
            .sidenav
            {
                height: auto;
                padding: 15px;
            }

            .row.content {height:auto;}
        }
    </style>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/home"><span class="glyphicon glyphicon-home"></span>   Function Relationship</a>
            </div>

            <ul class="nav navbar-nav">
                <li><a href="/generate" style="display: none" id="generate">Generate</a></li>
                <li><a href="/about">About</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/settings" style="display: none" id="settings"><span class="glyphicon glyphicon-cog"></span> Setting</a></li>
                <?php
                
                 $status_authen=NOT_AUTHEN;
                 $status_name='Underfine';

                if(!isset($_SESSION))
                {
                    session_start();
                }
                if(isset($_SESSION['status_authen']) && !empty($_SESSION['status_authen']))
                {
                    $status_authen = $_SESSION['status_authen'];
                    $status_name  = $_SESSION['status_name'];
                }

                //$status_authen =$_SESSION['status_authen'];
                // $status_name  = $_SESSION['status_name'];
                if($status_authen==1)
                {
                ?>
                <li><a><span class="glyphicon glyphicon-log-in"></span>
                        <?php
                        echo $status_name;
                        ?>
                    </a></li>

                <script language="JavaScript" type="text/javascript">
                    document.getElementById("settings").style.display = 'inherit';
                    document.getElementById("generate").style.display = 'inherit';
                </script>

                <li><a href="/logout"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
                <?php
                }
                else
                {
                ?>
                <script language="JavaScript" type="text/javascript">
                    document.getElementById("settings").style.display = 'none';
                    document.getElementById("generate").style.display = 'none';
                </script>
                <li><a href="/login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>
</head>
<body>

<?php echo $__env->yieldContent('content'); ?>

</body>

<?php echo $__env->yieldContent('footer'); ?>

</html>