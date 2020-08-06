<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="buttons input-group">
                <button class="btn btn-outline-secondary btn-add mr-1 mb-1" type="button">Add</button>
                <select class="custom-select mb-1 selector" id="inputGroupSelect04"
                        aria-label="Example select with button addon">
                    <option selected value="empty">Please select</option>
                    <option value="setActive">Set active</option>
                    <option value="setNotActive">Set not active</option>
                    <option value="deleteMany">Delete</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary mb-1 ml-1 btn-ok" type="button">Ok</button>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-uppercase mb-0">Manage Users</h5>
                </div>
                <div class="table-responsive">
                    <table class="table no-wrap user-table mb-0">
                        <th>
                            <tr>
                                <th scope="col" class="border-0 text-uppercase font-medium "><input type="checkbox"
                                                                                                    class="selectAllUsers"
                                                                                                    aria-label="Checkbox for following text input">
                                </th>
                                <th scope="col" class="border-0 text-uppercase font-medium">First Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Last Name</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Status</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Role</th>
                                <th scope="col" class="border-0 text-uppercase font-medium">Options</th>
                            </tr>
                        </th>
                        <tbody id="result">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="buttons input-group">
                <button class="btn btn-outline-secondary btn-add mt-1 mr-1" type="button">Add</button>
                <select class="custom-select mt-1 selector" name="op" aria-label="Example select with button addon">
                    <option selected value="empty">Please select</option>
                    <option value="setActive">Set active</option>
                    <option value="setNotActive">Set not active</option>
                    <option value="deleteMany">Delete</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary mt-1 ml-1 btn-ok" type="button">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modalWindow"></div>
<div id="confirmWindow"></div>
<div id="noSelectedOptionWindow"></div>
<div id="noSelectedUserWindow"></div>
<div id="noSelectedRoleWindow"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="main.js"></script>
<script>updateTable()</script>
</body>
</html>
