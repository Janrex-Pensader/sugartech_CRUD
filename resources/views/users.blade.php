
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $page_title }}</title>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="{{ asset('js/common.js') }}"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            #addButton{
                width: 120px;
            }
        </style>
    </head>
    <body class="antialiased">
        
        
        <nav class="col-12 navbar navbar-light p-3" style="background-color: #e3f2fd; width:100%">
            <h5 class="p-0 m-0">SugarTech CRUD</h5>
            <a class="mr-5" href="{{ url('/logout') }}"> logout </a>
        </nav>

        <div class="row col-11 mx-auto text-center p-5">
                <div class="card p-0 col-2 mx-auto">
                    <div class="card-header">
                        Count of Male<br>Employees
                    </div>
                    <div class="card-body ">
                        <h2><?= $male; ?></h2>
                    </div>
                </div>
                <div class="card p-0 col-2 mx-auto">
                    <div class="card-header">
                        Count of Female<br>Employees
                    </div>
                    <div class="card-body">
                        <h2><?= $female; ?></h2>
                    </div>
                </div>
                <div class="card p-0 col-2 mx-auto">
                    <div class="card-header">
                        Average Age of all<br>employees
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
                <div class="card p-0 col-2 mx-auto">
                    <div class="card-header">
                        Total monthly salary of all employees
                    </div>
                    <div class="card-body">
                        <h2>$<?= $salary; ?></h2>
                    </div>
                </div>
        </div>
        
        <div class="col-12 text-center mt-3">
            <h1>Employee Records</h1>
        </div>
        <div class="row mt-3" style="width:100%">
            <div class="col-10">
                <div class="float-end">
                    <button id="adduserbtn" type="button" class="btn btn-primary" onClick="addUser()">Add User <i class="fa-solid fa-user-plus"></i> </button>
                </div>
            </div>
            <div class="col-12">
                <div class="mt-3">
                    <div class="card col-8 mx-auto p-1">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Gender</th>
                                <th>Birthday</th>
                                <th>Monthly Salary</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?= $user->first_name; ?></td>
                                    <td><?= $user->last_name; ?></td>
                                    <td><?= $user->gender_text; ?></td>
                                    <td><?= date('d/m/Y', strtotime($user->birthday)); ?></td>
                                    <td>$<?= $user->monthly_salary; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onclick="getUser(<?= $user->user_ID; ?>)">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteUser(<?= $user->user_ID; ?>)">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
        @include('modal')

    </body>
</html>
