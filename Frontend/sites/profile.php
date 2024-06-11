<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="../../Frontend/Bilder/123.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/profile.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "../../Backend/logic/header.php"; ?>
    <?php include "../../Backend/logic/profile_logic.php"; ?> 

    <div class="hello">
        <?php if ($currentUser): ?>
            <div class="container"  style=" margin-top: 120px;" id="hello">
                Welcome to <?= $currentUser["username"] ?>'s profile page!
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12" style="background-color: #f8f9fa; color: #343a40; border-radius: 15px;">
                    <form action="profile.php" method="post">
                        <?php if ($status): ?>
                            <div class="alert alert-<?= $status === 'error' ? 'danger' : 'success' ?>" role="alert">
                                <?= $message ?>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $currentUser["username"] ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="anrede">Anrede</label>
                            <input type="text" class="form-control" id="anrede" name="anrede" value="<?= $currentUser["anrede"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $currentUser["firstname"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $currentUser["lastname"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="useremail" value="<?= $currentUser["useremail"] ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="password">
                        </div>
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="role">Your user role:</label>
                            <input type="text" class="form-control" id="role" name="role" value="<?= $currentUser["role"] == 1 ? 'Admin' : 'User' ?>" disabled>
                        </div>
                        <div class="buttons">
                        <button type="submit" class="btn btn-primary">Update User</button>
                        
                    </form>
                    <a href="myreservations.php" class="btn btn-info">My Reservations</a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>