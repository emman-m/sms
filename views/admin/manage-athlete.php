<?php require 'views/admin/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="../vendor/jquery/jquery-3.7.1.js"></script>
    <?php include 'views/common/datatables.php'; ?>
    <script src="../assets/js/manage-athlete.js"></script>
</head>

<body>
    <!-- HEADER -->
    <?php include 'common/header.php'; ?>
    <div class="container">

        <div class="main-content">
            <!-- SIDE NAVIGATION -->
            <?php include 'common/sidenav.php'; ?>
            <div class="right-panel">
                <div class="page-title">
                    Manage Athlete
                </div>
                <hr>
                <div class="section">
                    <div class="card">
                        <div class="card-title">Advance Search</div>
                        <form action="manage-athlete">

                            <label for="school" class="label">School</label>
                            <select name="school" id="school" class="sms-input">
                                <option value="all">All</option>
                                <?php foreach ($schools as $school): ?>
                                    <option value="<?= $school['school'] ?>" <?= isset($_GET['school']) && $_GET['school'] === $school['school'] ? 'selected' : '' ?>><?= $school['school'] ?></option>
                                <?php endforeach; ?>
                            </select>

                            <label for="sport" class="label">Sport</label>
                            <select name="sport" id="sport" class="sms-input">
                                <option value="all">All</option>
                                <?php foreach ($sports as $key => $val): ?>
                                    <option value="<?= $key ?>" <?= isset($_GET['sport']) && $_GET['sport'] === $key ? 'selected' : '' ?>><?= $val ?></option>
                                <?php endforeach; ?>
                            </select>


                            <button type="submit" class="button button-success">Search</button>
                        </form>
                    </div>
                </div>
                <div class="section">
                    <div class="card">
                        <table id="myTable" style="display:none">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>School</th>
                                    <th>Sport</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($athletes as $athlete): ?>
                                    <tr class="<?= $athlete['status'] ?>">
                                        <td><?= $athlete['full_name'] ?></td>
                                        <td><?= $athlete['email'] ?></td>
                                        <td><?= $athlete['gender'] ?></td>
                                        <td><?= Helper::getAge($athlete['birthday']) ?></td>
                                        <td><?= $athlete['phone_number'] ?></td>
                                        <td><?= $athlete['address'] ?></td>
                                        <td><?= $athlete['school'] ?></td>
                                        <td><?= $athlete['sport'] ?></td>
                                        <td><?= $athlete['status'] ?></td>
                                        <td>
                                            <a href="../athlete/stat?id=<?= $athlete['user_id'] ?>"
                                                class="button button-primary button-xs">View</a>
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
</body>

</html>