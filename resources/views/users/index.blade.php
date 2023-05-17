<?php
$username = 'admin';
$password = 'medicalrabbit';
$logout_url = 'https://qr-scanner.ru/users'; // замените на нужный URL-адрес

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])
    || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW'] != $password)) {
  header('HTTP/1.1 401 Unauthorized');
  header('WWW-Authenticate: Basic realm="Login Credentials"');
  exit('<h1>Unauthorized Access</h1>');
} else {
  echo "<p>You are logged in!</p>";
//   echo "<form action='' method='get'><input type='submit' name='logout' value='Logout'></form>";
//   if (isset($_GET['logout'])) {
//     header('WWW-Authenticate: Basic realm="Login Credentials"');
//     header('HTTP/1.1 401 Unauthorized');
//     // редирект
//     //header('Location: ' . $logout_url);
//     exit('<h1>Logged out</h1>');
//   }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>users</title>
    <!-- Add Material Design Library -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <style>
        /* Add borders to table */
        table {
            border-collapse: collapse;
            border: 1px solid #ccc;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 5px;
        }
        /* Apply Material Design styles to table */
        table.mdl-data-table {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 2px;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
        }
        th.mdl-data-table__cell--non-numeric, td.mdl-data-table__cell--non-numeric {
            border: none;
            text-align: left;
            padding: 8px;
        }
        th.mdl-data-table__cell--non-numeric {
            background-color: #f5f5f5;
            font-weight: 600;
            text-transform: uppercase;
        }
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .mdl-button--accent {
        background-color: #f44336;
         color: white;
        }
        /* Highlight search field */
        .mdl-textfield__input {
            background-color: #f5f5f5 !important; /* gray background */
            color: #000 !important; /* black text */
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">USERS</span>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <form action="" method="get">
                        <input class="mdl-textfield__input" type="text" name="search" id="fixed-header-drawer-exp">
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-1">
            <div class="page-content">
                <!-- Add Material Design classes to table -->
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">ID</th>
                            <th class="mdl-data-table__cell--non-numeric">Lastname</th>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th class="mdl-data-table__cell--non-numeric">Surename</th>
                            <th class="mdl-data-table__cell--non-numeric">Email</th>
                            <th class="mdl-data-table__cell--non-numeric">Phone</th>
                            <th class="mdl-data-table__cell--non-numeric">City</th>
                            <th class="mdl-data-table__cell--non-numeric">Job</th>
                            <th class="mdl-data-table__cell--non-numeric">Hash</th>
                            <th class="mdl-data-table__cell--non-numeric">QRCODE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->ID }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->Lastname }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->Name }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->Surename }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->Email }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->Phone }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->City }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->Job }}</td>
                                <td class="mdl-data-table__cell--non-numeric">{{ $user->Hash }}</td>
                                <td> 
                                    <form action="{{ route('generate_qr') }}" method="POST">
                                     @csrf
                                    <input value = "{{ $user->Hash }}" style = "display:none" type="text" name="hash">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Generate QR Code</button>
                                    </form> 
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form action="" method="get">
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Reset</button>
                </form>
            </div>
        </section>
    </main>
</div>
</body>
</html>
